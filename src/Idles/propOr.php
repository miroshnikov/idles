<?php

namespace Idles;

/**
 * Return the $key property or `$default`.
 *
 * @param mixed $default
 * @param array-key $key
 * @param ?iterable<mixed> $record
 * @return mixed
 * 
 * @category Record
 * 
 * @alias propertyOr
 */
function propOr(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn ($default, $key, ?iterable $record) => collect($record)[$key] ?? $default
    )(...$args);
}
