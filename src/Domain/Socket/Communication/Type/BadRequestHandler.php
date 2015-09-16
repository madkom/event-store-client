<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;

use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;

/**
 * Class BadRequest
 * @package EventStore\Client\Domain\Socket\Communication\Type
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class BadRequestHandler implements Communicable
{

    /**
     * @inheritDoc
     */
    public function handle(SocketMessage $socketMessage)
    {
        return $socketMessage;
    }

    /**
     * @inheritDoc
     */
    public function getMessageType()
    {
        return new MessageType(MessageType::BAD_REQUEST);
    }

    /**
     * @inheritDoc
     */
    public function sendResponseTo()
    {
        return null;
    }

}