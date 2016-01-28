<?php

/**
 * Class StreamHandlerTest
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class StreamHandlerTest extends PHPUnit_Framework_TestCase
{

    /** @var  \Prophecy\Prophet */
    private $internalProphet;

    /** @var  \Madkom\EventStore\Client\Domain\Socket\Stream */
    private $stream;

    /** @var  \Madkom\EventStore\Client\Domain\Socket\Message\MessageDecomposer */
    private $messageDecomposer;

    /** @var  \Madkom\EventStore\Client\Domain\Socket\Message\MessageComposer */
    private $messageComposer;

    /** @var  \Madkom\EventStore\Client\Domain\Socket\StreamHandler */
    private $streamHandler;


    /** @var  \Madkom\EventStore\Client\Domain\Socket\Message\MessageType */
    private $messageType;

    /** @var  \Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage */
    private $socketMessage;

    /** @var  \Madkom\EventStore\Client\Domain\Socket\Communication\Communicable */
    private $communicable;

    public function setUp()
    {
        $this->internalProphet   = new \Prophecy\Prophet();
        $this->stream            = $this->internalProphet->prophesize('Madkom\EventStore\Client\Domain\Socket\Stream');
        $this->messageDecomposer = $this->internalProphet->prophesize('Madkom\EventStore\Client\Domain\Socket\Message\MessageDecomposer');
        $this->messageComposer   = $this->internalProphet->prophesize('Madkom\EventStore\Client\Domain\Socket\Message\MessageComposer');
        $logger                  = $this->internalProphet->prophesize('Psr\Log\LoggerInterface');

        $this->streamHandler = new \Madkom\EventStore\Client\Domain\Socket\StreamHandler($this->stream->reveal(), $logger->reveal(), $this->messageDecomposer->reveal(), $this->messageComposer->reveal());


        $messageType = $this->internalProphet->prophesize('Madkom\EventStore\Client\Domain\Socket\Message\MessageType');
        $this->messageType = $messageType->reveal();

        $socketMessage = $this->internalProphet->prophesize('Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage');
        $socketMessage->getMessageType()->willReturn($messageType);
        $this->socketMessage = $socketMessage;
    }

    /**
     * @test
     */
    public function it_should_do_nothing_if_data_is_empty()
    {
        PHPUnit_Framework_Assert::assertEquals(0, sizeof($this->streamHandler->handle('')));
    }

    /**
     * @test
     */
    public function it_should_handle_without_response()
    {
        $wholeMessageLength = 0 + \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::INT_32_LENGTH + \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::HEADER_LENGTH;
        $buffer = new \TrafficCophp\ByteBuffer\Buffer($wholeMessageLength);

        $buffer->writeInt32LE(18, 0);
        $buffer->writeInt8(\Madkom\EventStore\Client\Domain\Socket\Message\MessageType::PING, \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::MESSAGE_TYPE_OFFSET);
        $buffer->writeInt8(\Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAGS_NONE, \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAG_OFFSET);
        $buffer->write(hex2bin('12350000000000000000000000000000'), \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::CORRELATION_ID_OFFSET);


        $messageType = $this->internalProphet->prophesize('Madkom\EventStore\Client\Domain\Socket\Message\MessageType');
        $messageType->getType()->willReturn(\Madkom\EventStore\Client\Domain\Socket\Message\MessageType::HEARTBEAT_RESPONSE);
        $this->socketMessage->getMessageType()->willReturn($messageType->reveal());
        $this->socketMessage->reveal();

        $this->messageDecomposer->decomposeMessage((string)$buffer)->willReturn($this->socketMessage);

        $socketMessages = $this->streamHandler->handle((string)$buffer);
        PHPUnit_Framework_Assert::assertEquals(1, sizeof($socketMessages));

        foreach ($socketMessages as $socketMessage) {
            PHPUnit_Framework_Assert::assertInstanceOf('Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage', $socketMessage);
        }
    }
 
    /**
     * @test
     */
    public function it_should_handle_with_response()
    {
        $wholeMessageLength = 0 + \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::INT_32_LENGTH + \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::HEADER_LENGTH;
        $buffer = new \TrafficCophp\ByteBuffer\Buffer($wholeMessageLength);

        $buffer->writeInt32LE(18, 0);
        $buffer->writeInt8(\Madkom\EventStore\Client\Domain\Socket\Message\MessageType::PING, \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::MESSAGE_TYPE_OFFSET);
        $buffer->writeInt8(\Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAGS_NONE, \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAG_OFFSET);
        $buffer->write(hex2bin('12350000000000000000000000000000'), \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::CORRELATION_ID_OFFSET);


        $messageTypeChanged = $this->internalProphet->prophesize('Madkom\EventStore\Client\Domain\Socket\Message\MessageType');
        $messageTypeChanged->getType()->willReturn(\Madkom\EventStore\Client\Domain\Socket\Message\MessageType::HEARTBEAT_REQUEST);
        $messageTypeChanged = $messageTypeChanged->reveal();
        $this->socketMessage->getMessageType()->willReturn($messageTypeChanged);
        $this->socketMessage->getCorrelationID()->willReturn('some');

        $this->messageDecomposer->decomposeMessage((string)$buffer)->willReturn($this->socketMessage->reveal());


        $this->messageComposer->compose(\Prophecy\Argument::type('Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage'))->willReturn('someBinary');
        $this->stream->write('someBinary')->shouldBeCalledTimes(1);
        $this->stream->reveal();

        $socketMessages = $this->streamHandler->handle((string)$buffer);
        PHPUnit_Framework_Assert::assertEquals(1, sizeof($socketMessages));

        foreach ($socketMessages as $socketMessage) {
            PHPUnit_Framework_Assert::assertInstanceOf('Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage', $socketMessage);
        }

    }

    /**
     * @test
     */
    public function it_should_handle_split_messages()
    {
        // Create 2 messages
        $wholeMessageLength = 0 + \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::INT_32_LENGTH + \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::HEADER_LENGTH;
        $buffer1 = new \TrafficCophp\ByteBuffer\Buffer($wholeMessageLength);
        $buffer1->writeInt32LE(18, 0);
        $buffer1->writeInt8(\Madkom\EventStore\Client\Domain\Socket\Message\MessageType::PING, \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::MESSAGE_TYPE_OFFSET);
        $buffer1->writeInt8(\Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAGS_NONE, \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAG_OFFSET);
        $buffer1->write(hex2bin('12350000000000000000000000000000'), \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::CORRELATION_ID_OFFSET);

        $buffer2 = new \TrafficCophp\ByteBuffer\Buffer($wholeMessageLength);
        $buffer2->writeInt32LE(18, 0);
        $buffer2->writeInt8(\Madkom\EventStore\Client\Domain\Socket\Message\MessageType::PING, \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::MESSAGE_TYPE_OFFSET);
        $buffer2->writeInt8(\Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAGS_NONE, \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAG_OFFSET);
        $buffer2->write(hex2bin('12350000000000000000000000000000'), \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::CORRELATION_ID_OFFSET);

    
        $messageType = $this->internalProphet->prophesize('Madkom\EventStore\Client\Domain\Socket\Message\MessageType');
        $messageType->getType()->willReturn(\Madkom\EventStore\Client\Domain\Socket\Message\MessageType::PING);
        $this->socketMessage->getMessageType()->willReturn($messageType->reveal());
        $this->socketMessage->reveal();
  
        $buffer = (string)$buffer1 . (string)$buffer2;
      
        // Split the messages 
        $totalBufferLength = strlen($buffer);
        $firstBuffer = substr($buffer, 0, $totalBufferLength-10);
        $firstBufferLength = strlen($firstBuffer);
        $secondBuffer = substr($buffer, $totalBufferLength-10);
        $secondBufferLength = strlen($secondBuffer);

        $this->messageDecomposer->decomposeMessage((string)$buffer1)->willReturn($this->socketMessage);
        $socketMessages = $this->streamHandler->handle($firstBuffer);
        PHPUnit_Framework_Assert::assertEquals(1, sizeof($socketMessages));

        foreach ($socketMessages as $socketMessage) {
            PHPUnit_Framework_Assert::assertInstanceOf('Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage', $socketMessage);
        }

        $this->messageDecomposer->decomposeMessage((string)$buffer2)->willReturn($this->socketMessage);
        $socketMessages = $this->streamHandler->handle($secondBuffer);
        PHPUnit_Framework_Assert::assertEquals(1, sizeof($socketMessages));

        foreach ($socketMessages as $socketMessage) {
            PHPUnit_Framework_Assert::assertInstanceOf('Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage', $socketMessage);
        }
    }
    /**
     * @test
     */
    public function it_should_handle_multiple_messages()
    {
        // Create 2 messages
        $wholeMessageLength = 0 + \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::INT_32_LENGTH + \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::HEADER_LENGTH;
        $buffer1 = new \TrafficCophp\ByteBuffer\Buffer($wholeMessageLength);
        $buffer1->writeInt32LE(18, 0);
        $buffer1->writeInt8(\Madkom\EventStore\Client\Domain\Socket\Message\MessageType::PING, \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::MESSAGE_TYPE_OFFSET);
        $buffer1->writeInt8(\Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAGS_NONE, \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAG_OFFSET);
        $buffer1->write(hex2bin('12350000000000000000000000000000'), \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::CORRELATION_ID_OFFSET);

        $buffer2 = new \TrafficCophp\ByteBuffer\Buffer($wholeMessageLength);
        $buffer2->writeInt32LE(18, 0);
        $buffer2->writeInt8(\Madkom\EventStore\Client\Domain\Socket\Message\MessageType::PING, \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::MESSAGE_TYPE_OFFSET);
        $buffer2->writeInt8(\Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAGS_NONE, \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAG_OFFSET);
        $buffer2->write(hex2bin('12350000000000000000000000000000'), \Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration::CORRELATION_ID_OFFSET);


        $messageType = $this->internalProphet->prophesize('Madkom\EventStore\Client\Domain\Socket\Message\MessageType');
        $messageType->getType()->willReturn(\Madkom\EventStore\Client\Domain\Socket\Message\MessageType::PING);
        $this->socketMessage->getMessageType()->willReturn($messageType->reveal());
        $this->socketMessage->reveal();


        $buffer = (string)$buffer1 . (string)$buffer2;
        $this->messageDecomposer->decomposeMessage((string)$buffer1)->willReturn($this->socketMessage);

        $socketMessages = $this->streamHandler->handle($buffer);

        PHPUnit_Framework_Assert::assertEquals(2, sizeof($socketMessages));
        foreach ($socketMessages as $socketMessage) {
            PHPUnit_Framework_Assert::assertInstanceOf('Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage', $socketMessage);
        }

    }
    /**
     * @test
     */
    public function it_should_send_message()
    {
        $this->socketMessage = $this->socketMessage->reveal();

        $this->messageComposer->compose($this->socketMessage)->willReturn('binary');
        $this->stream->write('binary')->shouldBeCalledTimes(1);

        $this->streamHandler->sendMessage($this->socketMessage);
    }

    protected function tearDown()
    {
        $this->internalProphet->checkPredictions();
    }

}
