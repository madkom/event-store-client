<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace EventStore\Client\Domain\Socket\Data {
/**
 * ReadEvent message
 */
class ReadEvent extends \ProtobufMessage
{
    /* Field index constants */
    const EVENT_STREAM_ID = 1;
    const EVENT_NUMBER = 2;
    const RESOLVE_LINK_TOS = 3;
    const REQUIRE_MASTER = 4;

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
        self::RESOLVE_LINK_TOS => array(
            'name' => 'resolve_link_tos',
            'required' => true,
            'type' => 8,
        ),
        self::REQUIRE_MASTER => array(
            'name' => 'require_master',
            'required' => true,
            'type' => 8,
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
        $this->values[self::RESOLVE_LINK_TOS] = null;
        $this->values[self::REQUIRE_MASTER] = null;
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
     * Sets value of 'require_master' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setRequireMaster($value)
    {
        return $this->set(self::REQUIRE_MASTER, $value);
    }

    /**
     * Returns value of 'require_master' property
     *
     * @return bool
     */
    public function getRequireMaster()
    {
        return $this->get(self::REQUIRE_MASTER);
    }
}
}