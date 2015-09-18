<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * WriteEventsCompleted message
 */
class WriteEventsCompleted extends \ProtobufMessage
{
    /* Field index constants */
    const RESULT = 1;
    const MESSAGE = 2;
    const FIRST_EVENT_NUMBER = 3;
    const LAST_EVENT_NUMBER = 4;
    const PREPARE_POSITION = 5;
    const COMMIT_POSITION = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::RESULT => array(
            'name' => 'result',
            'required' => true,
            'type' => 5,
        ),
        self::MESSAGE => array(
            'name' => 'message',
            'required' => false,
            'type' => 7,
        ),
        self::FIRST_EVENT_NUMBER => array(
            'name' => 'first_event_number',
            'required' => true,
            'type' => 5,
        ),
        self::LAST_EVENT_NUMBER => array(
            'name' => 'last_event_number',
            'required' => true,
            'type' => 5,
        ),
        self::PREPARE_POSITION => array(
            'name' => 'prepare_position',
            'required' => false,
            'type' => 5,
        ),
        self::COMMIT_POSITION => array(
            'name' => 'commit_position',
            'required' => false,
            'type' => 5,
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
        $this->values[self::RESULT] = null;
        $this->values[self::MESSAGE] = null;
        $this->values[self::FIRST_EVENT_NUMBER] = null;
        $this->values[self::LAST_EVENT_NUMBER] = null;
        $this->values[self::PREPARE_POSITION] = null;
        $this->values[self::COMMIT_POSITION] = null;
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
     * Sets value of 'message' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMessage($value)
    {
        return $this->set(self::MESSAGE, $value);
    }

    /**
     * Returns value of 'message' property
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->get(self::MESSAGE);
    }

    /**
     * Sets value of 'first_event_number' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setFirstEventNumber($value)
    {
        return $this->set(self::FIRST_EVENT_NUMBER, $value);
    }

    /**
     * Returns value of 'first_event_number' property
     *
     * @return int
     */
    public function getFirstEventNumber()
    {
        return $this->get(self::FIRST_EVENT_NUMBER);
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
}
}