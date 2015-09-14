<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace EventStore\Client\Domain\Socket\Data {
/**
 * SubscriptionDropped message
 */
class SubscriptionDropped extends \ProtobufMessage
{
    /* Field index constants */
    const REASON = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::REASON => array(
            'default' => \EventStore\Client\Domain\Socket\Data\SubscriptionDropped\SubscriptionDropReason::Unsubscribed,
            'name' => 'reason',
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
        $this->values[self::REASON] = \EventStore\Client\Domain\Socket\Data\SubscriptionDropped\SubscriptionDropReason::Unsubscribed;
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
}
}