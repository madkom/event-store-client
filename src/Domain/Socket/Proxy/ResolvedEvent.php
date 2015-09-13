<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace EventStore\Client\Domain\Socket\Proxy {
/**
 * ResolvedEvent message
 */
class ResolvedEvent extends \ProtobufMessage
{
    /* Field index constants */
    const EVENT = 1;
    const LINK = 2;
    const COMMIT_POSITION = 3;
    const PREPARE_POSITION = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::EVENT => array(
            'name' => 'event',
            'required' => true,
            'type' => '\EventStore\Client\Domain\Socket\Proxy\EventRecord'
        ),
        self::LINK => array(
            'name' => 'link',
            'required' => false,
            'type' => '\EventStore\Client\Domain\Socket\Proxy\EventRecord'
        ),
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
        $this->values[self::EVENT] = null;
        $this->values[self::LINK] = null;
        $this->values[self::COMMIT_POSITION] = null;
        $this->values[self::PREPARE_POSITION] = null;
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
     * Sets value of 'event' property
     *
     * @param \EventStore\Client\Domain\Socket\Proxy\EventRecord $value Property value
     *
     * @return null
     */
    public function setEvent(\EventStore\Client\Domain\Socket\Proxy\EventRecord $value)
    {
        return $this->set(self::EVENT, $value);
    }

    /**
     * Returns value of 'event' property
     *
     * @return \EventStore\Client\Domain\Socket\Proxy\EventRecord
     */
    public function getEvent()
    {
        return $this->get(self::EVENT);
    }

    /**
     * Sets value of 'link' property
     *
     * @param \EventStore\Client\Domain\Socket\Proxy\EventRecord $value Property value
     *
     * @return null
     */
    public function setLink(\EventStore\Client\Domain\Socket\Proxy\EventRecord $value)
    {
        return $this->set(self::LINK, $value);
    }

    /**
     * Returns value of 'link' property
     *
     * @return \EventStore\Client\Domain\Socket\Proxy\EventRecord
     */
    public function getLink()
    {
        return $this->get(self::LINK);
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
}
}