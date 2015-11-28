<?php
/**
 * Auto generated from Dtos.proto at 2015-11-27 20:14:51
 *
 * EventStore.Client.Messages package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * DeletePersistentSubscriptionCompleted message
 */
class DeletePersistentSubscriptionCompleted extends \ProtobufMessage
{
    /* Field index constants */
    const RESULT = 1;
    const REASON = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::RESULT => array(
            'default' => \Madkom\EventStore\Client\Domain\Socket\Data\DeletePersistentSubscriptionCompleted\DeletePersistentSubscriptionResult::Success,
            'name' => 'result',
            'required' => true,
            'type' => 5,
        ),
        self::REASON => array(
            'name' => 'reason',
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
        $this->values[self::REASON] = null;
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
     * Sets value of 'reason' property
     *
     * @param string $value Property value
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
     * @return string
     */
    public function getReason()
    {
        return $this->get(self::REASON);
    }
}
}