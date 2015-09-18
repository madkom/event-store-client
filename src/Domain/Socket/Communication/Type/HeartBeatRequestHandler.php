<?php

namespace Madkom\EventStore\Client\Domain\Socket\Communication\Type;

use Madkom\EventStore\Client\Domain\Socket\Communication\Communicable;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageType;
use Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage;

/**
 * Class HeartBeatResponse
 * @package Madkom\EventStore\Client\Domain\Socket\Communication
 * @author  Dariusz Gafka <dgafka.mail@gmail.com>
 */
class HeartBeatRequestHandler implements Communicable
{

    /**
     * @inheritDoc
     */
    public function handle(MessageType $messageType, $correlationID, $data)
    {
        return new SocketMessage($messageType, $correlationID);
    }

}