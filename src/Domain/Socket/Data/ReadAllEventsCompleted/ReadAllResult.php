<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */
namespace EventStore\Client\Domain\Socket\Data\ReadAllEventsCompleted {
/**
 * ReadAllResult enum embedded in ReadAllEventsCompleted message
 */
final class ReadAllResult
{
    const Success = 0;
    const NotModified = 1;
    const Error = 2;
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
            'NotModified' => self::NotModified,
            'Error' => self::Error,
            'AccessDenied' => self::AccessDenied,
        );
    }
}
}