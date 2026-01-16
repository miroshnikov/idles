<?php

namespace Idles;

/**
 * Resulting function returns `$fn1(...$args)` if it is truthy or `$fn2(...$args)` otherwise, short-circuited.
 * 
 * @param callable $fn1
 * @param callable $fn2
 * @return callable
 * 
 * @example ```
 *   either(always('a'), identity(...))('b');  // a
 *   either(always(''), identity(...))('b');   // b
 * ```
 * 
 * @category Logic
 * 
 * @see both()
 * @see anyPass()
 */
function either(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (callable $f1, callable $f2) => function (...$args) use ($f1, $f2) { 
            $res1 = $f1(...$args);
            return $res1 ? $res1 : $f2(...$args);
        }
    )(...$args);
}