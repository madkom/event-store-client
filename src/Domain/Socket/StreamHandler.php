<?php

namespace EventStore\Client\Domain\Socket;

use EventStore\Client\Domain\DomainException;
use EventStore\Client\Domain\Socket\Communication\CommunicationFactory;
use EventStore\Client\Domain\Socket\Message\MessageComposer;
use EventStore\Client\Domain\Socket\Message\MessageDecomposer;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;
use Psr\Log\LoggerInterface;

/**
 * Class StreamHandler
 * @package EventStore\Client\Domain\Socket
 * @author  Dariusz Gafka <dgafka.mail@gmail.com>
 */
class StreamHandler
{

    /** @var  Stream */
    private $stream;

    /** @var  MessageDecomposer */
    private $messageDecomposer;

    /** @var  MessageComposer */
    private $messageComposer;

    /**
     * @var LoggerInterface
     */
    private $logger;

    //@TODO multi-part-message
    private $currentMessage;

    /**
     * @param Stream               $stream
     * @param LoggerInterface      $logger
     * @param MessageDecomposer    $messageDecomposer
     * @param MessageComposer      $messageComposer
     */
    public function __construct(Stream $stream, LoggerInterface $logger, MessageDecomposer $messageDecomposer, MessageComposer $messageComposer)
    {
        $this->stream               = $stream;
        $this->messageDecomposer    = $messageDecomposer;
        $this->messageComposer      = $messageComposer;
        $this->logger = $logger;
    }

    /**
     * Handles received data
     *
     * @param string $data
     *
     * @return SocketMessage
     */
    public function handle($data)
    {

        if(!$data) {
            echo "\nEmpty Data\n";
            return null;
        }

        $socketMessage = $this->messageDecomposer->decomposeMessage($data);

        //If heartbeat then response
        if($socketMessage->getMessageType()->getType() === MessageType::HEARTBEAT_REQUEST) {
            $this->sendMessage(new SocketMessage(new MessageType(MessageType::HEARTBEAT_RESPONSE), $socketMessage->getCorrelationID()));
        }

        return $socketMessage;
    }

    /**
     * Sends message to stream sever
     *
     * @param SocketMessage $socketMessage
     *
     * @return void
     * @throws DomainException
     */
    public function sendMessage(SocketMessage $socketMessage)
    {
        try {
            $binaryMessage = $this->messageComposer->compose($socketMessage);

            $this->stream->write($binaryMessage);
        }catch (\Exception $e) {
            $this->logger->critical('Error during '. $socketMessage->getMessageType()->getType() . ' with id ' . $socketMessage->getCorrelationID() . '. Message Error: ' . $e->getMessage());
        }
    }

}