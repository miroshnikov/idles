<?php

namespace Idles;

/**
 * Returns `$predicate($record[$key])`
 * 
 * @param callable(mixed):bool $predicate
 * @param array-key $key
 * @param ?iterable<mixed> $record
 * @return \Closure|bool
 * 
 * @example ```
 *   propSatisfies(fn ($x) => $x > 0, 'x', ['x' => 1, 'y' => 2]); // true
 * ```
 * 
 * @category Record
 * 
 * @see propEq()
 * @see whereEq()
 */
function propSatisfies(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity,
        fn ($fn, $key, ?iterable $record) => !!$fn(collect($record)[$key] ?? null)
    )(...$args);
}
