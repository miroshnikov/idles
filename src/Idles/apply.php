<?php

namespace Idles;

/**
 * Calls $fn(...$args)
 *
 * @param callable(mixed...):mixed $fn
 * @param ?iterable<mixed> $args
 * @return mixed
 * 
 * @example ```
 *   apply(\max(...), [1, 2, 3, -99, 42, 6, 7]); // 42
 * ```
 * 
 * @category Function
 * 
 * @see unapply()
 */
function apply(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $fn, ?iterable $args) => $fn(...collect($args))
    )(...$args);
}
