<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;

use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;

/**
 * Class HeartBeatResponse
 * @package EventStore\Client\Domain\Socket\Communication
 * @author  Dariusz Gafka <dgafka.mail@gmail.com>
 */
class HeartBeatResponseHandler implements Communicable
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
        return new MessageType(MessageType::HEARTBEAT_RESPONSE);
    }

    /**
     * @inheritDoc
     */
    public function sendResponseTo()
    {
        null;
    }

}