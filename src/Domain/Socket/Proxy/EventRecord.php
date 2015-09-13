<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace EventStore\Client\Domain\Socket\Proxy {
/**
 * EventRecord message
 */
class EventRecord extends \ProtobufMessage
{
    /* Field index constants */
    const EVENT_STREAM_ID = 1;
    const EVENT_NUMBER = 2;
    const EVENT_ID = 3;
    const EVENT_TYPE = 4;
    const DATA_CONTENT_TYPE = 5;
    const METADATA_CONTENT_TYPE = 6;
    const DATA = 7;
    const METADATA = 8;
    const CREATED = 9;
    const CREATED_EPOCH = 10;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::EVENT_STREAM_ID => array(
            'name' => 'event_stream_id',
            'required' => true,
            'type' => 7,
        ),
        self::EVENT_NUMBER => array(
            'name' => 'event_number',
            'required' => true,
            'type' => 5,
        ),
        self::EVENT_ID => array(
            'name' => 'event_id',
            'required' => true,
            'type' => 7,
        ),
        self::EVENT_TYPE => array(
            'name' => 'event_type',
            'required' => true,
            'type' => 7,
        ),
        self::DATA_CONTENT_TYPE => array(
            'name' => 'data_content_type',
            'required' => true,
            'type' => 5,
        ),
        self::METADATA_CONTENT_TYPE => array(
            'name' => 'metadata_content_type',
            'required' => true,
            'type' => 5,
        ),
        self::DATA => array(
            'name' => 'data',
            'required' => true,
            'type' => 7,
        ),
        self::METADATA => array(
            'name' => 'metadata',
            'required' => false,
            'type' => 7,
        ),
        self::CREATED => array(
            'name' => 'created',
            'required' => false,
            'type' => 5,
        ),
        self::CREATED_EPOCH => array(
            'name' => 'created_epoch',
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
        $this->values[self::EVENT_STREAM_ID] = null;
        $this->values[self::EVENT_NUMBER] = null;
        $this->values[self::EVENT_ID] = null;
        $this->values[self::EVENT_TYPE] = null;
        $this->values[self::DATA_CONTENT_TYPE] = null;
        $this->values[self::METADATA_CONTENT_TYPE] = null;
        $this->values[self::DATA] = null;
        $this->values[self::METADATA] = null;
        $this->values[self::CREATED] = null;
        $this->values[self::CREATED_EPOCH] = null;
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
     * Sets value of 'event_number' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setEventNumber($value)
    {
        return $this->set(self::EVENT_NUMBER, $value);
    }

    /**
     * Returns value of 'event_number' property
     *
     * @return int
     */
    public function getEventNumber()
    {
        return $this->get(self::EVENT_NUMBER);
    }

    /**
     * Sets value of 'event_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setEventId($value)
    {
        return $this->set(self::EVENT_ID, $value);
    }

    /**
     * Returns value of 'event_id' property
     *
     * @return string
     */
    public function getEventId()
    {
        return $this->get(self::EVENT_ID);
    }

    /**
     * Sets value of 'event_type' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setEventType($value)
    {
        return $this->set(self::EVENT_TYPE, $value);
    }

    /**
     * Returns value of 'event_type' property
     *
     * @return string
     */
    public function getEventType()
    {
        return $this->get(self::EVENT_TYPE);
    }

    /**
     * Sets value of 'data_content_type' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setDataContentType($value)
    {
        return $this->set(self::DATA_CONTENT_TYPE, $value);
    }

    /**
     * Returns value of 'data_content_type' property
     *
     * @return int
     */
    public function getDataContentType()
    {
        return $this->get(self::DATA_CONTENT_TYPE);
    }

    /**
     * Sets value of 'metadata_content_type' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMetadataContentType($value)
    {
        return $this->set(self::METADATA_CONTENT_TYPE, $value);
    }

    /**
     * Returns value of 'metadata_content_type' property
     *
     * @return int
     */
    public function getMetadataContentType()
    {
        return $this->get(self::METADATA_CONTENT_TYPE);
    }

    /**
     * Sets value of 'data' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setData($value)
    {
        return $this->set(self::DATA, $value);
    }

    /**
     * Returns value of 'data' property
     *
     * @return string
     */
    public function getData()
    {
        return $this->get(self::DATA);
    }

    /**
     * Sets value of 'metadata' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMetadata($value)
    {
        return $this->set(self::METADATA, $value);
    }

    /**
     * Returns value of 'metadata' property
     *
     * @return string
     */
    public function getMetadata()
    {
        return $this->get(self::METADATA);
    }

    /**
     * Sets value of 'created' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCreated($value)
    {
        return $this->set(self::CREATED, $value);
    }

    /**
     * Returns value of 'created' property
     *
     * @return int
     */
    public function getCreated()
    {
        return $this->get(self::CREATED);
    }

    /**
     * Sets value of 'created_epoch' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCreatedEpoch($value)
    {
        return $this->set(self::CREATED_EPOCH, $value);
    }

    /**
     * Returns value of 'created_epoch' property
     *
     * @return int
     */
    public function getCreatedEpoch()
    {
        return $this->get(self::CREATED_EPOCH);
    }
}
}