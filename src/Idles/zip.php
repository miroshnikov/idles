<?php

namespace Idles;

function zip(...$args)
{
    return curryN(2, 
        fn (iterable $a, iterable $b) => _zipWith(fn (...$values) => $values, $a, $b)
    )(...$args);
}

function zipAll(...$args)
{
    return curryN(1, 
        fn (array $iterables) => _zipWith(fn (...$values) => $values, ...$iterables)
    )(...$args);
}
