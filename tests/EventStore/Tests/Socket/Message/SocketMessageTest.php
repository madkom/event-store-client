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

    /** @var  MessageType */
    private $socketMessage;

    private $messageType;

    public function setUp()
    {
        $this->messageType = new MessageType(3);
        $this->socketMessage = new SocketMessage($this->messageType, 'flag', 'correlation', 'someData');
    }

    /**
     * @test
     */
    public function should_return_values_it_was_created_with()
    {
        $this->assertEquals($this->socketMessage->getMessageType(), $this->messageType);
        $this->assertEquals($this->socketMessage->getFlag(), 'flag');
        $this->assertEquals($this->socketMessage->getCorrelationID(), 'correlation');
        $this->assertEquals($this->socketMessage->getData(), 'someData');
    }

    /**
     * @test
     */
    public function it_should_change_data()
    {
        $socketMessage = $this->socketMessage->changeData(['test']);
        \PHPUnit_Framework_Assert::assertNotSame($this->socketMessage, $socketMessage);

        $this->assertEquals($socketMessage->getMessageType(), $this->messageType);
        $this->assertEquals($socketMessage->getFlag(), 'flag');
        $this->assertEquals($socketMessage->getCorrelationID(), 'correlation');
        $this->assertEquals($socketMessage->getData(), ['test']);
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
        $this->assertEquals($socketMessage->getFlag(), 'flag');
        $this->assertEquals($socketMessage->getCorrelationID(), 'correlation');
        $this->assertEquals($socketMessage->getData(), 'someData');
    }

}
