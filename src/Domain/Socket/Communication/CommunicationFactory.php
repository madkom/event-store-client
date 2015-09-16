<?php

namespace EventStore\Client\Domain\Socket\Communication;

use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Communication\Type;

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
     * @return Communicable
     * @throws \RuntimeException
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
                $communicable = new Type\ReadStreamEvents();
                break;
            case MessageType::READ_STREAM_EVENTS_FORWARD_COMPLETED:
                echo "Read stream events completed\n";
                $communicable = new Type\ReadStreamEventsCompleted();
                break;
            case MessageType::READ_ALL_EVENTS_FORWARD:
                echo "Read all events forward\n";
                $communicable = new Type\ReadAllEvents();
                break;
            case MessageType::READ_ALL_EVENTS_BACKWARD:
                echo "Read all events backward\n";
                $communicable = new Type\ReadAllEvents();
                break;
            case MessageType::READ_ALL_EVENTS_FORWARD_COMPLETED:
                echo "Read all events forward completed\n";
                $communicable = new Type\ReadAllEventsCompleted();
                break;
            case MessageType::READ_ALL_EVENTS_BACKWARD_COMPLETED:
                echo "Read all events backward completed\n";
                $communicable = new Type\ReadAllEventsCompleted();
                break;
            case MessageType::SUBSCRIBE_TO_STREAM:
                echo "Subscribe to stream\n";
                $communicable = new Type\SubscribeToStream();
                break;
            case MessageType::SUBSCRIPTION_CONFIRMATION:
                echo "Subscription confirmation";
                $communicable = new Type\SubscriptionConfirmation();
                break;
            case MessageType::WRITE_EVENTS:
                echo "Write Events\n";
                $communicable = new Type\WriteEvents();
                break;
            case MessageType::BAD_REQUEST:
                echo "Bad Request\n";
                $communicable = new Type\BadRequest();
                break;
            case MessageType::WRITE_EVENTS_COMPLETED:
                echo "Write events\n";
                $communicable = new Type\WriteEventsCompleted();
                break;
            default:
                throw new \RuntimeException('Unsupported message type ' . $messageType->getType());
        }

        return $communicable;

    }

}