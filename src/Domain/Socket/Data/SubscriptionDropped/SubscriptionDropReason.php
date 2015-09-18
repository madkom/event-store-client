<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */
namespace Madkom\EventStore\Client\Domain\Socket\Data\SubscriptionDropped {
/**
 * SubscriptionDropReason enum embedded in SubscriptionDropped message
 */
final class SubscriptionDropReason
{
    const Unsubscribed = 0;
    const AccessDenied = 1;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'Unsubscribed' => self::Unsubscribed,
            'AccessDenied' => self::AccessDenied,
        );
    }
}
}