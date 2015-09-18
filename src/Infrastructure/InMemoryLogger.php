<?php

namespace Madkom\EventStore\Client\Infrastructure;

use Psr\Log\LoggerInterface;

/**
 * Class InMemoryLogger
 * @package Madkom\EventStore\Client\Infrastructure
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class InMemoryLogger implements LoggerInterface
{
    /**
     * @inheritDoc
     */
    public function emergency($message, array $context = array())
    {
        // TODO: Implement emergency() method.
    }

    /**
     * @inheritDoc
     */
    public function alert($message, array $context = array())
    {
        // TODO: Implement alert() method.
    }

    /**
     * @inheritDoc
     */
    public function critical($message, array $context = array())
    {
        echo $message . "\n";
    }

    /**
     * @inheritDoc
     */
    public function error($message, array $context = array())
    {
        // TODO: Implement error() method.
    }

    /**
     * @inheritDoc
     */
    public function warning($message, array $context = array())
    {
        // TODO: Implement warning() method.
    }

    /**
     * @inheritDoc
     */
    public function notice($message, array $context = array())
    {
        // TODO: Implement notice() method.
    }

    /**
     * @inheritDoc
     */
    public function info($message, array $context = array())
    {
        // TODO: Implement info() method.
    }

    /**
     * @inheritDoc
     */
    public function debug($message, array $context = array())
    {
        // TODO: Implement debug() method.
    }

    /**
     * @inheritDoc
     */
    public function log($level, $message, array $context = array())
    {
        // TODO: Implement log() method.
    }

}