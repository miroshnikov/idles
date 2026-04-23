<?php

namespace Idles;

/**
 * Returns `$record[$key] === $value` or `false` if the `$key` doesn't exist.
 * 
 * @param mixed $value
 * @param array-key $key
 * @param ?iterable<mixed> $record
 * @return \Closure|bool
 * 
 * @example ```
 *   propEq('a', 'A', ['a' => 'A']); // true
 * ```
 * 
 * @category Record
 * 
 * @see whereEq()
 * @see propSatisfies()
 * @see equals()
 */
function propEq(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity,
        function ($value, $key, ?iterable $record) {
            $record = collect($record);
            return \array_key_exists($key, $record) 
                ? equals($record[$key], $value)
                : false;
        }
    )(...$args);
}
