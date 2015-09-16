<?php

/**
 * Class HeartBeatResponseHandlerTest
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class HeartBeatResponseHandlerTest extends PHPUnit_Framework_TestCase
{

    /** @var  \EventStore\Client\Domain\Socket\Communication\Type\HeartBeatResponseHandler */
    private $heartBeatResponse;

    public function setUp()
    {
        $this->heartBeatResponse = new \EventStore\Client\Domain\Socket\Communication\Type\HeartBeatResponseHandler();
    }

    /**
     * @test
     */
    public function it_should_handle()
    {
        $socketMessage = $this->prophesize('EventStore\Client\Domain\Socket\Message\SocketMessage');
        $socketMessage = $socketMessage->reveal();

        PHPUnit_Framework_Assert::assertSame($socketMessage, $this->heartBeatResponse->handle($socketMessage));
    }

    /**
     * @test
     */
    public function it_should_return_message_type()
    {
        $messageType = $this->heartBeatResponse->getMessageType();
        PHPUnit_Framework_Assert::assertInstanceOf('EventStore\Client\Domain\Socket\Message\MessageType', $messageType);
        PHPUnit_Framework_TestCase::assertEquals(\EventStore\Client\Domain\Socket\Message\MessageType::HEARTBEAT_RESPONSE, $messageType->getType());
    }

    /**
     * @test
     */
    public function it_should_has_no_response()
    {
        PHPUnit_Framework_TestCase::assertEmpty($this->heartBeatResponse->sendResponseTo());
    }

}