<?php

namespace Idles;

function drop(...$args)
{
    return curryN(2, 
        fn (int $n, ?iterable $collection) => slice($n, null, $collection)
    )(...$args);
}
