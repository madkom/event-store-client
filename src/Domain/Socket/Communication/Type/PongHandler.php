<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;

use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;

/**
 * Class Pong
 *
 * @package EventStore\Client\Domain\Socket\Communication\Type
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class PongHandler implements Communicable
{

	/**
	 * @inheritdoc
	 */
	public function handle(MessageType $messageType, $correlationID, $data)
	{
		return new SocketMessage($messageType, $correlationID);
	}

}