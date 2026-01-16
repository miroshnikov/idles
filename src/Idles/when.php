<?php

namespace Idles;

/**
 * Returns `$predicate($value) ? $whenTrue($value) : $value`.
 * 
 * @template T
 * @param callable(T $value):bool $predicate
 * @param callable(T $value):mixed $whenTrue
 * @param T $value
 * @return mixed
 * 
 * @category Logic
 * 
 * @see ifElse()
 * @see unless()
 * @see cond()
 * 
 * @phpstan-ignore method.templateTypeNotInParameter 
 */
function when(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity,
        fn (callable $predicate, callable $whenTrue, $value) => $predicate($value) ? $whenTrue($value) : $value
    )(...$args);
}
