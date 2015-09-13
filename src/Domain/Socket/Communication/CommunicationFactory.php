<?php

namespace EventStore\Client\Domain\Socket\Communication;

use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Communication\Type;
use SebastianBergmann\GlobalState\RuntimeException;

/**
 * Class CommunicationFactory
 * @package EventStore\Client\Domain\Socket\Communication
 * @author  Dariusz Gafka <dgafka.mail@gmail.com>
 */
class CommunicationFactory
{

    /**
     * @param MessageType $messageType
     *
     * @return Communicable|null
     */
    public function create(MessageType $messageType)
    {

        $communicable = null;

        switch($messageType->getType()) {

            case MessageType::PING:
                echo "\nping\n";
                $communicable = new Type\Ping();
                break;
            case MessageType::PONG:
                echo "\npong\n";
                $communicable = new Type\Pong();
                break;
            case MessageType::HEARTBEAT_RESPONSE:
//                echo "hearbeat_response\n";
                $communicable = new Type\HeartBeatResponse();
                break;
            case MessageType::HEARTBEAT_REQUEST:
//                echo "hearbeat_request\n";
                $communicable = new Type\HeartBeatRequest();
                break;
            case MessageType::READ_STREAM_EVENTS_FORWARD:
                echo "Read stream events forward\n";
                $communicable = new Type\ReadStreamEventsForward();
                break;
            case MessageType::BAD_REQUEST:
                echo "Bad Request\n";
                $communicable = new Type\BadRequest();
                break;
            default:
                throw new RuntimeException('Unsupported message type ' . $messageType->getType());
        }

        return $communicable;

    }

}