<?php

namespace Idles;

function dropRight(...$args)
{
    static $arity = 2;
    return curryN(2, 
        fn (int $n, ?iterable $collection) => $n ? \array_slice(collect($collection), 0, -$n) : $collection
    )(...$args);
}

function dropLast(...$args)
{
    static $arity = 2;
    return dropRight(...$args);
}
