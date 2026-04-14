<?php

namespace Idles;

/**
 * Applies a function to the value at the given key of an array.
 * 
 * @param array-key $key
 * @param callable $fn
 * @param array $collection
 * @return array
 * 
 * @example ```
 *  adjust(1, toUpper(...), ['a', 'b', 'c', 'd']); // ['a', 'B', 'c', 'd']
 * ```
 * 
 * @category Collection
 * 
 * @see update()
 * @see modifyPath()
 */
function adjust(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity,
        function (int|string $key, callable $fn, array $collection) {
            if (\is_int($key) && $key < 0) {
                $key = \count($collection) + $key;
            }
            return isset($collection[$key])
                ? [...$collection, $key => $fn($collection[$key])]
                : [...$collection];
        }
    )(...$args);
}