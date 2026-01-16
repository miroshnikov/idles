<?php

namespace Idles;

/**
 * Replaces keys with values. Duplicate keys are overwritten.
 * 
 * @param ?iterable<mixed> $collection
 * @return array<mixed>
 * 
 * @example ```
 *  invert([ 'a' => 1, 'b' => 2, 'c' => 1 ]); // [1 => 'c', 2 => 'b']
 * ```
 * 
 * @category Record
 */
function invert(mixed ...$args): array
{
    static $arity = 1;
    return curryN($arity, 
        fn (?iterable $collection) => \array_flip(collect($collection))
    )(...$args);
}
