<?php
/**
 * Delivery zones, streets, and fees.
 * Included by: order.php, api/verify-payment.php
 *
 * Structure per zone:
 *   - id / name  : the zone itself (e.g. a landmark area like "Wimpy")
 *   - fee        : flat delivery fee (Naira) for anywhere in this zone
 *   - streets    : known streets/landmarks shown to the user once they're
 *                  searching — these appear as suggestions
 *   - aliases    : smaller streets you want searchable but don't need
 *                  cluttering the main list. Same treatment as `streets` in
 *                  search, just kept separate so you can see at a glance
 *                  which entries were manually added later.
 *
 * TODO: move this into a `delivery_zones` + `delivery_zone_streets` table
 * once you're adding streets often enough that editing this file by hand
 * gets tedious.
 */

$zones = [
    [
        'id' => 'wimpy',
        'name' => 'Wimpy',
        'fee' => 1200,
        'streets' => ['Wimpy Junction', 'Aba Road by Wimpy'],
        'aliases' => ['Soso Street', 'Johnson Street'],
    ],
    [
        'id' => 'rumuola',
        'name' => 'Rumuola',
        'fee' => 1000,
        'streets' => ['Rumuola Road', 'Ada George Junction'],
        'aliases' => [],
    ],
    [
        'id' => 'trans-amadi',
        'name' => 'Trans Amadi',
        'fee' => 1500,
        'streets' => ['Trans Amadi Industrial Layout'],
        'aliases' => [],
    ],
    // Add more zones as you learn where orders are actually coming from.
];

/**
 * Flattens zones + streets + aliases into one searchable list. Each entry
 * carries the zone_id so selecting any of them resolves back to the zone's
 * fee, regardless of whether the user typed the zone name, a listed street,
 * or a hidden alias.
 */
function buildZoneSearchIndex(): array
{
    global $zones;

    $index = [];

    foreach ($zones as $zone) {
        $index[] = ['label' => $zone['name'], 'zone_id' => $zone['id']];

        foreach ($zone['streets'] as $street) {
            $index[] = ['label' => $street . ' (' . $zone['name'] . ')', 'zone_id' => $zone['id']];
        }

        foreach ($zone['aliases'] as $alias) {
            $index[] = ['label' => $alias . ' (' . $zone['name'] . ')', 'zone_id' => $zone['id']];
        }
    }

    return $index;
}

function findZoneById(?string $zoneId): ?array
{
    global $zones;

    foreach ($zones as $zone) {
        if ($zone['id'] === $zoneId) {
            return $zone;
        }
    }

    return null;
}

/**
 * @return array{valid: bool, fee: int, zone: array|null}
 */
function calculateDeliveryFeeByZone(?string $zoneId): array
{
    $zone = findZoneById($zoneId);

    if (!$zone) {
        return ['valid' => false, 'fee' => 0, 'zone' => null];
    }

    return ['valid' => true, 'fee' => $zone['fee'], 'zone' => $zone];
}