<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;

use EventStore\Client\Domain\DomainException;
use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;
use EventStore\Client\Domain\Socket\Data;

/**
 * Class SubsribeToStream
 * @package EventStore\Client\Domain\Socket\Communication\Type
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class SubscribeToStreamHandler implements Communicable
{

    /**
     * @inheritDoc
     */
    public function handle(SocketMessage $socketMessage)
    {
        if(!($socketMessage->getData() instanceof Data\SubscribeToStream)) {
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
        return MessageType::SUBSCRIBE_TO_STREAM;
    }

    /**
     * @inheritDoc
     */
    public function sendResponseTo()
    {
        return null;
    }

}