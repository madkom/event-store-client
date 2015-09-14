<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */
namespace EventStore\Client\Domain\Socket\Data\ScavengeDatabaseCompleted {
/**
 * ScavengeResult enum embedded in ScavengeDatabaseCompleted message
 */
final class ScavengeResult
{
    const Success = 0;
    const InProgress = 1;
    const Failed = 2;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'Success' => self::Success,
            'InProgress' => self::InProgress,
            'Failed' => self::Failed,
        );
    }
}
}