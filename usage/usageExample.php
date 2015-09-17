<?php
require_once('../vendor/autoload.php');

/**
    Example is used with React stream, but you can use whatever library you want to as long as it implement EventStore\Client\Domain\Socket\Stream
    Your EventStore must be up, to handle connection
 */

$loop = React\EventLoop\Factory::create();

$dnsResolverFactory = new React\Dns\Resolver\Factory();
$dns = $dnsResolverFactory->createCached(null, $loop);


$connector = new React\SocketClient\Connector($loop, $dns);

$resolvedConnection = $connector->create('127.0.0.1', 1113);
$resolvedConnection->then(function (React\Stream\Stream $stream) {

    // We create Event Store API Object
    $eventStore = new \EventStore\Client\Application\Api\EventStore(new \EventStore\Client\Infrastructure\ReactStream($stream), new \EventStore\Client\Infrastructure\InMemoryLogger());

    // We add bunch of listeners, because API is asynchronous
    $eventStore->addAction(\EventStore\Client\Domain\Socket\Message\MessageType::HEARTBEAT_REQUEST, function() {
        echo "I response to ES heartbeat request\n";
    });

    $eventStore->addAction(\EventStore\Client\Domain\Socket\Message\MessageType::WRITE_EVENTS_COMPLETED, function($data) {
        echo "Added new event: \n";
//        print_r($data);
    });

    $eventStore->addAction(\EventStore\Client\Domain\Socket\Message\MessageType::READ_STREAM_EVENTS_FORWARD_COMPLETED, function($data){
        print_r($data);
    });

    //We start to listen for event we added
    $eventStore->run();


    //Now let's try writing messages to stream
    $eventStreamId = 'someteststream';

//    Add new event to stream
    $event = new \EventStore\Client\Domain\Socket\Data\NewEvent();
    $event->setData(json_encode(['test' => 'bla']));
    $event->setEventType('testType');
//    UUID must have 32bits
    $event->setEventId(hex2bin(md5(\Rhumsaa\Uuid\Uuid::uuid4())));
    $event->setDataContentType(1);
    $event->setMetadataContentType(2);

    $writeEvents = new \EventStore\Client\Domain\Socket\Data\WriteEvents();
    $writeEvents->setEventStreamId($eventStreamId);
    $writeEvents->setExpectedVersion(-2);
//    If you don't have master-slave nodes
    $writeEvents->setRequireMaster(false);
    $writeEvents->appendEvents($event);

    $eventStore->sendMessage(
        new \EventStore\Client\Domain\Socket\Message\SocketMessage(
            new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::WRITE_EVENTS),
            null,
            $writeEvents)
    );

    $readStreamEvent = new \EventStore\Client\Domain\Socket\Data\ReadStreamEvents();
    $readStreamEvent->setEventStreamId($eventStreamId);
    $readStreamEvent->setResolveLinkTos(false);
    $readStreamEvent->setRequireMaster(false);
    $readStreamEvent->setMaxCount(100);
    $readStreamEvent->setFromEventNumber(0);

    $eventStore->sendMessage(new \EventStore\Client\Domain\Socket\Message\SocketMessage(
        new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::READ_STREAM_EVENTS_FORWARD),
        null,
        $readStreamEvent,
        new \EventStore\Client\Domain\Socket\Message\Credentials('admin', 'changeit')
    ));
});

$loop->run();