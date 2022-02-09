<?php

namespace Idles;

function _sumBy(?iterable $collection, callable $iteratee): int
{
    $collection ??= [];
    $sum = 0;
    foreach ($collection as $n) {
        $sum += $iteratee($n);
    }
    return $sum;
}

function sumBy(...$args)
{
    return curryN(2, 
        fn (?callable $iteratee, ?iterable $collection) => _sumBy($collection, $iteratee)
    )(...$args);
}

function sum(...$args)
{
    return curryN(1, 
        fn (?iterable $collection) => _sumBy($collection, fn ($v) => $v)
    )(...$args);
}
