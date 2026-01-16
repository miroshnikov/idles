<?php

namespace Idles;

/**
 * Skips the last `$n` elements of iterable or string.
 * 
 * @template T of iterable<mixed>|string
 * @param int $n
 * @param T|null $collection
 * @return T
 * 
 * @example ```
 *   dropLast(2, [1, 2, 3]);  // [1]
 * ```
 * 
 * @category Array
 * 
 * @see drop()
 * @see slice()
 * 
 * @alias dropRight
 */
function dropLast(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (int $n, iterable|null|string $collection) => 
            $n ? 
                (\is_string($collection) ? 
                    \mb_substr($collection, 0, \mb_strlen($collection)-$n) : 
                    \array_slice(collect($collection), 0, -$n)
                ) : 
                $collection
    )(...$args);
}
