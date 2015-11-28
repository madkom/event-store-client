<?php
/**
 * Auto generated from Dtos.proto at 2015-11-27 20:14:51
 *
 * EventStore.Client.Messages package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * ConnectToPersistentSubscription message
 */
class ConnectToPersistentSubscription extends \ProtobufMessage
{
    /* Field index constants */
    const SUBSCRIPTION_ID = 1;
    const EVENT_STREAM_ID = 2;
    const ALLOWED_IN_FLIGHT_MESSAGES = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::SUBSCRIPTION_ID => array(
            'name' => 'subscription_id',
            'required' => true,
            'type' => 7,
        ),
        self::EVENT_STREAM_ID => array(
            'name' => 'event_stream_id',
            'required' => true,
            'type' => 7,
        ),
        self::ALLOWED_IN_FLIGHT_MESSAGES => array(
            'name' => 'allowed_in_flight_messages',
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
        $this->values[self::EVENT_STREAM_ID] = null;
        $this->values[self::ALLOWED_IN_FLIGHT_MESSAGES] = null;
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
     * Sets value of 'allowed_in_flight_messages' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setAllowedInFlightMessages($value)
    {
        return $this->set(self::ALLOWED_IN_FLIGHT_MESSAGES, $value);
    }

    /**
     * Returns value of 'allowed_in_flight_messages' property
     *
     * @return int
     */
    public function getAllowedInFlightMessages()
    {
        return $this->get(self::ALLOWED_IN_FLIGHT_MESSAGES);
    }
}
}