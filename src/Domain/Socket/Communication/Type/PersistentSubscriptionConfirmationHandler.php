<?php

namespace Madkom\EventStore\Client\Domain\Socket\Communication\Type;

use Madkom\EventStore\Client\Domain\Socket\Communication\Communicable;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageType;
use Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage;
use Madkom\EventStore\Client\Domain\Socket\Data;

/**
 * Class PersistentSubscriptionConfirmationHandler
 *
 * @package Madkom\EventStore\Client\Domain\Socket\Communication\Type
 * @author Jur Jean
 */
class PersistentSubscriptionConfirmationHandler implements Communicable
{

    /**
     * @inheritDoc
     */
    public function handle(MessageType $messageType, $correlationID, $data)
    {
        $dataObject = new Data\PersistentSubscriptionConfirmation();
        $dataObject->parseFromString($data);
        $dataObject->dump();

        return new SocketMessage($messageType, $correlationID, $dataObject);
    }

}