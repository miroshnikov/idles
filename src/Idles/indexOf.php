<?php

/**
 * Returns the index of the first occurrence of the item in array or string, else -1.
 * 
 * @param mixed the item to find
 * 
 * @param ?iterable|string array or string to search in
 * 
 * @return string
 */

namespace Idles;

function indexOf(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn ($value, $collection) => 
            \is_string($collection) ? 
                \mb_strpos($collection, $value) :
                findIndex(fn ($v) => $v == $value, $collection)
    )(...$args);
}

function indexOfFrom(...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn ($value, int $fromIndex, ?iterable $collection) => 
            findIndexFrom(fn ($v) => $v == $value, $fromIndex, $collection)
    )(...$args);
}
