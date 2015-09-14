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

    /** @var  \EventStore\Client\Domain\Socket\Communication\CommunicationFactory */
    private $communicationFactory;

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
        $this->communicationFactory = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Communication\CommunicationFactory');
        $logger                  = $this->internalProphet->prophesize('Psr\Log\LoggerInterface');

        $this->streamHandler = new \EventStore\Client\Domain\Socket\StreamHandler($this->stream->reveal(), $logger->reveal(), $this->messageDecomposer->reveal(), $this->messageComposer->reveal(), $this->communicationFactory->reveal());


        $messageType = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Message\MessageType');
        $this->messageType = $messageType->reveal();

        $socketMessage = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Message\SocketMessage');
        $socketMessage->getMessageType()->willReturn($messageType);
        $this->socketMessage = $socketMessage;

        $communicable = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Communication\Communicable');
        $communicable->handle($socketMessage)->willReturn($socketMessage);
        $this->communicable = $communicable;
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
        $this->communicable->sendResponseTo()->willReturn(null);
        $this->communicable = $this->communicable->reveal();
        $this->socketMessage->reveal();

        $this->messageDecomposer->decomposeMessage('test')->willReturn($this->socketMessage);
        $this->communicationFactory->create($this->messageType)->willReturn($this->communicable);

        PHPUnit_Framework_Assert::assertInstanceOf('EventStore\Client\Domain\Socket\Message\SocketMessage', $this->streamHandler->handle('test'));
    }

    /**
     * @test
     */
    public function it_should_handle_with_response()
    {
        $this->messageDecomposer->decomposeMessage('test')->willReturn($this->socketMessage);
        $this->communicationFactory->create($this->messageType)->willReturn($this->communicable);

        $this->communicable->sendResponseTo()->willReturn($this->messageType);
        $this->communicable = $this->communicable->reveal();


        $messageTypeChanged = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Message\MessageType');
        $messageTypeChanged = $messageTypeChanged->reveal();

        $socketMessageChanged = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Message\SocketMessage');
        $socketMessageChanged->getMessageType()->willReturn($messageTypeChanged);
        $socketMessageChanged->reveal();


        $this->socketMessage->changeMessageType($this->messageType)->willReturn($socketMessageChanged);
        $this->socketMessage->reveal();

        $communicable = $this->internalProphet->prophesize('EventStore\Client\Domain\Socket\Communication\Communicable');
        $communicable->handle($socketMessageChanged)->willReturn($socketMessageChanged);
        $communicable->reveal();

        $this->communicationFactory->create($messageTypeChanged)->willReturn($communicable);

        $this->messageComposer->compose($socketMessageChanged)->willReturn('someBinary');
        $this->stream->write('someBinary')->shouldBeCalledTimes(1);
        $this->stream->reveal();

        PHPUnit_Framework_Assert::assertInstanceOf('EventStore\Client\Domain\Socket\Message\SocketMessage', $this->streamHandler->handle('test'));
    }

    /**
     * @test
     */
    public function it_should_send_message()
    {
        $this->communicationFactory->create($this->messageType)->willReturn($this->communicable);
        $this->communicable->handle($this->socketMessage)->willReturn($this->socketMessage);
        $this->communicable  = $this->communicable->reveal();
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