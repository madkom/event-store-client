<?php

/**
 * Class ReadStreamEventsForwardTest
 *
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class ReadStreamEventsForwardTest extends PHPUnit_Framework_TestCase
{

	/** @var  \EventStore\Client\Domain\Socket\Communication\Type\ReadStreamEventsForward */
	private $readStreamEventsForward;

	/** @var  \EventStore\Client\Domain\Socket\Message\SocketMessage */
	private $socketMessage;

	public function setUp()
	{
		$this->readStreamEventsForward = new \EventStore\Client\Domain\Socket\Communication\Type\ReadStreamEventsForward();

		/** @var \EventStore\Client\Domain\Socket\Message\SocketMessage $socketMessage */
		$this->socketMessage = $this->prophesize('EventStore\Client\Domain\Socket\Message\SocketMessage');
	}

	/**
	 * @test
	 * @expectedException \InvalidArgumentException
	 */
	public function it_should_throw_exception_when_wrong_data_type_passed()
	{
		$this->socketMessage->getData()->willReturn('test');

		$this->readStreamEventsForward->handle($this->socketMessage->reveal());
	}

	/**
	 * @test
	 * @expectedException \InvalidArgumentException
	 */
	public function it_should_throw_exception_when_no_stream_id_passed()
	{
		$this->socketMessage->getData()->willReturn(['fromEventNumber' => 0, 'maxCount' => 100]);

		$this->readStreamEventsForward->handle($this->socketMessage->reveal());
	}

	/**
	 * @test
	 * @expectedException \InvalidArgumentException
	 */
	public function it_should_throw_exception_when_no_from_event_number_passed()
	{
		$this->socketMessage->getData()->willReturn(['eventStreamId' => 0, 'maxCount' => 100]);

		$this->readStreamEventsForward->handle($this->socketMessage->reveal());
	}

	/**
	 * @test
	 * @expectedException \InvalidArgumentException
	 */
	public function it_should_throw_exception_when_no_max_count_passed()
	{
		$this->socketMessage->getData()->willReturn(['fromEventNumber' => 0, 'eventStreamId' => 100]);

		$this->readStreamEventsForward->handle($this->socketMessage->reveal());
	}

	/**
	 * @test
	 * @expectedException \InvalidArgumentException
	 */
	public function it_should_throw_exception_when_no_data_passed()
	{
		$this->socketMessage->getData()->willReturn([]);

		$this->readStreamEventsForward->handle($this->socketMessage->reveal());
	}

	/**
	 * @test
	 */
	public function it_should_return_socket_message()
	{
		$this->socketMessage->getData()->willReturn(['fromEventNumber' => 0, 'eventStreamId' => 100, 'maxCount' => 10]);
		$this->socketMessage->changeData(json_encode(['fromEventNumber' => 0, 'eventStreamId' => 100, 'maxCount' => 10, 'resolveLinkTos' => true, 'requireMaster' => false]))->willReturn($this->socketMessage);

		PHPUnit_Framework_Assert::assertInstanceOf('EventStore\Client\Domain\Socket\Message\SocketMessage', $this->readStreamEventsForward->handle($this->socketMessage->reveal()));
	}

	/**
	 * @test
	 */
	public function it_should_return_message_type()
	{
		$messageType = $this->readStreamEventsForward->getMessageType();
		PHPUnit_Framework_Assert::assertInstanceOf('EventStore\Client\Domain\Socket\Message\MessageType', $messageType);
		PHPUnit_Framework_TestCase::assertEquals(\EventStore\Client\Domain\Socket\Message\MessageType::READ_STREAM_EVENTS_FORWARD, $messageType->getType());
	}

	/**
	 * @test
	 */
	public function it_should_has_no_response()
	{
		PHPUnit_Framework_TestCase::assertEmpty($this->readStreamEventsForward->sendResponseTo());
	}

}