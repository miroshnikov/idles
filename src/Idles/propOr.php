<?php

namespace Idles;

/**
 * Return the $key property or the first argument
 *
 * @param mixed         $default
 * @param string|int    $key
 * @param ?iterable     $record
 *
 * @return mixed
 */
function propOr(...$args)
{
    return curryN(3, 
        fn ($default, $key, ?iterable $record) => collect($record)[$key] ?? $default
    )(...$args);
}

function propertyOr(...$args)
{
    return propOr(...$args);
}