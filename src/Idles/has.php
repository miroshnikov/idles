<?php

namespace Idles;

function has(...$args)
{
    return curryN(
        2,
        fn (/*string|int*/ $key, ?iterable $record) => \array_key_exists($key, collect($record))
    )(...$args);
}
