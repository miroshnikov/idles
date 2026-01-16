<?php

namespace Idles;

/**
 * Returns a slice of iterable with `$n` elements taken from the end.
 * 
 * @param positive-int $n
 * @param ?iterable<mixed> $collection
 * @return array<mixed>
 * 
 * @example ```
 *  takeRight(2, [1, 2, 3]);  // [2, 3]
 * ```
 * 
 * @category Array
 * 
 * @see slice()
 * @see drop()
 * 
 * @alias takeRight
 */
function takeLast(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (int $n, ?iterable $collection) => \array_slice(collect($collection), -$n)
    )(...$args);
}
