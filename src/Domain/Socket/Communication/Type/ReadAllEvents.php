<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;

use EventStore\Client\Domain\DomainException;
use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;
use EventStore\Client\Domain\Socket\Data;

/**
 * Class ReadAllEventsForward
 * @package EventStore\Client\Domain\Socket\Communication\Type
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class ReadAllEvents implements Communicable
{

    /**
     *  Data passed to socket message =
     *  [
     *      eventStreamId => 'streamName', stream name
     *      fromEventNumber => 0, events offset
     *      maxCount => 100, max amount of returned records
     *      resolveLinkTos => true, True, to resolve links to events in other streams [Optional]
     *      requireMaster => false [Optional]
     *  ]
     *
     * @param SocketMessage $socketMessage
     *
     * @return SocketMessage
     * @throws DomainException
     */
    public function handle(SocketMessage $socketMessage)
    {
        if(!($socketMessage->getData() instanceof Data\ReadAllEvents)) {
            throw new DomainException('Passed data in socket message isn\'t type of Data\ReadAllEvents.');
        }

        $data = $socketMessage->getData();

        return $socketMessage->changeData($data->serializeToString());
    }

    /**
     * What kind of message is it
     *
     * @return MessageType
     */
    public function getMessageType()
    {
        return new MessageType(MessageType::READ_ALL_EVENTS_FORWARD);
    }

    /**
     * What message type it should respond to.
     * For example HeartBeatRequest message response to HeartBeatResponse
     *
     * @return null|MessageType
     */
    public function sendResponseTo()
    {
        return null;
    }

}