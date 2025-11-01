<?php

namespace Idles;

function join(...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (string $separator, ?iterable $collection) => \implode($separator, collect($collection))
    )(...$args);
}
