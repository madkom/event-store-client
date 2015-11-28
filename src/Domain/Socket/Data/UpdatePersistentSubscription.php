<?php
/**
 * Auto generated from Dtos.proto at 2015-11-27 20:14:51
 *
 * EventStore.Client.Messages package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * UpdatePersistentSubscription message
 */
class UpdatePersistentSubscription extends \ProtobufMessage
{
    /* Field index constants */
    const SUBSCRIPTION_GROUP_NAME = 1;
    const EVENT_STREAM_ID = 2;
    const RESOLVE_LINK_TOS = 3;
    const START_FROM = 4;
    const MESSAGE_TIMEOUT_MILLISECONDS = 5;
    const RECORD_STATISTICS = 6;
    const LIVE_BUFFER_SIZE = 7;
    const READ_BATCH_SIZE = 8;
    const BUFFER_SIZE = 9;
    const MAX_RETRY_COUNT = 10;
    const PREFER_ROUND_ROBIN = 11;
    const CHECKPOINT_AFTER_TIME = 12;
    const CHECKPOINT_MAX_COUNT = 13;
    const CHECKPOINT_MIN_COUNT = 14;
    const SUBSCRIBER_MAX_COUNT = 15;
    const NAMED_CONSUMER_STRATEGY = 16;

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
        self::RESOLVE_LINK_TOS => array(
            'name' => 'resolve_link_tos',
            'required' => true,
            'type' => 8,
        ),
        self::START_FROM => array(
            'name' => 'start_from',
            'required' => true,
            'type' => 5,
        ),
        self::MESSAGE_TIMEOUT_MILLISECONDS => array(
            'name' => 'message_timeout_milliseconds',
            'required' => true,
            'type' => 5,
        ),
        self::RECORD_STATISTICS => array(
            'name' => 'record_statistics',
            'required' => true,
            'type' => 8,
        ),
        self::LIVE_BUFFER_SIZE => array(
            'name' => 'live_buffer_size',
            'required' => true,
            'type' => 5,
        ),
        self::READ_BATCH_SIZE => array(
            'name' => 'read_batch_size',
            'required' => true,
            'type' => 5,
        ),
        self::BUFFER_SIZE => array(
            'name' => 'buffer_size',
            'required' => true,
            'type' => 5,
        ),
        self::MAX_RETRY_COUNT => array(
            'name' => 'max_retry_count',
            'required' => true,
            'type' => 5,
        ),
        self::PREFER_ROUND_ROBIN => array(
            'name' => 'prefer_round_robin',
            'required' => true,
            'type' => 8,
        ),
        self::CHECKPOINT_AFTER_TIME => array(
            'name' => 'checkpoint_after_time',
            'required' => true,
            'type' => 5,
        ),
        self::CHECKPOINT_MAX_COUNT => array(
            'name' => 'checkpoint_max_count',
            'required' => true,
            'type' => 5,
        ),
        self::CHECKPOINT_MIN_COUNT => array(
            'name' => 'checkpoint_min_count',
            'required' => true,
            'type' => 5,
        ),
        self::SUBSCRIBER_MAX_COUNT => array(
            'name' => 'subscriber_max_count',
            'required' => true,
            'type' => 5,
        ),
        self::NAMED_CONSUMER_STRATEGY => array(
            'name' => 'named_consumer_strategy',
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
        $this->values[self::SUBSCRIPTION_GROUP_NAME] = null;
        $this->values[self::EVENT_STREAM_ID] = null;
        $this->values[self::RESOLVE_LINK_TOS] = null;
        $this->values[self::START_FROM] = null;
        $this->values[self::MESSAGE_TIMEOUT_MILLISECONDS] = null;
        $this->values[self::RECORD_STATISTICS] = null;
        $this->values[self::LIVE_BUFFER_SIZE] = null;
        $this->values[self::READ_BATCH_SIZE] = null;
        $this->values[self::BUFFER_SIZE] = null;
        $this->values[self::MAX_RETRY_COUNT] = null;
        $this->values[self::PREFER_ROUND_ROBIN] = null;
        $this->values[self::CHECKPOINT_AFTER_TIME] = null;
        $this->values[self::CHECKPOINT_MAX_COUNT] = null;
        $this->values[self::CHECKPOINT_MIN_COUNT] = null;
        $this->values[self::SUBSCRIBER_MAX_COUNT] = null;
        $this->values[self::NAMED_CONSUMER_STRATEGY] = null;
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

    /**
     * Sets value of 'resolve_link_tos' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setResolveLinkTos($value)
    {
        return $this->set(self::RESOLVE_LINK_TOS, $value);
    }

    /**
     * Returns value of 'resolve_link_tos' property
     *
     * @return bool
     */
    public function getResolveLinkTos()
    {
        return $this->get(self::RESOLVE_LINK_TOS);
    }

    /**
     * Sets value of 'start_from' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setStartFrom($value)
    {
        return $this->set(self::START_FROM, $value);
    }

    /**
     * Returns value of 'start_from' property
     *
     * @return int
     */
    public function getStartFrom()
    {
        return $this->get(self::START_FROM);
    }

    /**
     * Sets value of 'message_timeout_milliseconds' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMessageTimeoutMilliseconds($value)
    {
        return $this->set(self::MESSAGE_TIMEOUT_MILLISECONDS, $value);
    }

    /**
     * Returns value of 'message_timeout_milliseconds' property
     *
     * @return int
     */
    public function getMessageTimeoutMilliseconds()
    {
        return $this->get(self::MESSAGE_TIMEOUT_MILLISECONDS);
    }

    /**
     * Sets value of 'record_statistics' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setRecordStatistics($value)
    {
        return $this->set(self::RECORD_STATISTICS, $value);
    }

    /**
     * Returns value of 'record_statistics' property
     *
     * @return bool
     */
    public function getRecordStatistics()
    {
        return $this->get(self::RECORD_STATISTICS);
    }

    /**
     * Sets value of 'live_buffer_size' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setLiveBufferSize($value)
    {
        return $this->set(self::LIVE_BUFFER_SIZE, $value);
    }

    /**
     * Returns value of 'live_buffer_size' property
     *
     * @return int
     */
    public function getLiveBufferSize()
    {
        return $this->get(self::LIVE_BUFFER_SIZE);
    }

    /**
     * Sets value of 'read_batch_size' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setReadBatchSize($value)
    {
        return $this->set(self::READ_BATCH_SIZE, $value);
    }

    /**
     * Returns value of 'read_batch_size' property
     *
     * @return int
     */
    public function getReadBatchSize()
    {
        return $this->get(self::READ_BATCH_SIZE);
    }

    /**
     * Sets value of 'buffer_size' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setBufferSize($value)
    {
        return $this->set(self::BUFFER_SIZE, $value);
    }

    /**
     * Returns value of 'buffer_size' property
     *
     * @return int
     */
    public function getBufferSize()
    {
        return $this->get(self::BUFFER_SIZE);
    }

    /**
     * Sets value of 'max_retry_count' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMaxRetryCount($value)
    {
        return $this->set(self::MAX_RETRY_COUNT, $value);
    }

    /**
     * Returns value of 'max_retry_count' property
     *
     * @return int
     */
    public function getMaxRetryCount()
    {
        return $this->get(self::MAX_RETRY_COUNT);
    }

    /**
     * Sets value of 'prefer_round_robin' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setPreferRoundRobin($value)
    {
        return $this->set(self::PREFER_ROUND_ROBIN, $value);
    }

    /**
     * Returns value of 'prefer_round_robin' property
     *
     * @return bool
     */
    public function getPreferRoundRobin()
    {
        return $this->get(self::PREFER_ROUND_ROBIN);
    }

    /**
     * Sets value of 'checkpoint_after_time' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCheckpointAfterTime($value)
    {
        return $this->set(self::CHECKPOINT_AFTER_TIME, $value);
    }

    /**
     * Returns value of 'checkpoint_after_time' property
     *
     * @return int
     */
    public function getCheckpointAfterTime()
    {
        return $this->get(self::CHECKPOINT_AFTER_TIME);
    }

    /**
     * Sets value of 'checkpoint_max_count' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCheckpointMaxCount($value)
    {
        return $this->set(self::CHECKPOINT_MAX_COUNT, $value);
    }

    /**
     * Returns value of 'checkpoint_max_count' property
     *
     * @return int
     */
    public function getCheckpointMaxCount()
    {
        return $this->get(self::CHECKPOINT_MAX_COUNT);
    }

    /**
     * Sets value of 'checkpoint_min_count' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCheckpointMinCount($value)
    {
        return $this->set(self::CHECKPOINT_MIN_COUNT, $value);
    }

    /**
     * Returns value of 'checkpoint_min_count' property
     *
     * @return int
     */
    public function getCheckpointMinCount()
    {
        return $this->get(self::CHECKPOINT_MIN_COUNT);
    }

    /**
     * Sets value of 'subscriber_max_count' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setSubscriberMaxCount($value)
    {
        return $this->set(self::SUBSCRIBER_MAX_COUNT, $value);
    }

    /**
     * Returns value of 'subscriber_max_count' property
     *
     * @return int
     */
    public function getSubscriberMaxCount()
    {
        return $this->get(self::SUBSCRIBER_MAX_COUNT);
    }

    /**
     * Sets value of 'named_consumer_strategy' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setNamedConsumerStrategy($value)
    {
        return $this->set(self::NAMED_CONSUMER_STRATEGY, $value);
    }

    /**
     * Returns value of 'named_consumer_strategy' property
     *
     * @return string
     */
    public function getNamedConsumerStrategy()
    {
        return $this->get(self::NAMED_CONSUMER_STRATEGY);
    }
}
}