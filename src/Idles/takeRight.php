<?php

namespace Idles;

function takeRight(...$args)
{
    return curryN(
        2,
        fn (int $n, ?iterable $collection) => \array_slice(collect($collection), -$n)
    )(...$args);
}

function takeLast(...$args)
{
    return takeRight(...$args);
}
