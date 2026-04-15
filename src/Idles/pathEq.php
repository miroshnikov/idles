<?php

namespace Idles;

/**
 * If a record has a `$value` at `$path` in `equals()` terms.
 * 
 * @param mixed $value
 * @param array-key|array<array-key>|string $path
 * @param array<array-key,mixed> $record
 * @return \Closure|bool
 * 
 * @example ```
 *  pathEq('c', [0, 'a', 'b'], [['a' => ['b' => 'c']]]); // true
 * ```
 * 
 * @category Record
 * 
 * @see propEq()
 * @see whereEq()
 * @see hasPath()
 */
function pathEq(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn ($value, array $path, array $record) => 
            equals(pathOr(new Undefined, $path, $record), $value)
    )(...$args);
}