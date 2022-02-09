<?php

namespace Idles;

function _findIndex(?iterable $collection, callable $predicate, int $fromIndex = 0): int
{   
    $size = 0;
    if ($fromIndex < 0) {
        $collection = collect($collection);
        $size = size($collection);
    }

    $collection = values($fromIndex ? slice($fromIndex, null, $collection) : $collection);
    foreach ($collection as $i => $v) {
        if ($predicate($v, $i, $collection)) {
            return ($fromIndex < 0 ? \max(0, $fromIndex + $size) : $fromIndex) + $i;
        }
    }
    return -1;
}

function findIndex(...$args)
{
    return curryN(2, 
        fn (callable $predicate, ?iterable $collection) => _findIndex($collection, $predicate)
    )(...$args);
}

function findIndexFrom(...$args)
{
    return curryN(3, 
        fn (callable $predicate, int $fromIndex, ?iterable $collection) => _findIndex($collection, $predicate, $fromIndex)
    )(...$args);
}
