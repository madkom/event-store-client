<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */
namespace EventStore\Client\Domain\Socket\Data\NotHandled {
/**
 * NotHandledReason enum embedded in NotHandled message
 */
final class NotHandledReason
{
    const NotReady = 0;
    const TooBusy = 1;
    const NotMaster = 2;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'NotReady' => self::NotReady,
            'TooBusy' => self::TooBusy,
            'NotMaster' => self::NotMaster,
        );
    }
}
}