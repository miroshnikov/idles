<?php

namespace Idles;

function _reduce(?iterable $collection, callable $iteratee, $accumulator = null)
{
    $collection ??= [];
    $first = true;
    foreach ($collection as $key => $value) {
        $accumulator = (\is_null($accumulator) && $first) ? $value : $iteratee($accumulator, $value, $key, $collection);
        $first = false;
    }
    return $accumulator;
}

function reduce(...$args)
{
    return curryN(3, 
        fn (callable $iteratee, $accumulator, ?iterable $collection) => _reduce($collection, $iteratee, $accumulator)
    )(...$args);
}
