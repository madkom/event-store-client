<?php
/**
 * Auto generated from ClientMessageDtos.proto at 2015-09-12 21:56:31
 *
 * EventStore.Socket.Proxy package
 */
namespace EventStore\Client\Domain\Socket\Proxy {
/**
 * OperationResult enum
 */
final class OperationResult
{
    const Success = 0;
    const PrepareTimeout = 1;
    const CommitTimeout = 2;
    const ForwardTimeout = 3;
    const WrongExpectedVersion = 4;
    const StreamDeleted = 5;
    const InvalidTransaction = 6;
    const AccessDenied = 7;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'Success' => self::Success,
            'PrepareTimeout' => self::PrepareTimeout,
            'CommitTimeout' => self::CommitTimeout,
            'ForwardTimeout' => self::ForwardTimeout,
            'WrongExpectedVersion' => self::WrongExpectedVersion,
            'StreamDeleted' => self::StreamDeleted,
            'InvalidTransaction' => self::InvalidTransaction,
            'AccessDenied' => self::AccessDenied,
        );
    }
}
}