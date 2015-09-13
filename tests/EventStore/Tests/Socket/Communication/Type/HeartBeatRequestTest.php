<?php

/**
 * Class HeartBeatRequestTest
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class HeartBeatRequestTest extends PHPUnit_Framework_TestCase
{

    /** @var  \EventStore\Client\Domain\Socket\Communication\Type\HeartBeatRequest */
    private $heartBeatRequest;

    public function setUp()
    {
        $this->heartBeatRequest = new \EventStore\Client\Domain\Socket\Communication\Type\HeartBeatRequest();
    }

    /**
     * @test
     */
    public function it_should_handle()
    {
        $socketMessage = $this->prophesize('EventStore\Client\Domain\Socket\Message\SocketMessage');
        $socketMessage = $socketMessage->reveal();

        PHPUnit_Framework_Assert::assertSame($socketMessage, $this->heartBeatRequest->handle($socketMessage));
    }

    /**
     * @test
     */
    public function it_should_return_message_type()
    {
        $messageType = $this->heartBeatRequest->getMessageType();
        PHPUnit_Framework_Assert::assertInstanceOf('EventStore\Client\Domain\Socket\Message\MessageType', $messageType);
        PHPUnit_Framework_TestCase::assertEquals(\EventStore\Client\Domain\Socket\Message\MessageType::HEARTBEAT_REQUEST, $messageType->getType());
    }

    /**
     * @test
     */
    public function it_should_has_no_response()
    {
        $messageType = $this->heartBeatRequest->sendResponseTo();
        PHPUnit_Framework_Assert::assertInstanceOf('EventStore\Client\Domain\Socket\Message\MessageType', $messageType);
        PHPUnit_Framework_TestCase::assertEquals(\EventStore\Client\Domain\Socket\Message\MessageType::HEARTBEAT_RESPONSE, $messageType->getType());
    }

}