<?php

namespace Idles;

function indexOf(...$args)
{
    return curryN(2, 
        fn ($value, ?iterable $collection) => findIndex(fn ($v) => $v == $value, $collection)
    )(...$args);
}

function indexOfFrom(...$args)
{
    return curryN(3, 
        fn ($value, int $fromIndex, ?iterable $collection) => findIndexFrom(fn ($v) => $v == $value, $fromIndex, $collection)
    )(...$args);
}
