<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;

use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;

/**
 * Class HeartBeatRequest
 * @package EventStore\Client\Domain\Socket\Communication\Type
 * @author  Dariusz Gafka <dgafka.mail@gmail.com>
 */
class HeartBeatRequestHandler implements Communicable
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
        return new MessageType(MessageType::HEARTBEAT_REQUEST);
    }

    /**
     * @inheritDoc
     */
    public function sendResponseTo()
    {
        return new MessageType(MessageType::HEARTBEAT_RESPONSE);
    }

}