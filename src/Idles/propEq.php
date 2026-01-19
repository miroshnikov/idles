<?php

namespace Idles;

/**
 * Returns $record[$key] == $value
 * 
 * @param array-key $key
 * @param mixed $value
 * @param ?iterable<mixed> $record
 * @return bool
 * 
 * @example ```
 *   propEq('a', 'A', ['a' => 'A']); // true
 * ```
 * 
 * @category Record
 * 
 * @see whereEq()
 */
function propEq(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity,
        fn ($key, $value, ?iterable $record) => (collect($record)[$key] ?? null) == $value
    )(...$args);
}
