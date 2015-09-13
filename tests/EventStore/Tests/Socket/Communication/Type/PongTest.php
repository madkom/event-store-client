<?php

/**
 * Class HeartBeatResponseTest
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class PongTest extends PHPUnit_Framework_TestCase
{

    /** @var  \EventStore\Client\Domain\Socket\Communication\Type\HeartBeatResponse */
    private $ping;

    public function setUp()
    {
        $this->ping = new \EventStore\Client\Domain\Socket\Communication\Type\Pong();
    }

    /**
     * @test
     */
    public function it_should_handle()
    {
        $socketMessage = $this->prophesize('EventStore\Client\Domain\Socket\Message\SocketMessage');
        $socketMessage = $socketMessage->reveal();

        PHPUnit_Framework_Assert::assertSame($socketMessage, $this->ping->handle($socketMessage));
    }

    /**
     * @test
     */
    public function it_should_return_message_type()
    {
        $messageType = $this->ping->getMessageType();
        PHPUnit_Framework_Assert::assertInstanceOf('EventStore\Client\Domain\Socket\Message\MessageType', $messageType);
        PHPUnit_Framework_TestCase::assertEquals(\EventStore\Client\Domain\Socket\Message\MessageType::PONG, $messageType->getType());
    }

    /**
     * @test
     */
    public function it_should_has_no_response()
    {
        PHPUnit_Framework_TestCase::assertEmpty($this->ping->sendResponseTo());
    }

}