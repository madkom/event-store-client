<?php

use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;
use EventStore\ValueObjects\Tests\TestCase;
use Prophecy\Argument;

/**
 * Class SocketMessage
 *
 * @package EventStore\ValueObjects\Tests\Identity
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class SocketMessageTest extends PHPUnit_Framework_TestCase
{

    /** @var  SocketMessage */
    private $socketMessage;

    private $messageType;

    private $credentials;

    private $protobufMessage;

    public function setUp()
    {
        $this->messageType = new MessageType(3);
        $this->credentials = new \EventStore\Client\Domain\Socket\Message\Credentials('test', 'pass');

        $protobufMessage   = $this->prophesize('\ProtobufMessage');
        $this->protobufMessage = $protobufMessage->reveal();

        $this->socketMessage = new SocketMessage($this->messageType, 'correlation', $this->protobufMessage, $this->credentials);
    }

    /**
     * @test
     */
    public function should_return_values_it_was_created_with()
    {
        $this->assertEquals($this->socketMessage->getMessageType(), $this->messageType);
        $this->assertSame($this->socketMessage->getCredentials(), $this->credentials);
        $this->assertEquals($this->socketMessage->getCorrelationID(), 'correlation');
        $this->assertSame($this->socketMessage->getData(), $this->protobufMessage);
    }

    /**
     * @test
     */
    public function it_should_change_data()
    {
        $protobufMessage   = $this->prophesize('\ProtobufMessage');
        $anotherProtobuf   = $protobufMessage->reveal();

        $socketMessage = $this->socketMessage->changeData($anotherProtobuf);
        \PHPUnit_Framework_Assert::assertNotSame($this->socketMessage, $socketMessage);

        $this->assertEquals($socketMessage->getMessageType(), $this->messageType);
        $this->assertSame($socketMessage->getCredentials(), $this->credentials);
        $this->assertEquals($socketMessage->getCorrelationID(), 'correlation');
        $this->assertSame($socketMessage->getData(), $anotherProtobuf);
    }

    /**
     * @test
     */
    public function it_should_change_message_type()
    {
        $messageType = new MessageType(MessageType::PONG);

        $socketMessage = $this->socketMessage->changeMessageType($messageType);
        \PHPUnit_Framework_Assert::assertNotSame($this->socketMessage, $socketMessage);

        $this->assertEquals($socketMessage->getMessageType(), $messageType);
        $this->assertSame($socketMessage->getCredentials(), $this->credentials);
        $this->assertEquals($socketMessage->getCorrelationID(), 'correlation');
        $this->assertSame($socketMessage->getData(), $this->protobufMessage);
    }

}
