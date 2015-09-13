<?php

namespace EventStore\Client\Domain\Socket\Communication;


use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;

/**
 * Interface Communicable
 * @package EventStore\Client\Domain\Socket\Communication
 * @author  Dariusz Gafka <dgafka.mail@gmail.com>
 */
interface Communicable
{

    /**
     * @param SocketMessage $socketMessage
     *
     * @return SocketMessage
     */
    public function handle(SocketMessage $socketMessage);

    /**
     * What kind of message is it
     *
     * @return MessageType
     */
    public function getMessageType();

    /**
     * What message type it should respond to.
     * For example HeartBeatRequest message response to HeartBeatResponse
     *
     * @return null|MessageType
     */
    public function sendResponseTo();

}