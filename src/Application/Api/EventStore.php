<?php

namespace EventStore\Client\Application\Api;

use EventStore\Client\Domain\Socket\Communication\CommunicationFactory;
use EventStore\Client\Domain\Socket\Message\MessageComposer;
use EventStore\Client\Domain\Socket\Message\MessageDecomposer;
use EventStore\Client\Domain\Socket\Message\SocketMessage;
use EventStore\Client\Domain\Socket\Stream;
use EventStore\Client\Domain\Socket\StreamHandler;

/**
 * Class EventStore
 * @package EventStore\Client\Application\Api
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class EventStore
{

    /** @var Stream  */
    private $streamHandler;

    /**
     * @param Stream $stream
     */
    public function __construct(Stream $stream)
    {
        $this->streamHandler = new StreamHandler($stream, new MessageDecomposer(), new MessageComposer(), new CommunicationFactory());
    }

    /**
     * Runs action
     *
     * @param SocketMessage $socketMessage
     */
    public function runActionAsync(SocketMessage $socketMessage)
    {
//        $this->streamHandler->
    }

    public function runActionSync(SocketMessage $socketMessage)
    {
//        $this->streamHandler->
    }

}