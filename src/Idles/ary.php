<?php

namespace Idles;

/**
 * Creates a function that invokes `$fn`, with up to `$n` arguments, ignoring any additional arguments.
 *
 * @param positive-int $n
 * @param callable $fn
 * @return callable
 * 
 * @example ```
 *   map(ary(1, \intval(...)), ['6', '8', '10']); // [6, 8, 10]
 * ```
 * 
 * @category Function
 * 
 * @see unary()
 * 
 * @alias nAry
 */
function ary(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (int $n, callable $fn) => fn (...$args) => $fn(...take($n, $args))
    )(...$args);
}
