<?php

namespace Idles;

/**
 * Sums elements in $collection
 *
 * @param ?iterable     $collection
 *
 * @return int|float
 */

function sum(...$args)
{
    return curryN(1, 
        fn (?iterable $collection) => \Idles\_sumBy($collection, fn ($v) => $v)
    )(...$args);
}
