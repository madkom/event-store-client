<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */
namespace EventStore\Client\Domain\Socket\Data\ReadEventCompleted {
/**
 * ReadEventResult enum embedded in ReadEventCompleted message
 */
final class ReadEventResult
{
    const Success = 0;
    const NotFound = 1;
    const NoStream = 2;
    const StreamDeleted = 3;
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
            'NotFound' => self::NotFound,
            'NoStream' => self::NoStream,
            'StreamDeleted' => self::StreamDeleted,
            'Error' => self::Error,
            'AccessDenied' => self::AccessDenied,
        );
    }
}
}