<?php

namespace Idles;

/**
 * @param string|int    $key
 * @param ?iterable     $record
 * 
 * @return mixed|null
 */

function prop(...$args)
{
    return curryN(2, 
        fn ($key, ?iterable $record) => collect($record)[$key] ?? null
    )(...$args);
}

function property(...$args)
{
    return prop(...$args);
}
