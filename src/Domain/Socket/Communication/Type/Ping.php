<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;

use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;

/**
 * Class Ping
 *
 * @package EventStore\Client\Domain\Socket\Communication\Type
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class Ping implements Communicable
{

	/**
	 * @param SocketMessage $socketMessage
	 *
	 * @return SocketMessage
	 */
	public function handle(SocketMessage $socketMessage)
	{
		return $socketMessage;
	}

	/**
	 * What kind of message is it
	 *
	 * @return MessageType
	 */
	public function getMessageType()
	{
		return new MessageType(MessageType::PING);
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