<?php
/**
 * Auto generated from Dtos.proto at 2015-11-27 20:14:51
 *
 * EventStore.Client.Messages package
 */
namespace Madkom\EventStore\Client\Domain\Socket\Data\CreatePersistentSubscriptionCompleted {
/**
 * CreatePersistentSubscriptionResult enum embedded in CreatePersistentSubscriptionCompleted message
 */
final class CreatePersistentSubscriptionResult
{
    const Success = 0;
    const AlreadyExists = 1;
    const Fail = 2;
    const AccessDenied = 3;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'Success' => self::Success,
            'AlreadyExists' => self::AlreadyExists,
            'Fail' => self::Fail,
            'AccessDenied' => self::AccessDenied,
        );
    }
}
}