<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;


use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;
use EventStore\Client\Domain\Socket\Data;

/**
 * Class ReadStreamEventsForwardCompleted
 * @package EventStore\Client\Domain\Socket\Communication\Type
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class ReadStreamEventsCompleted implements Communicable
{

    /**
     * @inheritDoc
     */
    public function handle(SocketMessage $socketMessage)
    {
        $data = new Data\ReadStreamEventsCompleted();
        $data->parseFromString($socketMessage->getData());
        $data->dump();

        $socketMessage->changeData($data->getEvents());

        return $socketMessage;
    }

    /**
     * @inheritDoc
     */
    public function getMessageType()
    {
        return new MessageType(MessageType::READ_STREAM_EVENTS_FORWARD_COMPLETED);
    }

    /**
     * @inheritDoc
     */
    public function sendResponseTo()
    {
        return null;
    }


}