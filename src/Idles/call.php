<?php

namespace Idles;

/**
 * Calls $fn(...$args).
 * 
 * @template T
 * @param callable(mixed...):T $fn
 * @param mixed ...$args
 * @return \Closure|T
 * 
 * @example ```
 *  call(add(...))(1, 2); // 3
 * ```
 * 
 * @category Function
 * 
 * @see apply()
 */
function call(mixed ...$args)
{
    static $arity = arity($args[0]) + 1;
    return curryN($arity, 
        fn (callable $fn, ...$args) => $fn(...$args)
    )(...$args);
}