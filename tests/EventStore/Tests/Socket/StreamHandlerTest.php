<?php

/**
 * Class StreamHandlerTest
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class StreamHandlerTest extends PHPUnit_Framework_TestCase
{

    /** @var  \Prophecy\Prophet */
    private $internalProphet;

    /** @var  \EventStore\Client\Domain\Socket\Stream */
    private $stream;

    /** @var  \EventStore\Client\Domain\Socket\Message\MessageDecomposer */
    private $messageDecomposer;

    /** @var  \EventStore\Client\Domain\Socket\Message\MessageComposer */
    private $messageComposer;

    /** @var  \EventStore\Client\Domain\Socket\StreamHandler */
    private $streamHandler;


    /** @var  \EventStore\Client\Domain\Socket\Message\MessageType */
    private $messageType;

    /** @var  \EventStore\Client\Domain\Socket\Message\SocketMessage */
    private $socketMessage;

    /** @var  \EventStore\Client\Domain\Socket\Communication\Communicable */
    private $communicable;

    public function setUp()
    {
        $this->internalProphet   = new \Prophecy\Prophet();
        $this->stream            = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Stream');
        $this->messageDecomposer = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Message\MessageDecomposer');
        $this->messageComposer   = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Message\MessageComposer');
        $logger                  = $this->internalProphet->prophesize('Psr\Log\LoggerInterface');

        $this->streamHandler = new \EventStore\Client\Domain\Socket\StreamHandler($this->stream->reveal(), $logger->reveal(), $this->messageDecomposer->reveal(), $this->messageComposer->reveal());


        $messageType = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Message\MessageType');
        $this->messageType = $messageType->reveal();

        $socketMessage = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Message\SocketMessage');
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
        $messageType = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Message\MessageType');
        $messageType->getType()->willReturn(\EventStore\Client\Domain\Socket\Message\MessageType::HEARTBEAT_RESPONSE);
        $this->socketMessage->getMessageType()->willReturn($messageType->reveal());
        $this->socketMessage->reveal();

        $this->messageDecomposer->decomposeMessage('test')->willReturn($this->socketMessage);

        PHPUnit_Framework_Assert::assertInstanceOf('EventStore\Client\Domain\Socket\Message\SocketMessage', $this->streamHandler->handle('test'));
    }

    /**
     * @test
     */
    public function it_should_handle_with_response()
    {
        $messageTypeChanged = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Message\MessageType');
        $messageTypeChanged->getType()->willReturn(\EventStore\Client\Domain\Socket\Message\MessageType::HEARTBEAT_REQUEST);
        $messageTypeChanged = $messageTypeChanged->reveal();
        $this->socketMessage->getMessageType()->willReturn($messageTypeChanged);
        $this->socketMessage->getCorrelationID()->willReturn('some');

        $this->messageDecomposer->decomposeMessage('test')->willReturn($this->socketMessage->reveal());


        $this->messageComposer->compose(\Prophecy\Argument::type('EventStore\Client\Domain\Socket\Message\SocketMessage'))->willReturn('someBinary');
        $this->stream->write('someBinary')->shouldBeCalledTimes(1);
        $this->stream->reveal();

        PHPUnit_Framework_Assert::assertInstanceOf('EventStore\Client\Domain\Socket\Message\SocketMessage', $this->streamHandler->handle('test'));
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