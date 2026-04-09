<?php

namespace Idles;

/**
 * Converts an object to a new one by changing all keys that are also found as keys in a mapping object to their corresponding values from that object.
 * 
 * @param array<array-key,array-key> $mapping
 * @param ?iterable<array-key,T> $collection
 * @return \Closure|iterable<U>
 * 
 * @example ```
 *  $mapping = ['name' => 'firstName', 'address' => 'street'];
 *  $obj = ['name' => 'John', 'city' => 'Paris'];
 *  renameKeys($mapping, $obj); // ['firstName' => 'John', 'city' => 'Paris']
 * ```
 * 
 * @category Record
 * 
 * @see mapKeys()
 * @see map()
 */
function renameKeys(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (array $mapping, ?iterable $collection) =>
            mapKeys(
                when(has(_, $mapping), prop(_, $mapping)),
                $collection
            )
    )(...$args);
}