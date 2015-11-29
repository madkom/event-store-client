<?php
/**
 * Auto generated from Dtos.proto at 2015-11-27 20:14:51
 *
 * EventStore.Client.Messages package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * PersistentSubscriptionStreamEventAppeared message
 */
class PersistentSubscriptionStreamEventAppeared extends \ProtobufMessage
{
    /* Field index constants */
    const EVENT = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::EVENT => array(
            'name' => 'event',
            'required' => true,
            'type' => '\Madkom\EventStore\Client\Domain\Socket\Data\ResolvedIndexedEvent'
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
     * @param \Madkom\EventStore\Client\Domain\Socket\Data\ResolvedIndexedEvent $value Property value
     *
     * @return null
     */
    public function setEvent(\Madkom\EventStore\Client\Domain\Socket\Data\ResolvedIndexedEvent $value)
    {
        return $this->set(self::EVENT, $value);
    }

    /**
     * Returns value of 'event' property
     *
     * @return \Madkom\EventStore\Client\Domain\Socket\Data\ResolvedIndexedEvent
     */
    public function getEvent()
    {
        return $this->get(self::EVENT);
    }
}
}