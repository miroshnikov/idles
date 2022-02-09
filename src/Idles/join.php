<?php

namespace Idles;

function join(...$args)
{
    return curryN(2, 
        fn (string $separator, ?iterable $collection) => \implode($separator, collect($collection))
    )(...$args);
}
