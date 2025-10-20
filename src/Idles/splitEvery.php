<?php

/**
 * Splits an array or string into slices of the specified length. Keys are not preserved.
 * 
 * @param int $length length of slice
 * 
 * @param array|string $array
 * 
 * @return string[]|array
 */

namespace Idles;

function splitEvery(...$args)
{
    return curryN(2, 
        fn (int $length, $array) =>
            \is_array($array) ? 
                \array_chunk($array, $length) :
                \mb_str_split($array, $length)
    )(...$args);
}