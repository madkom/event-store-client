<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * ReadStreamEventsCompleted message
 */
class ReadStreamEventsCompleted extends \ProtobufMessage
{
    /* Field index constants */
    const EVENTS = 1;
    const RESULT = 2;
    const NEXT_EVENT_NUMBER = 3;
    const LAST_EVENT_NUMBER = 4;
    const IS_END_OF_STREAM = 5;
    const LAST_COMMIT_POSITION = 6;
    const ERROR = 7;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::EVENTS => array(
            'name' => 'events',
            'repeated' => true,
            'type' => '\Madkom\EventStore\Client\Domain\Socket\Data\ResolvedIndexedEvent'
        ),
        self::RESULT => array(
            'name' => 'result',
            'required' => true,
            'type' => 5,
        ),
        self::NEXT_EVENT_NUMBER => array(
            'name' => 'next_event_number',
            'required' => true,
            'type' => 5,
        ),
        self::LAST_EVENT_NUMBER => array(
            'name' => 'last_event_number',
            'required' => true,
            'type' => 5,
        ),
        self::IS_END_OF_STREAM => array(
            'name' => 'is_end_of_stream',
            'required' => true,
            'type' => 8,
        ),
        self::LAST_COMMIT_POSITION => array(
            'name' => 'last_commit_position',
            'required' => true,
            'type' => 5,
        ),
        self::ERROR => array(
            'name' => 'error',
            'required' => false,
            'type' => 7,
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
        $this->values[self::EVENTS] = array();
        $this->values[self::RESULT] = null;
        $this->values[self::NEXT_EVENT_NUMBER] = null;
        $this->values[self::LAST_EVENT_NUMBER] = null;
        $this->values[self::IS_END_OF_STREAM] = null;
        $this->values[self::LAST_COMMIT_POSITION] = null;
        $this->values[self::ERROR] = null;
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
     * Appends value to 'events' list
     *
     * @param \Madkom\EventStore\Client\Domain\Socket\Data\ResolvedIndexedEvent $value Value to append
     *
     * @return null
     */
    public function appendEvents(\Madkom\EventStore\Client\Domain\Socket\Data\ResolvedIndexedEvent $value)
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
     * @return \Madkom\EventStore\Client\Domain\Socket\Data\ResolvedIndexedEvent[]
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
     * @return \Madkom\EventStore\Client\Domain\Socket\Data\ResolvedIndexedEvent
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
     * Sets value of 'result' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setResult($value)
    {
        return $this->set(self::RESULT, $value);
    }

    /**
     * Returns value of 'result' property
     *
     * @return int
     */
    public function getResult()
    {
        return $this->get(self::RESULT);
    }

    /**
     * Sets value of 'next_event_number' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setNextEventNumber($value)
    {
        return $this->set(self::NEXT_EVENT_NUMBER, $value);
    }

    /**
     * Returns value of 'next_event_number' property
     *
     * @return int
     */
    public function getNextEventNumber()
    {
        return $this->get(self::NEXT_EVENT_NUMBER);
    }

    /**
     * Sets value of 'last_event_number' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setLastEventNumber($value)
    {
        return $this->set(self::LAST_EVENT_NUMBER, $value);
    }

    /**
     * Returns value of 'last_event_number' property
     *
     * @return int
     */
    public function getLastEventNumber()
    {
        return $this->get(self::LAST_EVENT_NUMBER);
    }

    /**
     * Sets value of 'is_end_of_stream' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setIsEndOfStream($value)
    {
        return $this->set(self::IS_END_OF_STREAM, $value);
    }

    /**
     * Returns value of 'is_end_of_stream' property
     *
     * @return bool
     */
    public function getIsEndOfStream()
    {
        return $this->get(self::IS_END_OF_STREAM);
    }

    /**
     * Sets value of 'last_commit_position' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setLastCommitPosition($value)
    {
        return $this->set(self::LAST_COMMIT_POSITION, $value);
    }

    /**
     * Returns value of 'last_commit_position' property
     *
     * @return int
     */
    public function getLastCommitPosition()
    {
        return $this->get(self::LAST_COMMIT_POSITION);
    }

    /**
     * Sets value of 'error' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setError($value)
    {
        return $this->set(self::ERROR, $value);
    }

    /**
     * Returns value of 'error' property
     *
     * @return string
     */
    public function getError()
    {
        return $this->get(self::ERROR);
    }
}
}