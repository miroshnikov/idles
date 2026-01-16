<?php

namespace Idles;

/**
 * Returns the index of the last occurrence of `$value` in iterable or string, else `-1`.
 * 
 * @param mixed $item
 * @param iterable<mixed>|string $collection
 * @return int
 * 
 * @category Array
 * 
 * @see indexOf()
 * @see findIndex()
 * @see find()
 */
function lastIndexOf(mixed ...$args)
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