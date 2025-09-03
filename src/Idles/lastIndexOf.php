<?php

/**
 * Returns the position of the last occurrence of an item in an array or string, or -1.
 * 
 * @param mixed the item to find
 * 
 * @param ?iterable|string array or string to search in
 * 
 * @return string
 */

namespace Idles;

function lastIndexOf(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function ($value, $collection) {
            if (\is_string($collection)) {
                return \mb_strrpos($collection, $value);
            }
            $array = collect($collection);
            for ($i = \count($array)-1; $i >= 0; $i--) {
                if ($value == $array[$i]) {
                    return $i;
                }
            }
            return -1;
        }
    )(...$args);
}