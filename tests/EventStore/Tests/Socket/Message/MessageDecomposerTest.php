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

    /** @var  MessageDecomposer */
    private $messageDecomposer;

    public function setUp()
    {
        $this->messageDecomposer = new MessageDecomposer();
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

        $decomposedMessage = $this->messageDecomposer->decomposeMessage((string)$buffer);


        \PHPUnit_Framework_Assert::assertEquals(MessageType::PING, $decomposedMessage->getMessageType()->getType());
        \PHPUnit_Framework_TestCase::assertEquals(MessageConfiguration::FLAGS_NONE, $decomposedMessage->getFlag());
        \PHPUnit_Framework_TestCase::assertEquals('12350000000000000000000000000000', $decomposedMessage->getCorrelationID());
        \PHPUnit_Framework_TestCase::assertEmpty($decomposedMessage->getData());
    }


}