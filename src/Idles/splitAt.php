<?php

namespace Idles;

/**
 * Splits a given array or string at a given index.
 * 
 * @param int $index The index where the array/string is split.
 * @param array|string $arrayOrString
 * @return string[]|array
 * 
 * @example ```
 *  splitAt(1)([1, 2, 3]); // [[1], [2, 3]]
 * ```
 * 
 * @category Array
 * 
 * @see slice()
 * @see splitEvery()
 */
function splitAt(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (int $index, $array) =>
            \is_array($array) ? 
                [\array_slice($array, 0, $index), \array_slice($array, $index)] :
                [\mb_substr($array, 0, $index), \mb_substr($array, $index)]
    )(...$args);
}
