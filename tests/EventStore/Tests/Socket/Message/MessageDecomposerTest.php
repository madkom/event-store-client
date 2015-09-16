<?php

use EventStore\Client\Domain\Socket\Message\MessageConfiguration;
use EventStore\Client\Domain\Socket\Message\MessageDecomposer;
use EventStore\Client\Domain\Socket\Message\MessageType;
use TrafficCophp\ByteBuffer\Buffer;

/**
 * Class MessageDecomposerTest
 * @package EventStore\ValueObjects\Tests\Identity
 * @author  Dariusz Gafka <dgafka.mail@gmail.com>
 */
class MessageDecomposerTest extends \PHPUnit_Framework_TestCase
{

    private $messageDecomposer;

    public function setUp()
    {
        $communicable = $this->prophesize('EventStore\Client\Domain\Socket\Communication\Type\PongHandler');
        $communicable->handle(\Prophecy\Argument::type('EventStore\Client\Domain\Socket\Message\MessageType'), '12350000000000000000000000000000', '')->willReturn('done');

        $communicationFactory = $this->prophesize('EventStore\Client\Domain\Socket\Communication\CommunicationFactory');
        $communicationFactory->create(\Prophecy\Argument::type('EventStore\Client\Domain\Socket\Message\MessageType'))->willReturn($communicable->reveal());


        $this->messageDecomposer = new MessageDecomposer($communicationFactory->reveal());
    }

    /**
     * @test
     */
    public function it_should_decompose_empty_message()
    {
        $wholeMessageLength = 0 + MessageConfiguration::INT_32_LENGTH + MessageConfiguration::HEADER_LENGTH;
        $buffer = new Buffer($wholeMessageLength);

        $buffer->writeInt32LE(18, 0);
        $buffer->writeInt8(MessageType::PING, MessageConfiguration::MESSAGE_TYPE_OFFSET);
        $buffer->writeInt8(MessageConfiguration::FLAGS_NONE, MessageConfiguration::FLAG_OFFSET);
        $buffer->write(hex2bin('12350000000000000000000000000000'), MessageConfiguration::CORRELATION_ID_OFFSET);

        PHPUnit_Framework_Assert::assertEquals('done', $this->messageDecomposer->decomposeMessage((string)$buffer));
    }


}