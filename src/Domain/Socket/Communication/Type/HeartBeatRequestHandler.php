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