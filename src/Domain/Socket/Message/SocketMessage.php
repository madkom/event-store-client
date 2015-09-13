<?php

namespace EventStore\Client\Domain\Socket\Message;

/**
 * Class SocketMessage - Represents decoded message from socket stream
 *
 * @package EventStore\Client\Domain\Socket
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class SocketMessage
{

	/** @var  MessageType */
	private $messageType;

	/** @var  string */
	private $flag;

	/** @var  string */
	private $correlationID;

	/** @var  mixed */
	private $data;

	/**
	 * @param MessageType $messageType
	 * @param string  $flag
	 * @param string  $correlationID
	 * @param string  $data
	 */
	public function __construct(MessageType $messageType, $flag, $correlationID, $data)
	{
		$this->messageType = $messageType;
		$this->flag    = $flag;
		$this->correlationID = $correlationID;
		$this->data    = $data;
	}

	/**
	 * Changes data of socket message
	 *
	 * @param $data
	 *
	 * @return static
	 */
	public function changeData($data)
	{
		return new static($this->messageType, $this->flag, $this->correlationID, $data);
	}

	/**
	 * Changes message type
	 *
	 * @param MessageType $messageType
	 *
	 * @return static
	 */
	public function changeMessageType(MessageType $messageType)
	{
		return new static($messageType, $this->flag, $this->correlationID, $this->data);
	}

	/**
	 * @return MessageType
	 */
	public function getMessageType()
	{
		return $this->messageType;
	}

	/**
	 * @return string
	 */
	public function getFlag()
	{
		return $this->flag;
	}

	/**
	 * @return string
	 */
	public function getCorrelationID()
	{
		return $this->correlationID;
	}

	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}

}