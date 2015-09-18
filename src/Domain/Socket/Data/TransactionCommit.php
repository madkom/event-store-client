<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * TransactionCommit message
 */
class TransactionCommit extends \ProtobufMessage
{
    /* Field index constants */
    const TRANSACTION_ID = 1;
    const REQUIRE_MASTER = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::TRANSACTION_ID => array(
            'name' => 'transaction_id',
            'required' => true,
            'type' => 5,
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
        $this->values[self::TRANSACTION_ID] = null;
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
     * Sets value of 'transaction_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setTransactionId($value)
    {
        return $this->set(self::TRANSACTION_ID, $value);
    }

    /**
     * Returns value of 'transaction_id' property
     *
     * @return int
     */
    public function getTransactionId()
    {
        return $this->get(self::TRANSACTION_ID);
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