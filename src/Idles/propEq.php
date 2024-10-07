<?php

namespace Idles;

function propEq(...$args)
{
    static $arity = 3;
    return curryN(
        3,
        fn (/*string|int*/ $key, $value, ?iterable $record): bool => (collect($record)[$key] ?? null) == $value
    )(...$args);
}

function matchesProperty(...$args)
{
    static $arity = 3;
    return propEq(...$args);
}
