<?php

/**
 * Class CommunicationFactoryTest
 * @author Dariusz Gafka <dgafka.mail@gmail.com>
 */
class CommunicationFactoryTest extends PHPUnit_Framework_TestCase
{

    /** @var  \Madkom\EventStore\Client\Domain\Socket\Communication\CommunicationFactory */
    private $communicationFactory;

    public function setUp()
    {
        $this->communicationFactory = new \Madkom\EventStore\Client\Domain\Socket\Communication\CommunicationFactory();
    }

    /**
     * @test
     */
    public function it_should_create_new_communication()
    {
        $messageType = $this->prophesize('Madkom\EventStore\Client\Domain\Socket\Message\MessageType');
        $messageType->getType()->willReturn(\Madkom\EventStore\Client\Domain\Socket\Message\MessageType::HEARTBEAT_REQUEST);

        PHPUnit_Framework_Assert::assertInstanceOf('Madkom\EventStore\Client\Domain\Socket\Communication\Type\HeartBeatRequestHandler', $this->communicationFactory->create($messageType->reveal()));
    }

}