<?php

namespace Idles;

/**
 * Returns a generator of `$value`, `$f($value)`, `$f($f($value))` etc.
 * 
 * @param callable $fn
 * @param mixed $value initial
 * @return iterable<mixed>
 * 
 * @example ```
 *  pipe(
 *    take(5),
 *    collect(...)
 *  )(iterate(inc(...), 1)); // [1, 2, 3, 4, 5]
 * ```
 * 
 * @category Util
 * 
 * @idles-lazy
 */
function iterate(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $fn, $value) => _iterate($fn, $value)
    )(...$args);
}

/**
 * @internal 
 * @ignore
 * 
 * @return iterable<mixed>
 */
function _iterate(callable $func, mixed $value): iterable
{
    while (1) {
        yield $value;
        $value = $func($value);
    }
}