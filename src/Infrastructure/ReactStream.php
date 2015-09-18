<?php

namespace Madkom\EventStore\Client\Infrastructure;

use Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage;
use Madkom\EventStore\Client\Domain\Socket\Stream;
use React\Stream\Stream as ReactStreamApi;

/**
 * Class ReactStream
 *
 * @package Madkom\EventStore\Client\Infrastructure
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class ReactStream implements Stream
{

    /** @var ReactStreamApi  */
    private $reactStream;

    /**
     * @param ReactStreamApi $stream
     */
    public function __construct(ReactStreamApi $stream)
    {
        $this->reactStream = $stream;
    }

    /**
     * @param $binaryData
     *
     * @return void
     */
    public function write($binaryData)
    {
        $this->reactStream->write($binaryData);
    }

    /**
     * @inheritDoc
     */
    public function closeConnection()
    {
        $this->reactStream->close();
    }

    /**
     * @inheritDoc
     */
    public function onData(\Closure $closure)
    {
        $this->reactStream->on('data', $closure);
    }

}