<?php

namespace Idles;

/**
 * Skips the first `$n` elemens and returns the rest of iterable or string.
 * 
 * @template T of iterable<mixed>|string
 * @param int $n
 * @param T|null $collection
 * @return T
 * 
 * @example ```
 *   drop(1, [1, 2, 3]); // [2, 3]
 * ```
 * 
 * @category Array
 * 
 * @see dropRight()
 * @see slice()
 * 
 * @idles-lazy
 * @idles-reindexed
 */
function drop(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (int $n, iterable|null|string $collection) => slice($n, null, $collection)
    )(...$args);
}
