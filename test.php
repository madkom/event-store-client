<?php
require_once('vendor/autoload.php');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$loop = React\EventLoop\Factory::create();

$dnsResolverFactory = new React\Dns\Resolver\Factory();
$dns = $dnsResolverFactory->createCached(null, $loop);


$connector = new React\SocketClient\Connector($loop, $dns);

$resolvedConnection = $connector->create('172.17.42.1', 1113);
$resolvedConnection->then(function (React\Stream\Stream $stream) {

    $streamAdapter = new \EventStore\Client\Infrastructure\ReactStream($stream);
    $streamHandler = new \EventStore\Client\Domain\Socket\StreamHandler($streamAdapter, new \EventStore\Client\Infrastructure\InMemoryLogger(), new \EventStore\Client\Domain\Socket\Message\MessageDecomposer(new \EventStore\Client\Domain\Socket\Communication\CommunicationFactory()), new \EventStore\Client\Domain\Socket\Message\MessageComposer());

    $stream->on('data', function($data) use($streamHandler){
        $streamHandler->handle($data);
    });

    $streamHandler->sendMessage(new \EventStore\Client\Domain\Socket\Message\SocketMessage(
        new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::PING),
        null,
        null));

    $readStreamEvent = new \EventStore\Client\Domain\Socket\Data\ReadStreamEvents();
    $readStreamEvent->setEventStreamId('TestStream2');
    $readStreamEvent->setResolveLinkTos(false);
    $readStreamEvent->setRequireMaster(false);
    $readStreamEvent->setMaxCount(1000);
    $readStreamEvent->setFromEventNumber(0);

    $streamHandler->sendMessage(
        new \EventStore\Client\Domain\Socket\Message\SocketMessage(
            new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::READ_STREAM_EVENTS_FORWARD),
            null,
            $readStreamEvent)
        );

    $readAllEvent = new EventStore\Client\Domain\Socket\Data\ReadAllEvents();
    $readAllEvent->setMaxCount(1000);
    $readAllEvent->setRequireMaster(false);
    $readAllEvent->setResolveLinkTos(true);
    $readAllEvent->setCommitPosition(1000);
    $readAllEvent->setPreparePosition(1000);

    $streamHandler->sendMessage(
        new \EventStore\Client\Domain\Socket\Message\SocketMessage(
            new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::READ_ALL_EVENTS_FORWARD),
            null,
            $readAllEvent)
    );

    $subscribeToStream = new \EventStore\Client\Domain\Socket\Data\SubscribeToStream();
    $subscribeToStream->setEventStreamId('TestStream');
    $subscribeToStream->setResolveLinkTos(true);

    $streamHandler->sendMessage(
        new \EventStore\Client\Domain\Socket\Message\SocketMessage(
            new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::SUBSCRIBE_TO_STREAM),
            null,
            $subscribeToStream,
            null
            )
    );


    $unsubscribeToStream = new \EventStore\Client\Domain\Socket\Data\UnsubscribeFromStream();
    $streamHandler->sendMessage(
        new \EventStore\Client\Domain\Socket\Message\SocketMessage(
            new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::UNSUBSCRIBE_FROM_STREAM),
            null,
            $unsubscribeToStream,
            null
            )
    );



    $event = new \EventStore\Client\Domain\Socket\Data\NewEvent();
    $event->setData(json_encode(['test' => 'bla']));
    $event->setEventType('testType');
    $event->setEventId(hex2bin(md5('12323')));
    $event->setDataContentType(1);
    $event->setMetadataContentType(2);

    $writeEvents = new \EventStore\Client\Domain\Socket\Data\WriteEvents();
    $writeEvents->appendEvents($event);
    $writeEvents->setEventStreamId('TestStream2');
    $writeEvents->setExpectedVersion(1);
    $writeEvents->setRequireMaster(false);

    $streamHandler->sendMessage(
        new \EventStore\Client\Domain\Socket\Message\SocketMessage(
            new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::WRITE_EVENTS),
            null,
            $writeEvents)
    );

//    $stream->close();
});

//$tmp = new EventStore\Client\Domain\Socket\Data\ReadStreamEvents();
//$tmp->setEventStreamId('dsad');
//$tmp->setFromEventNumber(2);
//$tmp->setMaxCount(100);
//$tmp->setResolveLinkTos(true);
//$tmp->setRequireMaster(false);
//echo 'a' . $tmp->serializeToString();
//die('a');
try {
    $loop->run();

}catch (\Exception $e) {
    echo $e->getMessage();
}
