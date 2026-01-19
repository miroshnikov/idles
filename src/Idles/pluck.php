<?php

namespace Idles;

/**
 * Returns a new array by plucking the same named property off all records in the array supplied.
 * 
 * @param array-key $key
 * @param ?iterable<array> $collection
 * @return iterable<mixed>
 * 
 * @example ```
 *  pluck(0, [[1, 2], [3, 4]]); // [1, 3]
 *  pluck('val', ['a' => ['val' => 3], 'b' => ['val' => 5]]); // ['a' => 3, 'b' => 5]
 * ```
 * 
 * @category Record
 * 
 * @see map()
 * @see paths() 
 * @see project()
 * 
 * @idles-lazy
 */
function pluck(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn ($key, ?iterable $collection) => map(prop($key), $collection)
    )(...$args);
}
