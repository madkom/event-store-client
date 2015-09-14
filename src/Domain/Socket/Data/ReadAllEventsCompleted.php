<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace EventStore\Client\Domain\Socket\Data {
/**
 * ReadAllEventsCompleted message
 */
class ReadAllEventsCompleted extends \ProtobufMessage
{
    /* Field index constants */
    const COMMIT_POSITION = 1;
    const PREPARE_POSITION = 2;
    const EVENTS = 3;
    const NEXT_COMMIT_POSITION = 4;
    const NEXT_PREPARE_POSITION = 5;
    const RESULT = 6;
    const ERROR = 7;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::COMMIT_POSITION => array(
            'name' => 'commit_position',
            'required' => true,
            'type' => 5,
        ),
        self::PREPARE_POSITION => array(
            'name' => 'prepare_position',
            'required' => true,
            'type' => 5,
        ),
        self::EVENTS => array(
            'name' => 'events',
            'repeated' => true,
            'type' => '\EventStore\Client\Domain\Socket\Data\ResolvedEvent'
        ),
        self::NEXT_COMMIT_POSITION => array(
            'name' => 'next_commit_position',
            'required' => true,
            'type' => 5,
        ),
        self::NEXT_PREPARE_POSITION => array(
            'name' => 'next_prepare_position',
            'required' => true,
            'type' => 5,
        ),
        self::RESULT => array(
            'default' => \EventStore\Client\Domain\Socket\Data\ReadAllEventsCompleted\ReadAllResult::Success,
            'name' => 'result',
            'required' => false,
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
        $this->values[self::COMMIT_POSITION] = null;
        $this->values[self::PREPARE_POSITION] = null;
        $this->values[self::EVENTS] = array();
        $this->values[self::NEXT_COMMIT_POSITION] = null;
        $this->values[self::NEXT_PREPARE_POSITION] = null;
        $this->values[self::RESULT] = \EventStore\Client\Domain\Socket\Data\ReadAllEventsCompleted\ReadAllResult::Success;
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
     * Sets value of 'commit_position' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCommitPosition($value)
    {
        return $this->set(self::COMMIT_POSITION, $value);
    }

    /**
     * Returns value of 'commit_position' property
     *
     * @return int
     */
    public function getCommitPosition()
    {
        return $this->get(self::COMMIT_POSITION);
    }

    /**
     * Sets value of 'prepare_position' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setPreparePosition($value)
    {
        return $this->set(self::PREPARE_POSITION, $value);
    }

    /**
     * Returns value of 'prepare_position' property
     *
     * @return int
     */
    public function getPreparePosition()
    {
        return $this->get(self::PREPARE_POSITION);
    }

    /**
     * Appends value to 'events' list
     *
     * @param \EventStore\Client\Domain\Socket\Data\ResolvedEvent $value Value to append
     *
     * @return null
     */
    public function appendEvents(\EventStore\Client\Domain\Socket\Data\ResolvedEvent $value)
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
     * @return \EventStore\Client\Domain\Socket\Data\ResolvedEvent[]
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
     * @return \EventStore\Client\Domain\Socket\Data\ResolvedEvent
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
     * Sets value of 'next_commit_position' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setNextCommitPosition($value)
    {
        return $this->set(self::NEXT_COMMIT_POSITION, $value);
    }

    /**
     * Returns value of 'next_commit_position' property
     *
     * @return int
     */
    public function getNextCommitPosition()
    {
        return $this->get(self::NEXT_COMMIT_POSITION);
    }

    /**
     * Sets value of 'next_prepare_position' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setNextPreparePosition($value)
    {
        return $this->set(self::NEXT_PREPARE_POSITION, $value);
    }

    /**
     * Returns value of 'next_prepare_position' property
     *
     * @return int
     */
    public function getNextPreparePosition()
    {
        return $this->get(self::NEXT_PREPARE_POSITION);
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