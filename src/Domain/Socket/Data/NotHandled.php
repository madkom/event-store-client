<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace EventStore\Client\Domain\Socket\Data {
/**
 * NotHandled message
 */
class NotHandled extends \ProtobufMessage
{
    /* Field index constants */
    const REASON = 1;
    const ADDITIONAL_INFO = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::REASON => array(
            'name' => 'reason',
            'required' => true,
            'type' => 5,
        ),
        self::ADDITIONAL_INFO => array(
            'name' => 'additional_info',
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
        $this->values[self::REASON] = null;
        $this->values[self::ADDITIONAL_INFO] = null;
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
     * Sets value of 'reason' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setReason($value)
    {
        return $this->set(self::REASON, $value);
    }

    /**
     * Returns value of 'reason' property
     *
     * @return int
     */
    public function getReason()
    {
        return $this->get(self::REASON);
    }

    /**
     * Sets value of 'additional_info' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setAdditionalInfo($value)
    {
        return $this->set(self::ADDITIONAL_INFO, $value);
    }

    /**
     * Returns value of 'additional_info' property
     *
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->get(self::ADDITIONAL_INFO);
    }
}
}