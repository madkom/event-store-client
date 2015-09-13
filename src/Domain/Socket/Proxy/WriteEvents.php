<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace EventStore\Client\Domain\Socket\Proxy {
/**
 * WriteEvents message
 */
class WriteEvents extends \ProtobufMessage
{
    /* Field index constants */
    const EVENT_STREAM_ID = 1;
    const EXPECTED_VERSION = 2;
    const EVENTS = 3;
    const REQUIRE_MASTER = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::EVENT_STREAM_ID => array(
            'name' => 'event_stream_id',
            'required' => true,
            'type' => 7,
        ),
        self::EXPECTED_VERSION => array(
            'name' => 'expected_version',
            'required' => true,
            'type' => 5,
        ),
        self::EVENTS => array(
            'name' => 'events',
            'repeated' => true,
            'type' => '\EventStore\Client\Domain\Socket\Proxy\NewEvent'
        ),
        self::REQUIRE_MASTER => array(
            'name' => 'require_master',
            'required' => true,
            'type' => 8,
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
        $this->values[self::EVENT_STREAM_ID] = null;
        $this->values[self::EXPECTED_VERSION] = null;
        $this->values[self::EVENTS] = array();
        $this->values[self::REQUIRE_MASTER] = null;
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
     * Sets value of 'event_stream_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setEventStreamId($value)
    {
        return $this->set(self::EVENT_STREAM_ID, $value);
    }

    /**
     * Returns value of 'event_stream_id' property
     *
     * @return string
     */
    public function getEventStreamId()
    {
        return $this->get(self::EVENT_STREAM_ID);
    }

    /**
     * Sets value of 'expected_version' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setExpectedVersion($value)
    {
        return $this->set(self::EXPECTED_VERSION, $value);
    }

    /**
     * Returns value of 'expected_version' property
     *
     * @return int
     */
    public function getExpectedVersion()
    {
        return $this->get(self::EXPECTED_VERSION);
    }

    /**
     * Appends value to 'events' list
     *
     * @param \EventStore\Client\Domain\Socket\Proxy\NewEvent $value Value to append
     *
     * @return null
     */
    public function appendEvents(\EventStore\Client\Domain\Socket\Proxy\NewEvent $value)
    {
        return $this->append(self::EVENTS, $value);
    }

    /**
     * Clears 'events' list
     *
     * @return null
     */
    public function clearEvents()
    {
        return $this->clear(self::EVENTS);
    }

    /**
     * Returns 'events' list
     *
     * @return \EventStore\Client\Domain\Socket\Proxy\NewEvent[]
     */
    public function getEvents()
    {
        return $this->get(self::EVENTS);
    }

    /**
     * Returns 'events' iterator
     *
     * @return ArrayIterator
     */
    public function getEventsIterator()
    {
        return new \ArrayIterator($this->get(self::EVENTS));
    }

    /**
     * Returns element from 'events' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \EventStore\Client\Domain\Socket\Proxy\NewEvent
     */
    public function getEventsAt($offset)
    {
        return $this->get(self::EVENTS, $offset);
    }

    /**
     * Returns count of 'events' list
     *
     * @return int
     */
    public function getEventsCount()
    {
        return $this->count(self::EVENTS);
    }

    /**
     * Sets value of 'require_master' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setRequireMaster($value)
    {
        return $this->set(self::REQUIRE_MASTER, $value);
    }

    /**
     * Returns value of 'require_master' property
     *
     * @return bool
     */
    public function getRequireMaster()
    {
        return $this->get(self::REQUIRE_MASTER);
    }
}
}