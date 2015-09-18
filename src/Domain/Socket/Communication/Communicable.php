<?php

namespace Madkom\EventStore\Client\Domain\Socket\Communication;


use Madkom\EventStore\Client\Domain\Socket\Message\MessageType;
use Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage;

/**
 * Interface Communicable
 * @package Madkom\EventStore\Client\Domain\Socket\Communication
 * @author  Dariusz Gafka <dgafka.mail@gmail.com>
 */
interface Communicable
{

    /**
     * @param MessageType $messageType
     * @param string      $correlationID
     * @param string      $data
     *
     * @return SocketMessage
     * @internal param SocketMessage $socketMessage
     *
     */
    public function handle(MessageType $messageType, $correlationID, $data);

}