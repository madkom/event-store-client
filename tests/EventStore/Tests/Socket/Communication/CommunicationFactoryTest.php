<?php
use Madkom\EventStore\Client\Domain\Socket\Communication\CommunicationFactory;
use Madkom\EventStore\Client\Domain\Socket\Communication\Type;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageType;

/**
 * Class CommunicationFactoryTest
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class CommunicationFactoryTest extends PHPUnit_Framework_TestCase
{

    /** @var  CommunicationFactory */
    private $communicationFactory;

    public function setUp()
    {
        $this->communicationFactory = new CommunicationFactory();
    }

    /**
     * @test
     * @dataProvider messagesToAcceptProvider
     */
    public function it_should_create_new_communication($typeOfMessage, $expectedHandler)
    {
        $messageType = $this->prophesize('Madkom\EventStore\Client\Domain\Socket\Message\MessageType');
        $messageType->getType()->willReturn($typeOfMessage);

        PHPUnit_Framework_Assert::assertInstanceOf($expectedHandler, $this->communicationFactory->create($messageType->reveal()));
    }

    public function messagesToAcceptProvider()
    {
        return [
            [
                MessageType::PONG,
                Type\PongHandler::class
            ],
            [
                MessageType::HEARTBEAT_REQUEST,
                Type\HeartBeatRequestHandler::class
            ],
            [
                MessageType::READ_STREAM_EVENTS_FORWARD_COMPLETED,
                Type\ReadStreamEventsCompletedHandler::class
            ],
            [
                MessageType::READ_ALL_EVENTS_FORWARD_COMPLETED,
                Type\ReadAllEventsCompletedHandler::class
            ],
            [
                MessageType::READ_ALL_EVENTS_BACKWARD_COMPLETED,
                Type\ReadAllEventsCompletedHandler::class
            ],
            [
                MessageType::SUBSCRIPTION_CONFIRMATION,
                Type\SubscriptionConfirmationHandler::class
            ],
            [
                MessageType::SUBSCRIPTION_DROPPED,
                Type\SubscriptionDroppedHandler::class
            ],
            [
                MessageType::PERSISTENT_SUBSCRIPTION_STREAM_EVENT_APPEARED,
                Type\PersistentSubscriptionStreamEventAppearedHandler::class
            ],
            [
                MessageType::BAD_REQUEST,
                Type\BadRequestHandler::class
            ],
            [
                MessageType::WRITE_EVENTS_COMPLETED,
                Type\WriteEventsCompletedHandler::class
            ],
            [
                MessageType::STREAM_EVENT_APPEARED,
                Type\StreamEventAppearedHandler::class
            ],
            [
                MessageType::NOT_AUTHENTICATED,
                Type\NotAuthenticatedHandler::class
            ]
        ];
    }
}