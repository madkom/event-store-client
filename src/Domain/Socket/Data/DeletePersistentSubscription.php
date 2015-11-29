<?php
/**
 * Auto generated from Dtos.proto at 2015-11-27 20:14:51
 *
 * EventStore.Client.Messages package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * DeletePersistentSubscription message
 */
class DeletePersistentSubscription extends \ProtobufMessage
{
    /* Field index constants */
    const SUBSCRIPTION_GROUP_NAME = 1;
    const EVENT_STREAM_ID = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::SUBSCRIPTION_GROUP_NAME => array(
            'name' => 'subscription_group_name',
            'required' => true,
            'type' => 7,
        ),
        self::EVENT_STREAM_ID => array(
            'name' => 'event_stream_id',
            'required' => true,
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
        $this->values[self::SUBSCRIPTION_GROUP_NAME] = null;
        $this->values[self::EVENT_STREAM_ID] = null;
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
     * Sets value of 'subscription_group_name' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setSubscriptionGroupName($value)
    {
        return $this->set(self::SUBSCRIPTION_GROUP_NAME, $value);
    }

    /**
     * Returns value of 'subscription_group_name' property
     *
     * @return string
     */
    public function getSubscriptionGroupName()
    {
        return $this->get(self::SUBSCRIPTION_GROUP_NAME);
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
}
}