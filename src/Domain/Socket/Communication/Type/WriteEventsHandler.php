<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;


use EventStore\Client\Domain\DomainException;
use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;
use EventStore\Client\Domain\Socket\Data;

/**
 * Class WriteEventsHandler
 * @package EventStore\Client\Domain\Socket\Communication\Type
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class WriteEventsHandler implements Communicable
{

    /**
     * @inheritDoc
     */
    public function handle(SocketMessage $socketMessage)
    {
        if(!($socketMessage->getData() instanceof Data\WriteEvents)) {
            throw new DomainException('Passed data in socket message isn\'t type of Data\ReadStreamEvents.');
        }

        $data = $socketMessage->getData();


        return $socketMessage->changeData($data->serializeToString());
    }

    /**
     * @inheritDoc
     */
    public function getMessageType()
    {
        return new MessageType(MessageType::WRITE_EVENTS);
    }

    /**
     * @inheritDoc
     */
    public function sendResponseTo()
    {
        return null;
    }

}