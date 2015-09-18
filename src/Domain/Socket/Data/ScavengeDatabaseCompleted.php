<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * ScavengeDatabaseCompleted message
 */
class ScavengeDatabaseCompleted extends \ProtobufMessage
{
    /* Field index constants */
    const RESULT = 1;
    const ERROR = 2;
    const TOTAL_TIME_MS = 3;
    const TOTAL_SPACE_SAVED = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::RESULT => array(
            'name' => 'result',
            'required' => true,
            'type' => 5,
        ),
        self::ERROR => array(
            'name' => 'error',
            'required' => false,
            'type' => 7,
        ),
        self::TOTAL_TIME_MS => array(
            'name' => 'total_time_ms',
            'required' => true,
            'type' => 5,
        ),
        self::TOTAL_SPACE_SAVED => array(
            'name' => 'total_space_saved',
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
        $this->values[self::RESULT] = null;
        $this->values[self::ERROR] = null;
        $this->values[self::TOTAL_TIME_MS] = null;
        $this->values[self::TOTAL_SPACE_SAVED] = null;
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

    /**
     * Sets value of 'total_time_ms' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setTotalTimeMs($value)
    {
        return $this->set(self::TOTAL_TIME_MS, $value);
    }

    /**
     * Returns value of 'total_time_ms' property
     *
     * @return int
     */
    public function getTotalTimeMs()
    {
        return $this->get(self::TOTAL_TIME_MS);
    }

    /**
     * Sets value of 'total_space_saved' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setTotalSpaceSaved($value)
    {
        return $this->set(self::TOTAL_SPACE_SAVED, $value);
    }

    /**
     * Returns value of 'total_space_saved' property
     *
     * @return int
     */
    public function getTotalSpaceSaved()
    {
        return $this->get(self::TOTAL_SPACE_SAVED);
    }
}
}