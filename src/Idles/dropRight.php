<?php

namespace Idles;

function dropRight(...$args)
{
    return curryN(2, 
        fn (int $n, ?iterable $collection) => $n ? \array_slice(collect($collection), 0, -$n) : $collection
    )(...$args);
}

function dropLast(...$args)
{
    return dropRight(...$args);
}
