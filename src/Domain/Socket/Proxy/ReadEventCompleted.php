<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace EventStore\Client\Domain\Socket\Proxy {
/**
 * ReadEventCompleted message
 */
class ReadEventCompleted extends \ProtobufMessage
{
    /* Field index constants */
    const RESULT = 1;
    const EVENT = 2;
    const ERROR = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::RESULT => array(
            'name' => 'result',
            'required' => true,
            'type' => 5,
        ),
        self::EVENT => array(
            'name' => 'event',
            'required' => true,
            'type' => '\EventStore\Client\Domain\Socket\Proxy\ResolvedIndexedEvent'
        ),
        self::ERROR => array(
            'name' => 'error',
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
        $this->values[self::RESULT] = null;
        $this->values[self::EVENT] = null;
        $this->values[self::ERROR] = null;
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
     * Sets value of 'result' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setResult($value)
    {
        return $this->set(self::RESULT, $value);
    }

    /**
     * Returns value of 'result' property
     *
     * @return int
     */
    public function getResult()
    {
        return $this->get(self::RESULT);
    }

    /**
     * Sets value of 'event' property
     *
     * @param \EventStore\Client\Domain\Socket\Proxy\ResolvedIndexedEvent $value Property value
     *
     * @return null
     */
    public function setEvent(\EventStore\Client\Domain\Socket\Proxy\ResolvedIndexedEvent $value)
    {
        return $this->set(self::EVENT, $value);
    }

    /**
     * Returns value of 'event' property
     *
     * @return \EventStore\Client\Domain\Socket\Proxy\ResolvedIndexedEvent
     */
    public function getEvent()
    {
        return $this->get(self::EVENT);
    }

    /**
     * Sets value of 'error' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setError($value)
    {
        return $this->set(self::ERROR, $value);
    }

    /**
     * Returns value of 'error' property
     *
     * @return string
     */
    public function getError()
    {
        return $this->get(self::ERROR);
    }
}
}