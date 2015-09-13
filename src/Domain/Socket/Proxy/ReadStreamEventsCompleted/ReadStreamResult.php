<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */
namespace EventStore\Client\Domain\Socket\Proxy\ReadStreamEventsCompleted {
/**
 * ReadStreamResult enum embedded in ReadStreamEventsCompleted message
 */
final class ReadStreamResult
{
    const Success = 0;
    const NoStream = 1;
    const StreamDeleted = 2;
    const NotModified = 3;
    const Error = 4;
    const AccessDenied = 5;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'Success' => self::Success,
            'NoStream' => self::NoStream,
            'StreamDeleted' => self::StreamDeleted,
            'NotModified' => self::NotModified,
            'Error' => self::Error,
            'AccessDenied' => self::AccessDenied,
        );
    }
}
}