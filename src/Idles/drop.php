<?php

namespace Idles;

function drop(...$args)
{
    static $arity = 2;
    return curryN(2, 
        fn (int $n, ?iterable $collection) => slice($n, null, $collection)
    )(...$args);
}
