<?php

namespace EventStore\Client\Domain\Socket;

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

}