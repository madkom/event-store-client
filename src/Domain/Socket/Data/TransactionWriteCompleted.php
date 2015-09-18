<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data {
/**
 * TransactionWriteCompleted message
 */
class TransactionWriteCompleted extends \ProtobufMessage
{
    /* Field index constants */
    const TRANSACTION_ID = 1;
    const RESULT = 2;
    const MESSAGE = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::TRANSACTION_ID => array(
            'name' => 'transaction_id',
            'required' => true,
            'type' => 5,
        ),
        self::RESULT => array(
            'name' => 'result',
            'required' => true,
            'type' => 5,
        ),
        self::MESSAGE => array(
            'name' => 'message',
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
        $this->values[self::TRANSACTION_ID] = null;
        $this->values[self::RESULT] = null;
        $this->values[self::MESSAGE] = null;
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
     * Sets value of 'message' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMessage($value)
    {
        return $this->set(self::MESSAGE, $value);
    }

    /**
     * Returns value of 'message' property
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->get(self::MESSAGE);
    }
}
}