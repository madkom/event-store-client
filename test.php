<?php
require_once('vendor/autoload.php');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$loop = React\EventLoop\Factory::create();

$dnsResolverFactory = new React\Dns\Resolver\Factory();
$dns = $dnsResolverFactory->createCached(null, $loop);


$connector = new React\SocketClient\Connector($loop, $dns);

$resolvedConnection = $connector->create('127.0.0.1', 1113);
$resolvedConnection->then(function (React\Stream\Stream $stream) {

    $streamAdapter = new \EventStore\Client\Infrastructure\ReactStream($stream);
    $streamHandler = new \EventStore\Client\Domain\Socket\StreamHandler($streamAdapter, new \EventStore\Client\Infrastructure\InMemoryLogger(), new \EventStore\Client\Domain\Socket\Message\MessageDecomposer(), new \EventStore\Client\Domain\Socket\Message\MessageComposer(), new \EventStore\Client\Domain\Socket\Communication\CommunicationFactory());

    $stream->on('data', function($data) use($streamHandler){
        $streamHandler->handle($data);
    });

//    $streamHandler->sendMessage(new \EventStore\Client\Domain\Socket\Message\SocketMessage(new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::PING), \EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAGS_NONE, null, null));

    $readStreamEvent = new \EventStore\Client\Domain\Socket\Data\ReadStreamEvents();
    $readStreamEvent->setEventStreamId('TestStream');
    $readStreamEvent->setResolveLinkTos(false);
    $readStreamEvent->setRequireMaster(false);
    $readStreamEvent->setMaxCount(1000);
    $readStreamEvent->setFromEventNumber(0);

//    $streamHandler->sendMessage(
//        new \EventStore\Client\Domain\Socket\Message\SocketMessage(
//            new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::READ_STREAM_EVENTS_FORWARD),
//            \EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAGS_NONE,
//            null,
//            $readStreamEvent)
//        );

//    $readAllEvent = new EventStore\Client\Domain\Socket\Data\ReadAllEvents();
//    $readAllEvent->setMaxCount(1000);
//    $readAllEvent->setRequireMaster(false);
//    $readAllEvent->setResolveLinkTos(true);
//    $readAllEvent->setCommitPosition(1000);
//    $readAllEvent->setPreparePosition(1000);
//
//    $streamHandler->sendMessage(
//        new \EventStore\Client\Domain\Socket\Message\SocketMessage(
//            new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::READ_ALL_EVENTS_FORWARD),
//            \EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAGS_NONE,
//            null,
//            $readAllEvent)
//    );

    $subscribeToStream = new \EventStore\Client\Domain\Socket\Data\SubscribeToStream();
    $subscribeToStream->setEventStreamId('TestStream');
    $subscribeToStream->setResolveLinkTos(true);

    $streamHandler->sendMessage(
        new \EventStore\Client\Domain\Socket\Message\SocketMessage(
            new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::SUBSCRIBE_TO_STREAM),
            \EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAGS_NONE,
            null,
            $subscribeToStream)
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
