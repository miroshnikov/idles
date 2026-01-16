<?php

namespace Idles;

/**
 * Returns `$predicate($value) ? $value : $whenFalse($value)`.
 * 
 * @template T
 * @param callable(T):bool $predicate
 * @param callable(T):mixed $whenFalse
 * @param T $value
 * @return mixed
 * 
 * @example ```
 *  $safeInc = unless(\is_null(...), inc(...));
 *  $safeInc(null); // null
 *  $safeInc(1);    // 2
 * ```
 * 
 * @category Logic
 * 
 * @see ifElse()
 * @see when()
 * @see cond()
 * 
 * @phpstan-ignore method.templateTypeNotInParameter 
 */
function unless(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity,
        fn (callable $predicate, callable $whenFalse, $value) => $predicate($value) ? $value : $whenFalse($value)
    )(...$args);
}