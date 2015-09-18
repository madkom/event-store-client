<?php

use Madkom\EventStore\Client\Domain\Socket\Message\MessageComposer;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageType;
use Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage;
use TrafficCophp\ByteBuffer\Buffer;

/**
 * Class MessageComposerTest
 * @package EventStore\ValueObjects\Tests\Identity
 * @author  Dariusz Gafka <dgafka.mail@gmail.com>
 */
class MessageComposerTest extends \PHPUnit_Framework_TestCase
{

    /** @var  MessageComposer */
    private $messageComposer;

    /** @var  SocketMessage */
    private $socketMessage;

    public function setUp()
    {
        $this->messageComposer = new MessageComposer();

        /** @var SocketMessage $socketMessage */
        $socketMessage = $this->prophesize('Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage');
        $socketMessage->getData()->willReturn(null);
        $socketMessage->getMessageType()->willReturn(new MessageType(MessageType::HEARTBEAT_REQUEST));
        $socketMessage->getCorrelationID()->willReturn('1235');
        $this->socketMessage = $socketMessage;
    }

    /**
     * @test
     * @expectedException \RuntimeException
     */
    public function it_should_compose_empty_message_without_auth()
    {
        $this->socketMessage = $this->socketMessage->reveal();

        $binaryMessage = $this->messageComposer->compose($this->socketMessage);

        $buffer = new Buffer($binaryMessage);
        \PHPUnit_Framework_Assert::assertEquals(18,$buffer->readInt32LE(0));
        \PHPUnit_Framework_TestCase::assertEquals(MessageType::HEARTBEAT_REQUEST, $buffer->readInt8(4));
        \PHPUnit_Framework_TestCase::assertEquals(MessageConfiguration::FLAGS_NONE, $buffer->readInt8(5));
        \PHPUnit_Framework_TestCase::assertEquals('12350000000000000000000000000000', bin2hex($buffer->read(6, 16)));

        //should throw exception out of range
        $buffer->read(22, 1);
    }

}