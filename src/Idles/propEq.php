<?php

namespace Idles;

function propEq(...$args)
{
    return curryN(3, 
        fn (/*string|int*/ $key, $value, ?iterable $record): bool => (collect($record)[$key] ?? null) == $value
    )(...$args);
}

function matchesProperty(...$args)
{
    return propEq(...$args);
}
