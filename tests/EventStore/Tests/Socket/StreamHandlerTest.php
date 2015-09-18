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
        PHPUnit_Framework_Assert::assertEmpty($this->streamHandler->handle(''));
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

        PHPUnit_Framework_Assert::assertInstanceOf('Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage', $this->streamHandler->handle((string)$buffer));
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

        PHPUnit_Framework_Assert::assertInstanceOf('Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage', $this->streamHandler->handle((string)$buffer));
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