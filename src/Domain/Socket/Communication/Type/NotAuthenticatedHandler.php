<?php

namespace Madkom\EventStore\Client\Domain\Socket\Communication\Type;


use Madkom\EventStore\Client\Domain\DomainException;
use Madkom\EventStore\Client\Domain\Socket\Communication\Communicable;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageType;
use Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage;

class NotAuthenticatedHandler implements Communicable
{

    /**
     * @inheritDoc
     */
    public function handle(MessageType $messageType, $correlationID, $data)
    {
        throw new DomainException("Not Authenticated: " . $data);
    }

}