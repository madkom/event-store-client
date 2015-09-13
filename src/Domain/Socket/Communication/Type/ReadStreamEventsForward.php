<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;


use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;
use TrafficCophp\ByteBuffer\Buffer;

/**
 * Class ReadStreamEventsForward
 *
 * @package EventStore\Client\Domain\Socket\Communication\Type
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class ReadStreamEventsForward implements Communicable
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
	 *
	 * @return SocketMessage
	 */
	public function handle(SocketMessage $socketMessage)
	{
		$data = $socketMessage->getData();
		if (!is_array($data)) {
			throw new \InvalidArgumentException("Socket Message Data, need to be array");
		}

		if(!isset($data['event_stream_id']) || !isset($data['from_event_number']) || !isset($data['max_count'])) {
			throw new \InvalidArgumentException("Socket Message data need to contain 'eventStreamId', 'fromEventNumber' and 'maxCount'");
		}

		$data['resolve_link_tos'] = array_key_exists('resolve_link_tos', $data) ? $data['resolve_link_tos'] : true;
		$data['require_master']  = array_key_exists('require_master', $data) ? $data['require_master'] : false;

		$messageLength = strlen($data['event_stream_id'] . $data['from_event_number'] . $data['max_count'] . $data['resolve_link_tos'] . $data['require_master']);
		$messageBuffer = new Buffer($messageLength);
		$messageBuffer->write(strlen($data['event_stream_id']), 0);
		$messageBuffer->writeInt32LE($data['from_event_number'], strlen($data['event_stream_id']));
		$messageBuffer->writeInt32LE($data['max_count'], strlen($data['event_stream_id']) + strlen($data['from_event_number']));
		$messageBuffer->write($data['resolve_link_tos'], strlen($data['event_stream_id']) + strlen($data['from_event_number']) + strlen($data['max_count']));
		$messageBuffer->write($data['require_master'], ( strlen($data['event_stream_id']) + strlen($data['from_event_number']) + strlen($data['max_count']) + strlen($data['resolve_link_tos']) ));

		return $socketMessage->changeData((string)$messageBuffer);
	}

	/**
	 * What kind of message is it
	 *
	 * @return MessageType
	 */
	public function getMessageType()
	{
		return new MessageType(MessageType::READ_STREAM_EVENTS_FORWARD);
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