<?php

namespace EventStore\Client\Infrastructure;

use EventStore\Client\Domain\Socket\Stream;
use React\Stream\Stream as ReactStreamApi;

/**
 * Class ReactStream
 *
 * @package EventStore\Client\Infrastructure
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


}