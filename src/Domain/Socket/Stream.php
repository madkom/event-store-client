<?php

namespace EventStore\Client\Domain\Socket;

use EventStore\Client\Domain\Socket\Message\SocketMessage;

/**
 * Interface Stream
 * @package EventStore\Client\Domain\Socket
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
interface Stream
{

    /**
     * @param string $binaryData
     *
     * @return void
     */
    public function write($binaryData);

    /**
     * Closes the connection
     *
     * @return void
     */
    public function closeConnection();

    /**
     * Method run when new data arrives to stream
     *
     * @param \Closure $closure
     *
     * @return SocketMessage
     */
    public function onData(\Closure $closure);

}