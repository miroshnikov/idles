<?php

namespace Idles;

/**
 * Checks if `$record` has `$key`.
 * 
 * @param array-key $key
 * @param ?iterable<mixed> $record
 * @return bool
 * 
 * @example ```
 *   has('a', ['a' => 'A]); // true
 * ```
 * 
 * @category Record
 * 
 * @see hasPath()
 * @see get()
 */
function has(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn ($key, ?iterable $record) => \array_key_exists($key, collect($record))
    )(...$args);
}
