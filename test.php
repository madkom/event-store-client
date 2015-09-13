<?php
require_once('vendor/autoload.php');

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$loop = React\EventLoop\Factory::create();

$dnsResolverFactory = new React\Dns\Resolver\Factory();
$dns = $dnsResolverFactory->createCached(null, $loop);


$connector = new React\SocketClient\Connector($loop, $dns);

$connector->create('127.0.0.1', 1113)->then(function (React\Stream\Stream $stream) {

    $streamAdapter = new \EventStore\Client\Infrastructure\ReactStream($stream);
    $streamHandler = new \EventStore\Client\Domain\Socket\StreamHandler($streamAdapter, new \EventStore\Client\Domain\Socket\Message\MessageDecomposer(), new \EventStore\Client\Domain\Socket\Message\MessageComposer(), new \EventStore\Client\Domain\Socket\Communication\CommunicationFactory());

    $stream->on('data', function($data) use($streamHandler){
        $streamHandler->handle($data);
    });

//    $streamHandler->sendMessage(new \EventStore\Client\Domain\Socket\Message\SocketMessage(new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::PING), \EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAGS_NONE, null, null));

//    $streamHandler->sendMessage(
//        new \EventStore\Client\Domain\Socket\Message\SocketMessage(
//            new \EventStore\Client\Domain\Socket\Message\MessageType(\EventStore\Client\Domain\Socket\Message\MessageType::READ_STREAM_EVENTS_FORWARD),
//            \EventStore\Client\Domain\Socket\Message\MessageConfiguration::FLAGS_NONE,
//            null,
//            ['event_stream_id' => 'TestStream', 'from_event_number' => 10, 'max_count' => 100])
//        );

//    $stream->write('...');

//    $stream->write()
//    $stream->emit(
//
//    );

//    $stream->close();
});

$tmp = new EventStore\Client\Domain\Socket\Proxy\ReadStreamEvents();
$tmp->setEventStreamId('dsad');
$tmp->setFromEventNumber(2);
$tmp->setMaxCount(100);
$tmp->setResolveLinkTos(true);
$tmp->setRequireMaster(false);
//$tmp->
echo 'a' . $tmp->serializeToString();
die('a');

$loop->run();