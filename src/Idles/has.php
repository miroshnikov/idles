<?php

namespace Idles;

function has(...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (/*string|int*/ $key, ?iterable $record) => \array_key_exists($key, collect($record))
    )(...$args);
}
