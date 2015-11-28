<?php
/**
 * Auto generated from Dtos.proto at 2015-11-27 20:14:51
 *
 * EventStore.Client.Messages package
 */
namespace Madkom\EventStore\Client\Domain\Socket\Data\PersistentSubscriptionNakEvents {
/**
 * NakAction enum embedded in PersistentSubscriptionNakEvents message
 */
final class NakAction
{
    const Unknown = 0;
    const Park = 1;
    const Retry = 2;
    const Skip = 3;
    const Stop = 4;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'Unknown' => self::Unknown,
            'Park' => self::Park,
            'Retry' => self::Retry,
            'Skip' => self::Skip,
            'Stop' => self::Stop,
        );
    }
}
}