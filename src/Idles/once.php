<?php

namespace Idles;

/**
 * `$fn` is only called once, the first value is returned in subsequent invocations.
 * 
 * @param callable $fn
 * @return callable
 * 
 * @example ```
 *  $addOneOnce = once(fn ($x) => $x + 1);
 *  $addOneOnce(10); // 11
 *  $addOneOnce(50); // 11
 * ```
 * 
 * @category Function
 * 
 * @see memoize()
 */
function once(callable $fn): callable
{
    $called = false;
    $cache = null;
    return function (...$args) use (&$called, &$cache, $fn) {
        if ($called) {
            return $cache;
        }
        $called = true;
        return $cache = $fn(...$args);
    };
}
