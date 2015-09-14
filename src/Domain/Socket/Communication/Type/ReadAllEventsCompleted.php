<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;

use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;
use EventStore\Client\Domain\Socket\Data;

/**
 * Class ReadAllEventsForwardCompleted
 * @package EventStore\Client\Domain\Socket\Communication\Type
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class ReadAllEventsCompleted implements Communicable
{

    /**
     * @param SocketMessage $socketMessage
     *
     * @return SocketMessage
     */
    public function handle(SocketMessage $socketMessage)
    {
        $data = new Data\ReadAllEventsCompleted();
        $data->parseFromString($socketMessage->getData());
        $data->dump();

        $socketMessage->changeData($data->getEvents());

        return $socketMessage;
    }

    /**
     * What kind of message is it
     *
     * @return MessageType
     */
    public function getMessageType()
    {
        return new MessageType(MessageType::READ_STREAM_EVENTS_FORWARD_COMPLETED);
    }

    /**
     * What message type it should respond to.
     * For example HeartBeatRequest message response to HeartBeatResponse
     *
     * @return null|MessageType
     */
    public function sendResponseTo()
    {
        return null;
    }



}