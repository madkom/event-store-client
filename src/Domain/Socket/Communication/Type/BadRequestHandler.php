<?php

namespace Madkom\EventStore\Client\Domain\Socket\Communication\Type;

use Madkom\EventStore\Client\Domain\DomainException;
use Madkom\EventStore\Client\Domain\Socket\Communication\Communicable;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageType;

/**
 * Class BadRequest
 * @package Madkom\EventStore\Client\Domain\Socket\Communication\Type
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class BadRequestHandler implements Communicable
{

    /**
     * @inheritDoc
     */
    public function handle(MessageType $messageType, $correlationID, $data)
    {
        throw new DomainException("Bad Request: " . $data);
    }

}