<?php

/**
 * Class Credentials
 * @author Dariusz Gafka <d.gafka@madkom.pl>
 */
class CredentialsTest extends PHPUnit_Framework_TestCase
{

    /** @var  \EventStore\Client\Domain\Socket\Message\Credentials */
    private $credentials;

    public function setUp()
    {
        $this->credentials = new \EventStore\Client\Domain\Socket\Message\Credentials('test', 'tester');
    }

    /**
     * @test
     */
    public function it_should_return_values_it_was_created_with()
    {
        PHPUnit_Framework_Assert::assertEquals('test', $this->credentials->getUsername());
        PHPUnit_Framework_Assert::assertEquals('tester', $this->credentials->getPassword());
    }

}