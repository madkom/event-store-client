<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */

namespace Madkom\EventStore\Client\Domain\Socket\Data\NotHandled {
/**
 * MasterInfo message embedded in NotHandled message
 */
class MasterInfo extends \ProtobufMessage
{
    /* Field index constants */
    const EXTERNAL_TCP_ADDRESS = 1;
    const EXTERNAL_TCP_PORT = 2;
    const EXTERNAL_HTTP_ADDRESS = 3;
    const EXTERNAL_HTTP_PORT = 4;
    const EXTERNAL_SECURE_TCP_ADDRESS = 5;
    const EXTERNAL_SECURE_TCP_PORT = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::EXTERNAL_TCP_ADDRESS => array(
            'name' => 'external_tcp_address',
            'required' => true,
            'type' => 7,
        ),
        self::EXTERNAL_TCP_PORT => array(
            'name' => 'external_tcp_port',
            'required' => true,
            'type' => 5,
        ),
        self::EXTERNAL_HTTP_ADDRESS => array(
            'name' => 'external_http_address',
            'required' => true,
            'type' => 7,
        ),
        self::EXTERNAL_HTTP_PORT => array(
            'name' => 'external_http_port',
            'required' => true,
            'type' => 5,
        ),
        self::EXTERNAL_SECURE_TCP_ADDRESS => array(
            'name' => 'external_secure_tcp_address',
            'required' => false,
            'type' => 7,
        ),
        self::EXTERNAL_SECURE_TCP_PORT => array(
            'name' => 'external_secure_tcp_port',
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
        $this->values[self::EXTERNAL_TCP_ADDRESS] = null;
        $this->values[self::EXTERNAL_TCP_PORT] = null;
        $this->values[self::EXTERNAL_HTTP_ADDRESS] = null;
        $this->values[self::EXTERNAL_HTTP_PORT] = null;
        $this->values[self::EXTERNAL_SECURE_TCP_ADDRESS] = null;
        $this->values[self::EXTERNAL_SECURE_TCP_PORT] = null;
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
     * Sets value of 'external_tcp_address' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setExternalTcpAddress($value)
    {
        return $this->set(self::EXTERNAL_TCP_ADDRESS, $value);
    }

    /**
     * Returns value of 'external_tcp_address' property
     *
     * @return string
     */
    public function getExternalTcpAddress()
    {
        return $this->get(self::EXTERNAL_TCP_ADDRESS);
    }

    /**
     * Sets value of 'external_tcp_port' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setExternalTcpPort($value)
    {
        return $this->set(self::EXTERNAL_TCP_PORT, $value);
    }

    /**
     * Returns value of 'external_tcp_port' property
     *
     * @return int
     */
    public function getExternalTcpPort()
    {
        return $this->get(self::EXTERNAL_TCP_PORT);
    }

    /**
     * Sets value of 'external_http_address' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setExternalHttpAddress($value)
    {
        return $this->set(self::EXTERNAL_HTTP_ADDRESS, $value);
    }

    /**
     * Returns value of 'external_http_address' property
     *
     * @return string
     */
    public function getExternalHttpAddress()
    {
        return $this->get(self::EXTERNAL_HTTP_ADDRESS);
    }

    /**
     * Sets value of 'external_http_port' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setExternalHttpPort($value)
    {
        return $this->set(self::EXTERNAL_HTTP_PORT, $value);
    }

    /**
     * Returns value of 'external_http_port' property
     *
     * @return int
     */
    public function getExternalHttpPort()
    {
        return $this->get(self::EXTERNAL_HTTP_PORT);
    }

    /**
     * Sets value of 'external_secure_tcp_address' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setExternalSecureTcpAddress($value)
    {
        return $this->set(self::EXTERNAL_SECURE_TCP_ADDRESS, $value);
    }

    /**
     * Returns value of 'external_secure_tcp_address' property
     *
     * @return string
     */
    public function getExternalSecureTcpAddress()
    {
        return $this->get(self::EXTERNAL_SECURE_TCP_ADDRESS);
    }

    /**
     * Sets value of 'external_secure_tcp_port' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setExternalSecureTcpPort($value)
    {
        return $this->set(self::EXTERNAL_SECURE_TCP_PORT, $value);
    }

    /**
     * Returns value of 'external_secure_tcp_port' property
     *
     * @return int
     */
    public function getExternalSecureTcpPort()
    {
        return $this->get(self::EXTERNAL_SECURE_TCP_PORT);
    }
}
}