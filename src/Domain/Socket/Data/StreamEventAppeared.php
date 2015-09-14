<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace EventStore\Client\Domain\Socket\Data {
/**
 * StreamEventAppeared message
 */
class StreamEventAppeared extends \ProtobufMessage
{
    /* Field index constants */
    const EVENT = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::EVENT => array(
            'name' => 'event',
            'required' => true,
            'type' => '\EventStore\Client\Domain\Socket\Data\ResolvedEvent'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::EVENT] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'event' property
     *
     * @param \EventStore\Client\Domain\Socket\Data\ResolvedEvent $value Property value
     *
     * @return null
     */
    public function setEvent(\EventStore\Client\Domain\Socket\Data\ResolvedEvent $value)
    {
        return $this->set(self::EVENT, $value);
    }

    /**
     * Returns value of 'event' property
     *
     * @return \EventStore\Client\Domain\Socket\Data\ResolvedEvent
     */
    public function getEvent()
    {
        return $this->get(self::EVENT);
    }
}
}