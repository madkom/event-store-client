<?php

namespace EventStore\Client\Domain\Socket\Message;

use Rhumsaa\Uuid\Uuid;
use TrafficCophp\ByteBuffer\Buffer;

/**
 * Class MessageComposer - Composes binary message
 * @package EventStore\Client\Domain\Socket\Message
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
//        $data = json_encode([
//            'eventStreamId' =>  '$stats-172.17.0.230:2113',
//            'fromEventNumber' => 0,
//            'maxCount' => 100,
//            'resolveLinkTos' => true,
//            'requireMaster' => false
//        ]);

//        @TODO credentials

        $dataToSend = $socketMessage->getData();
//        if ($socketMessage->getData()) {
//            $dataBuffer = new Buffer(strlen($socketMessage->getData()));
//
//            $dataBuffer->write($socketMessage->getData(), 0);
//            $dataToSend = (string)$dataBuffer;
////            echo $dataToSend . "\n";
////            die('a');
//        }


        //Correlation + flag length + command length
        $messageLength = MessageConfiguration::HEADER_LENGTH;

        if ($dataToSend) {
            $dataToSend    = $dataToSend->serializeToString();
            $messageLength += strlen($dataToSend);
        }

        $wholeMessageLength = $messageLength + MessageConfiguration::INT_32_LENGTH;
        $buffer = new Buffer($wholeMessageLength);

        $buffer->writeInt32LE($messageLength, 0);
        $buffer->writeInt8($socketMessage->getMessageType()->getType(), MessageConfiguration::MESSAGE_TYPE_OFFSET);
        $buffer->writeInt8(MessageConfiguration::FLAGS_NONE, MessageConfiguration::FLAG_OFFSET);
        $buffer->write(hex2bin($this->createCorrelationID($socketMessage->getCorrelationID())), MessageConfiguration::CORRELATION_ID_OFFSET);

        if($dataToSend) {
            $buffer->write($dataToSend, MessageConfiguration::DATA_OFFSET);
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