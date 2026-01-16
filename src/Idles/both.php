<?php

namespace Idles;

/**
 * Resulting function returns `$func1(...$args)` if it is falsy or `$func2(...$args)` otherwise, short-circuited.
 * 
 * @param callable $fn1
 * @param callable $fn2
 * @return callable
 * 
 * @category Logic
 * 
 * @see either()
 * @see allPass()
 */
function both(mixed ...$args)
{
    static $arity = 2;
    return curryN(
        2,
        fn (callable $fn1, callable $fn2) => function (...$args) use ($fn1, $fn2) { 
            $res1 = $fn1(...$args);
            return $res1 ? $fn2(...$args) : $res1;
        }
    )(...$args);
}