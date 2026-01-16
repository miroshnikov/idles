<?php

namespace Idles;

/**
 * Returns a new array by plucking the same named property off all records in the array supplied.
 * 
 * @param array-key $key
 * @param ?iterable<mixed> $collection
 * @return iterable<mixed>
 * 
 * @category Record
 */
function pluck(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn ($key, ?iterable $collection) => map(prop($key), $collection)
    )(...$args);
}
