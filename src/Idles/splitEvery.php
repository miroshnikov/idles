<?php

namespace Idles;

/**
 * Splits an array or string into slices of the specified length.
 * 
 * @param positive-int $length length of slice
 * @param array|string $arrayOrString
 * @return string[]|array
 * 
 * @example ```
 *  splitEvery(3, [1, 2, 3, 4, 5, 6, 7]); // [[1, 2, 3], [4, 5, 6], [7]]
 * ```
 * 
 * @category Array
 * 
 * @see slice()
 * @see splitAt()
 * 
 * @idles-reindexed
 */
function splitEvery(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn ($length, $array) =>
            \is_array($array) ? 
                \array_chunk($array, $length) :
                \mb_str_split($array, $length)
    )(...$args);
}