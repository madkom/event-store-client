<?php

namespace Madkom\EventStore\Client\Domain\Socket;

use Madkom\EventStore\Client\Domain\DomainException;
use Madkom\EventStore\Client\Domain\Socket\Communication\CommunicationFactory;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageComposer;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageConfiguration;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageDecomposer;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageType;
use Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage;
use Psr\Log\LoggerInterface;
use TrafficCophp\ByteBuffer\Buffer;

/**
 * Class StreamHandler
 * @package Madkom\EventStore\Client\Domain\Socket
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

    /** @var null|string current unfinish packaged recevied from ES */
    private $currentMessage = null;

    /** @var null Length of the package */
    private $currentMessageLength = null;

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
     * @return SocketMessage[]|null
     */
    public function handle($data)
    {
        try {
            if (!$data) {
                return null;
            }

            $socketMessages = array();

            if (!is_null($this->currentMessage)) {
                $data = $this->currentMessage . $data;
            }

            do {
                $buffer          = new Buffer($data);
                $dataLength      = strlen($data);
                $messageLength   = $buffer->readInt32LE(0) + MessageConfiguration::INT_32_LENGTH;

                if ($dataLength == $messageLength)
                {
                    $socketMessages[] = $this->decomposeMessage($data);
                    $this->currentMessage = null;
                } elseif($dataLength > $messageLength) {
                    $message = substr($data, 0, $messageLength);
                    $socketMessages[] = $this->decomposeMessage($message);

                    // reset data to next message
                    $data = substr($data, $messageLength, $dataLength);
                    $this->currentMessage = null;
                } else {
                    $this->currentMessage .= $data;
                }

            } while ($dataLength > $messageLength);

            return $socketMessages;

        }catch (\Exception $e) {
            $this->logger->critical('Error during handling incoming message.'.  ' Message Error: ' . $e->getMessage());
        }
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
            $this->logger->critical('Error during send a message with '. $socketMessage->getMessageType()->getType() . ' and id ' . $socketMessage->getCorrelationID() . '. Message Error: ' . $e->getMessage());
        }
    }

    /**
     * @param $data
     *
     * @return SocketMessage
     */
    private function decomposeMessage($data)
    {
        $socketMessage = $this->messageDecomposer->decomposeMessage($data);

        //If heartbeat then response
        if ($socketMessage->getMessageType()->getType() === MessageType::HEARTBEAT_REQUEST) {
            $this->sendMessage(new SocketMessage(new MessageType(MessageType::HEARTBEAT_RESPONSE), $socketMessage->getCorrelationID()));
        }

        return $socketMessage;
    }

}
