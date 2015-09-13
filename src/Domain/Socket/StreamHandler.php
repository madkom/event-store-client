<?php

namespace EventStore\Client\Domain\Socket;

use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Communication\CommunicationFactory;
use EventStore\Client\Domain\Socket\Message\MessageComposer;
use EventStore\Client\Domain\Socket\Message\MessageDecomposer;
use EventStore\Client\Domain\Socket\Message\SocketMessage;

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

    /** @var  CommunicationFactory */
    private $communicationFactory;

    //@TODO multi-part-message
    private $currentMessage;

    /**
     * @param Stream               $stream
     * @param MessageDecomposer    $messageDecomposer
     * @param MessageComposer      $messageComposer
     * @param CommunicationFactory $communicationFactory
     */
    public function __construct(Stream $stream, MessageDecomposer $messageDecomposer, MessageComposer $messageComposer, CommunicationFactory $communicationFactory)
    {
        $this->stream               = $stream;
        $this->messageDecomposer    = $messageDecomposer;
        $this->messageComposer      = $messageComposer;
        $this->communicationFactory = $communicationFactory;
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

        $communicable  = $this->communicationFactory->create($socketMessage->getMessageType());
        $socketMessage = $communicable->handle($socketMessage);
        $respondToType = $communicable->sendResponseTo();

        if(!is_null($respondToType)) {
            $this->sendMessage($socketMessage->changeMessageType($respondToType));
        }

        return $socketMessage;
    }

    /**
     * Sends message to stream sever
     *
     * @param SocketMessage $socketMessage
     *
     * @return void
     */
    public function sendMessage(SocketMessage $socketMessage)
    {
        $communicable = $this->communicationFactory->create($socketMessage->getMessageType());
        $socketMessage = $communicable->handle($socketMessage);

        $binaryMessage = $this->messageComposer->compose($socketMessage);

        $this->stream->write($binaryMessage);
    }

}