<?php

namespace Idles;

function prop(...$args)
{
    return curryN(2, 
        fn (/*string|int*/ $key, ?iterable $record) => collect($record)[$key] ?? null
    )(...$args);
}

function propOr(...$args)
{
    return curryN(3, 
        fn ($default, /*string|int*/ $key, ?iterable $record) => collect($record)[$key] ?? $default
    )(...$args);
}

function property(...$args)
{
    return prop(...$args);
}

function propertyOr(...$args)
{
    return propOr(...$args);
}