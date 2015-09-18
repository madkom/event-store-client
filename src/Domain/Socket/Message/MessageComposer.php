<?php

namespace Madkom\EventStore\Client\Domain\Socket\Message;

use Rhumsaa\Uuid\Uuid;
use TrafficCophp\ByteBuffer\Buffer;

/**
 * Class MessageComposer - Composes binary message
 * @package Madkom\EventStore\Client\Domain\Socket\Message
 * @author  Dariusz Gafka <dgafka.mail@gmail.com>
 */
class MessageComposer
{

    /**
     * Composes message to binary data to send it via stream
     *
     * @param SocketMessage $socketMessage
     *
     * @return string
     *
     */
    public function compose(SocketMessage $socketMessage)
    {
        //Correlation + flag length + command length
        $messageLength = MessageConfiguration::HEADER_LENGTH;

        $doAuthorization = $socketMessage->getCredentials() ? true : false;
        $authorizationLength = 0;

        if ($doAuthorization) {
           $authorizationLength = 1 + strlen($socketMessage->getCredentials()->getUsername()) + 1 + strlen($socketMessage->getCredentials()->getPassword());
        }

        $dataToSend = $socketMessage->getData();
        if ($dataToSend) {
            $dataToSend    = $dataToSend->serializeToString();
            $messageLength += strlen($dataToSend);
        }

        $wholeMessageLength = $messageLength + $authorizationLength + MessageConfiguration::INT_32_LENGTH;

        $buffer = new Buffer($wholeMessageLength);
        $buffer->writeInt32LE($messageLength + $authorizationLength, 0);
        $buffer->writeInt8($socketMessage->getMessageType()->getType(), MessageConfiguration::MESSAGE_TYPE_OFFSET);
        $buffer->writeInt8(($doAuthorization ? MessageConfiguration::FLAG_AUTHORIZATION : MessageConfiguration::FLAGS_NONE), MessageConfiguration::FLAG_OFFSET);
        $buffer->write(hex2bin($this->createCorrelationID($socketMessage->getCorrelationID())), MessageConfiguration::CORRELATION_ID_OFFSET);

        if($doAuthorization) {
            $usernameLength = strlen($socketMessage->getCredentials()->getUsername());
            $passwordLength = strlen($socketMessage->getCredentials()->getPassword());

            $buffer->writeInt8($usernameLength, MessageConfiguration::DATA_OFFSET);
            $buffer->write($socketMessage->getCredentials()->getUsername(), MessageConfiguration::DATA_OFFSET + 1);
            $buffer->writeInt8($passwordLength, MessageConfiguration::DATA_OFFSET + 1 + $usernameLength);
            $buffer->write($socketMessage->getCredentials()->getPassword(), MessageConfiguration::DATA_OFFSET + 1 + $usernameLength + 1);
        }

        if ($dataToSend) {
            $buffer->write($dataToSend, MessageConfiguration::DATA_OFFSET + $authorizationLength);
        }

        return (string)$buffer;
    }

    /**
     *
     * @param string $correlationID
     *
     * @return string
     */
    private function createCorrelationID($correlationID)
    {
        if (!$correlationID) {
            $correlationID = str_replace('-', '', Uuid::uuid4());
        }

        return $correlationID;

    }

}