<?php

namespace Idles;

/**
 * Takes `$n` first elements from iterable.
 * 
 * @param positive-int $n
 * @param ?iterable<mixed> $collection
 * @return iterable<mixed>
 * 
 * @example ```
 *  take(2, [1, 2, 3]);  // [1, 2]
 * ```
 * 
 * @category Array
 * 
 * @see slice()
 * @see head()
 * 
 * @idles-lazy
 */
function take(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function (int $n, ?iterable $collection) {
            $collection ??= [];
            if (\is_object($collection) && \is_a($collection, '\Iterator')) {
                return new \LimitIterator($collection, 0, $n);
            }
            return \array_slice(collect($collection), 0, $n);
        }
    )(...$args);
}
