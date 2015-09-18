<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * SubscriptionConfirmation message
 */
class SubscriptionConfirmation extends \ProtobufMessage
{
    /* Field index constants */
    const LAST_COMMIT_POSITION = 1;
    const LAST_EVENT_NUMBER = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::LAST_COMMIT_POSITION => array(
            'name' => 'last_commit_position',
            'required' => true,
            'type' => 5,
        ),
        self::LAST_EVENT_NUMBER => array(
            'name' => 'last_event_number',
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
        $this->values[self::LAST_COMMIT_POSITION] = null;
        $this->values[self::LAST_EVENT_NUMBER] = null;
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
}
}