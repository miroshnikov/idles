<?php

namespace Idles;

function _findLastIndex(?iterable $collection, callable $predicate, ?int $fromIndex = null): int
{   
    $a = collect($collection);
    $size = size($a);
    $fromIndex ??= $size;
    $from = $fromIndex < 0 ? \max(0, $size + $fromIndex) : \min($fromIndex, $size - 1);
    for ($i = $from; $i >= 0; --$i) {
        if ($predicate($a[$i], $i, $a)) {
            return $i;
        }
    }
    return -1;
}


function findLastIndex(...$args)
{
    return curryN(2, 
        fn (callable $predicate, ?iterable $collection) => _findLastIndex($collection, $predicate)
    )(...$args);
}

function findLastIndexFrom(...$args)
{
    return curryN(3, 
        fn (callable $predicate, int $fromIndex, ?iterable $collection) => _findLastIndex($collection, $predicate, $fromIndex)
    )(...$args);
}
