<?php
/**
 * Auto generated from Dtos.proto at 2015-11-27 20:14:51
 *
 * EventStore.Client.Messages package
 */
namespace Madkom\EventStore\Client\Domain\Socket\Data\DeletePersistentSubscriptionCompleted {
/**
 * DeletePersistentSubscriptionResult enum embedded in DeletePersistentSubscriptionCompleted message
 */
final class DeletePersistentSubscriptionResult
{
    const Success = 0;
    const DoesNotExist = 1;
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
            'DoesNotExist' => self::DoesNotExist,
            'Fail' => self::Fail,
            'AccessDenied' => self::AccessDenied,
        );
    }
}
}