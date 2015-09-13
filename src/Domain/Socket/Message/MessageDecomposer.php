<?php

namespace EventStore\Client\Domain\Socket\Message;


use TrafficCophp\ByteBuffer\Buffer;

/**
 * Class MessageDecomposer
 * @package EventStore\Client\Domain\Socket
 * @author  Dariusz Gafka <dgafka.mail@gmail.com>
 */
class MessageDecomposer
{

	/**
	 * Decomposes binary message, which comes from the stream
	 *
	 * @param string $message
	 *
	 * @return SocketMessage
	 */
	public function decomposeMessage($message)
	{
		$buffer = new Buffer($message);

		// Information about how long message is. To help it decode. Comes from the server
		// $messageLenght = (whole stream length) - (4 bytes for saved length).
		$messageLength = $buffer->readInt32LE(0);


		$messageType = new MessageType($buffer->readInt8(MessageConfiguration::MESSAGE_TYPE_OFFSET));
		$flag    = $buffer->readInt8(MessageConfiguration::FLAG_OFFSET);
		$correlationID = bin2hex($buffer->read(MessageConfiguration::CORRELATION_ID_OFFSET, MessageConfiguration::CORRELATION_ID_LENGTH));
		$data = $buffer->read(MessageConfiguration::DATA_OFFSET, $messageLength - MessageConfiguration::HEADER_LENGTH);


		return new SocketMessage($messageType, $flag, $correlationID, $data);

	}




}