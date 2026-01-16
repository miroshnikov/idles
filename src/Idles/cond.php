<?php

namespace Idles;

/**
 * Iterates over `$pairs` and invokes the corresponding function of the first predicate to return truthy.
 * 
 * @param array<array{callable,callable}> $pairs array of [predicate, function] tupels
 * @return callable
 * 
 * @example ```
 *   $fn = cond([
 *     [equals(0),   always('water freezes at 0°C')],
 *     [equals(100), always('water boils at 100°C')],
 *     [T(...),      fn ($temp) => "nothing special happens at $temp °C"]
 *   ]);
 *   $fn(0);     // 'water freezes at 0°C'
 *   $fn(50);    // 'nothing special happens at 50 °C'
 *   $fn(100);   // 'water boils at 100°C'
 * ```
 * 
 * @category Logic
 * 
 * @see when()
 */
function cond(array $pairs): callable
{
    return function (...$args) use ($pairs) {
        foreach ($pairs as [$predicate, $func]) {
            if ($predicate(...$args)) {
                return $func(...$args);
            }
        }
        return null;
    };
}
