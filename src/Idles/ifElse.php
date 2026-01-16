<?php

namespace Idles;

/**
 * Resulting function returns `$onTrue(...$args)` if `$predicate(...$args)` is truthy or `$onFalse(...$args)` otherwise.
 * 
 * @param callable(mixed...):bool $predicate
 * @param callable(mixed...):mixed $onTrue
 * @param callable(mixed...):mixed $onFalse
 * @return callable(mixed...):mixed
 * 
 * @example ```
 *   $f = ifElse(equals('a'), always('T'), always('F'));
 *   $f('a');  // T
 *   $f('b');  // F
 * ```
 * 
 * @category Logic
 * 
 * @see unless()
 * @see when()
 * @see cond()
 */
function ifElse(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity,
        fn (callable $predicate, callable $onTrue, callable $onFalse) => 
            fn (...$args) => $predicate(...$args) ? $onTrue(...$args) : $onFalse(...$args)
    )(...$args);
}