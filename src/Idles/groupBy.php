<?php

namespace Idles;

function _groupBy(?iterable $collection, callable $iteratee): array
{
    $collection ??= [];
    $res = [];
    foreach ($collection as $value) {
        $res[(string)$iteratee($value)][] = $value;
    }
    return $res;
}

function groupBy(...$args)
{
    return curryN(2, 
        fn (callable $iteratee, ?iterable $collection) => _groupBy($collection, $iteratee)
    )(...$args);
}
