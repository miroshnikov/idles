<?php

namespace Idles;

/**
 * Creates a function that negates the result of the `$predicate` function.
 * 
 * @param callable $predicate
 * @return callable
 * 
 * @example ```
 *  $isEven = fn ($n) => $n % 2 == 0;
 *  filter(negate($isEven), [1, 2, 3, 4, 5, 6]); // [1, 3, 5]
 * ```
 * 
 * @category Function
 * 
 * @alias complement
 */
function negate(callable $predicate): callable
{
    return curryN(
        arity($predicate),
        fn (...$args) => !$predicate(...$args)   
    );
}
