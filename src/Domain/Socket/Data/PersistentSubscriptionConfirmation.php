<?php
/**
 * Auto generated from Dtos.proto at 2015-11-27 20:14:51
 *
 * EventStore.Client.Messages package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * PersistentSubscriptionConfirmation message
 */
class PersistentSubscriptionConfirmation extends \ProtobufMessage
{
    /* Field index constants */
    const LAST_COMMIT_POSITION = 1;
    const SUBSCRIPTION_ID = 2;
    const LAST_EVENT_NUMBER = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::LAST_COMMIT_POSITION => array(
            'name' => 'last_commit_position',
            'required' => true,
            'type' => 5,
        ),
        self::SUBSCRIPTION_ID => array(
            'name' => 'subscription_id',
            'required' => true,
            'type' => 7,
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
        $this->values[self::SUBSCRIPTION_ID] = null;
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
     * Sets value of 'subscription_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setSubscriptionId($value)
    {
        return $this->set(self::SUBSCRIPTION_ID, $value);
    }

    /**
     * Returns value of 'subscription_id' property
     *
     * @return string
     */
    public function getSubscriptionId()
    {
        return $this->get(self::SUBSCRIPTION_ID);
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