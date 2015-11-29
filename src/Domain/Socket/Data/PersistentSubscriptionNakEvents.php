<?php
/**
 * Auto generated from Dtos.proto at 2015-11-27 20:14:51
 *
 * EventStore.Client.Messages package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * PersistentSubscriptionNakEvents message
 */
class PersistentSubscriptionNakEvents extends \ProtobufMessage
{
    /* Field index constants */
    const SUBSCRIPTION_ID = 1;
    const PROCESSED_EVENT_IDS = 2;
    const MESSAGE = 3;
    const ACTION = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::SUBSCRIPTION_ID => array(
            'name' => 'subscription_id',
            'required' => true,
            'type' => 7,
        ),
        self::PROCESSED_EVENT_IDS => array(
            'name' => 'processed_event_ids',
            'repeated' => true,
            'type' => 7,
        ),
        self::MESSAGE => array(
            'name' => 'message',
            'required' => false,
            'type' => 7,
        ),
        self::ACTION => array(
            'default' => \Madkom\EventStore\Client\Domain\Socket\Data\PersistentSubscriptionNakEvents\NakAction::Unknown,
            'name' => 'action',
            'required' => true,
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
        $this->values[self::SUBSCRIPTION_ID] = null;
        $this->values[self::PROCESSED_EVENT_IDS] = array();
        $this->values[self::MESSAGE] = null;
        $this->values[self::ACTION] = null;
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
     * Appends value to 'processed_event_ids' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendProcessedEventIds($value)
    {
        return $this->append(self::PROCESSED_EVENT_IDS, $value);
    }

    /**
     * Clears 'processed_event_ids' list
     *
     * @return null
     */
    public function clearProcessedEventIds()
    {
        return $this->clear(self::PROCESSED_EVENT_IDS);
    }

    /**
     * Returns 'processed_event_ids' list
     *
     * @return string[]
     */
    public function getProcessedEventIds()
    {
        return $this->get(self::PROCESSED_EVENT_IDS);
    }

    /**
     * Returns 'processed_event_ids' iterator
     *
     * @return ArrayIterator
     */
    public function getProcessedEventIdsIterator()
    {
        return new \ArrayIterator($this->get(self::PROCESSED_EVENT_IDS));
    }

    /**
     * Returns element from 'processed_event_ids' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getProcessedEventIdsAt($offset)
    {
        return $this->get(self::PROCESSED_EVENT_IDS, $offset);
    }

    /**
     * Returns count of 'processed_event_ids' list
     *
     * @return int
     */
    public function getProcessedEventIdsCount()
    {
        return $this->count(self::PROCESSED_EVENT_IDS);
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
     * Sets value of 'action' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setAction($value)
    {
        return $this->set(self::ACTION, $value);
    }

    /**
     * Returns value of 'action' property
     *
     * @return int
     */
    public function getAction()
    {
        return $this->get(self::ACTION);
    }
}
}