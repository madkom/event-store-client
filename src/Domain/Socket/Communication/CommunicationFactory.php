<?php

namespace EventStore\Client\Domain\Socket\Communication;

use EventStore\Client\Domain\Socket\Data\UnsubscribeFromStream;
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

            case MessageType::PONG:
                echo "\npong\n";
                $communicable = new Type\PongHandler();
                break;
            case MessageType::HEARTBEAT_REQUEST:
//                echo "hearbeat_response\n";
                $communicable = new Type\HeartBeatRequestHandler();
                break;
            case MessageType::READ_STREAM_EVENTS_FORWARD_COMPLETED:
                echo "Read stream events completed\n";
                $communicable = new Type\ReadStreamEventsCompletedHandler();
                break;
            case MessageType::READ_ALL_EVENTS_FORWARD_COMPLETED:
                echo "Read all events forward completed\n";
                $communicable = new Type\ReadAllEventsCompletedHandler();
                break;
            case MessageType::READ_ALL_EVENTS_BACKWARD_COMPLETED:
                echo "Read all events backward completed\n";
                $communicable = new Type\ReadAllEventsCompletedHandler();
                break;
            case MessageType::SUBSCRIPTION_CONFIRMATION:
                echo "Subscription confirmation";
                $communicable = new Type\SubscriptionConfirmationHandler();
                break;
            case MessageType::BAD_REQUEST:
                echo "Bad Request\n";
                $communicable = new Type\BadRequestHandler();
                break;
            case MessageType::WRITE_EVENTS_COMPLETED:
                echo "Write events\n";
                $communicable = new Type\WriteEventsCompletedHandler();
                break;
            case MessageType::STREAM_EVENT_APPEARED:
                echo "Stream event appeared\n";
                $communicable = new Type\StreamEventAppearedHandler();
                break;
            default:
                throw new \RuntimeException('Unsupported message type ' . $messageType->getType());
        }

        return $communicable;

    }

}