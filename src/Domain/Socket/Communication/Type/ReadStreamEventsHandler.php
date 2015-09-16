<?php

namespace EventStore\Client\Domain\Socket\Communication\Type;

use EventStore\Client\Domain\DomainException;
use EventStore\Client\Domain\Socket\Communication\Communicable;
use EventStore\Client\Domain\Socket\Message\MessageType;
use EventStore\Client\Domain\Socket\Message\SocketMessage;
use EventStore\Client\Domain\Socket\Data;

/**
 * Class ReadStreamEventsForward
 *
 * @package EventStore\Client\Domain\Socket\Communication\Type
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class ReadStreamEventsHandler implements Communicable
{

	/**
	 * @inheritDoc
	 */
	public function handle(SocketMessage $socketMessage)
	{
		if(!($socketMessage->getData() instanceof Data\ReadStreamEvents)) {
			throw new DomainException('Passed data in socket message isn\'t type of Data\ReadStreamEvents.');
		}

		$data = $socketMessage->getData();
		return $socketMessage->changeData($data->serializeToString());
	}

	/**
	 * @inheritDoc
	 */
	public function getMessageType()
	{
		return new MessageType(MessageType::READ_STREAM_EVENTS_FORWARD);
	}

	/**
	 * @inheritDoc
	 */
	public function sendResponseTo()
	{
		return null;
	}


}