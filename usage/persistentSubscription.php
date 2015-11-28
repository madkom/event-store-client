<?php

use Madkom\EventStore\Client\Application\Api\EventStore;
use Madkom\EventStore\Client\Domain\Socket\Data\ConnectToPersistentSubscription;
use Madkom\EventStore\Client\Domain\Socket\Data\PersistentSubscriptionAckEvents;
use Madkom\EventStore\Client\Domain\Socket\Data\PersistentSubscriptionConfirmation;
use Madkom\EventStore\Client\Domain\Socket\Data\PersistentSubscriptionStreamEventAppeared;
use Madkom\EventStore\Client\Domain\Socket\Message\Credentials;
use Madkom\EventStore\Client\Domain\Socket\Message\MessageType;
use Madkom\EventStore\Client\Domain\Socket\Message\SocketMessage;
use Madkom\EventStore\Client\Infrastructure\ReactStream;

require_once('../vendor/autoload.php');

$loop = React\EventLoop\Factory::create();

$dnsResolverFactory = new React\Dns\Resolver\Factory();
$dns = $dnsResolverFactory->createCached(null, $loop);

$connector = new React\SocketClient\Connector($loop, $dns);

$resolvedConnection = $connector->create('127.0.0.1', 1113);
$resolvedConnection->then(
    function (React\Stream\Stream $stream) use ($loop) {
        $eventStore = new EventStore(
            new ReactStream($stream),
            $this->logger
        );

        $subscriptionId = '';

        /**
         * Don't set allowed in flight messages too high or else the event loop is
         * broken.
         */
        $connectToPersistentSubscription = new ConnectToPersistentSubscription();
        $connectToPersistentSubscription->setSubscriptionId('Foo');
        $connectToPersistentSubscription->setEventStreamId('TestStream');
        $connectToPersistentSubscription->setAllowedInFlightMessages(1);

        $eventStore->sendMessage(new SocketMessage(
            new MessageType(MessageType::CONNECT_TO_PERSISTENT_SUBSCRIPTION),
            null,
            $connectToPersistentSubscription,
            new Credentials('admin', 'changeit')
        ));

        $eventStore->addAction(MessageType::PERSISTENT_SUBSCRIPTION_CONFIRMATION, function(SocketMessage $socketMessage) use (&$subscriptionId) {
            /** @var PersistentSubscriptionConfirmation $socketMessageData */
            $socketMessageData = $socketMessage->getData();
            $subscriptionId = $socketMessageData->getSubscriptionId();

            echo 'Subscription confirmed: ' . $subscriptionId . "\n";
        });
        $eventStore->addAction(MessageType::SUBSCRIPTION_DROPPED, function(SocketMessage $socketMessage) use ($loop) {
            echo "Subscription dropped, bye!";
            $loop->stop();
        });

        $eventStore->addAction(MessageType::PERSISTENT_SUBSCRIPTION_STREAM_EVENT_APPEARED, function(SocketMessage $socketMessage) use ($eventStore, &$subscriptionId) {
            echo "Event appeared, don't forget to ack!\n";

            /** @var PersistentSubscriptionStreamEventAppeared $socketMessageData */
            $socketMessageData = $socketMessage->getData();

            /**
             * Acking is important, and will not work without $socketMessage->getCorrelationID() provided.
             */
            $ack = new PersistentSubscriptionAckEvents();
            $ack->setSubscriptionId($subscriptionId);
            $ack->appendProcessedEventIds($socketMessageData->getEvent()->getEvent()->getEventId());
            $eventStore->sendMessage(new SocketMessage(
                new MessageType(MessageType::PERSISTENT_SUBSCRIPTION_ACK_EVENTS),
                $socketMessage->getCorrelationID(),
                $ack,
                new Credentials('admin', 'changeit')
            ));
        });

        $eventStore->run();
    },
    function(Exception $e) use ($loop) {
        echo sprintf(
            'Unable to connect: %s in file %s on line %s%s',
            $e->getMessage(),
            $e->getFile(),
            $e->getLine(),
            PHP_EOL
        );
        echo sprintf(
            'Trace:%s%s%s',
            PHP_EOL,
            $e->getTraceAsString(),
            PHP_EOL
        );
        $loop->stop();
    }
);
