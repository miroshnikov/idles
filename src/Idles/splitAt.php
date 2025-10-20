<?php

/**
 * Splits a given array or string at a given index.
 * 
 * @param int $index The index where the array/string is split.
 * 
 * @param array|string $arrayOrString
 * 
 * @return string[]|array
 */

namespace Idles;

function splitAt(...$args)
{
    return curryN(2, 
        fn (int $index, $array) =>
            \is_array($array) ? 
                [\array_slice($array, 0, $index), \array_slice($array, $index)] :
                [\mb_substr($array, 0, $index), \mb_substr($array, $index)]
    )(...$args);
}
