<?php

namespace Idles;

function _sumBy(?iterable $collection, callable $iteratee)
{
    $collection ??= [];
    $sum = 0;
    foreach ($collection as $n) {
        $sum += $iteratee($n);
    }
    return $sum;
}

/**
 * Sums elements, $iteratee is invoked for each element in $collection to generate the value to be summed.
 *
 * @param ?callable     $iteratee
 * @param ?iterable     $collection
 *
 * @return int|float
 */

function sumBy(...$args)
{
    return curryN(2, 
        fn (?callable $iteratee, ?iterable $collection) => _sumBy($collection, $iteratee)
    )(...$args);
}