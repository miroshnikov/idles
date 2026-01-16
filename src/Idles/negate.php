<?php

namespace Idles;

/**
 * Creates a function that negates the result of the `$predicate` function.
 * 
 * @param callable $predicate
 * @return callable
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
