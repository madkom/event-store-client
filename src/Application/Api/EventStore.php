<?php

namespace Madkom\EventStore\Client\Application\Api;

use Madkom\EventStore\Client\Domain\Socket\Communication\CommunicationFactory;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageComposer;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageDecomposer;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageType;
use Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage;
use Madkom\EventStore\Client\Domain\Socket\Stream;
use Madkom\EventStore\Client\Domain\Socket\StreamHandler;
use Psr\Log\LoggerInterface;

/**
 * Class EventStore
 * @package Madkom\EventStore\Client\Application\Api
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class EventStore
{

    /** @var StreamHandler  */
    private $streamHandler;

    /** @var Stream  */
    private $stream;

    /** @var array  */
    private $actionsToRun = [];

    /**
     * @param Stream          $stream
     * @param LoggerInterface $loggerInterface
     */
    public function __construct(Stream $stream, LoggerInterface $loggerInterface)
    {
        $this->streamHandler = new StreamHandler($stream, $loggerInterface, new MessageDecomposer(new CommunicationFactory()), new MessageComposer());
        $this->stream = $stream;
    }

    /**
     * Send message via socket
     *
     * @param SocketMessage $socketMessage
     */
    public function sendMessage(SocketMessage $socketMessage)
    {
        $this->streamHandler->sendMessage($socketMessage);
    }

    /**
     * Adds listeners for specific message
     *
     * @param int         $messageType taken from MessageType cons
     * @param \Closure    $callback
     *
     */
    public function addAction($messageType, \Closure $callback)
    {
        $messageType = new MessageType($messageType);

        if(array_key_exists($messageType->getType(), $this->actionsToRun)) {
           throw new \InvalidArgumentException($messageType->getType() . ' is already registered');
        }

        $this->actionsToRun[$messageType->getType()] = $callback;
    }

    /**
     * Enables listeners
     */
    public function run()
    {
        $actionsToRun = $this->actionsToRun;
        $streamHandler = $this->streamHandler;

        $this->stream->onData(function($data) use($streamHandler, $actionsToRun) {

            $socketMessage = $streamHandler->handle($data);
            if(is_null($socketMessage)) {
                return;
            }
            foreach ($actionsToRun as $key => $callback) {
               if ($key === $socketMessage->getMessageType()->getType()) {
                    $callback($socketMessage);
                    return;
               }
            }
        });
    }



}