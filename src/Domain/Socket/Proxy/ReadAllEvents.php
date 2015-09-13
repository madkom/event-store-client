<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace EventStore\Client\Domain\Socket\Proxy {
/**
 * ReadAllEvents message
 */
class ReadAllEvents extends \ProtobufMessage
{
    /* Field index constants */
    const COMMIT_POSITION = 1;
    const PREPARE_POSITION = 2;
    const MAX_COUNT = 3;
    const RESOLVE_LINK_TOS = 4;
    const REQUIRE_MASTER = 5;

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
        self::MAX_COUNT => array(
            'name' => 'max_count',
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
        $this->values[self::COMMIT_POSITION] = null;
        $this->values[self::PREPARE_POSITION] = null;
        $this->values[self::MAX_COUNT] = null;
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
     * Sets value of 'max_count' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMaxCount($value)
    {
        return $this->set(self::MAX_COUNT, $value);
    }

    /**
     * Returns value of 'max_count' property
     *
     * @return int
     */
    public function getMaxCount()
    {
        return $this->get(self::MAX_COUNT);
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