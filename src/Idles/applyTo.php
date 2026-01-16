<?php

namespace Idles;

/**
 * Returns the result of `$interceptor($value)`.
 *
 * @template T
 * @param T $value
 * @param callable(T $value):mixed $interceptor
 * @return mixed
 * 
 * @example ```
 *   $n13 = applyTo(13);
 *   $n13(add(100)); // 113
 * ```
 * 
 * @category Function
 * 
 * @alias thru
 * @alias thrush
 * 
 * @phpstan-ignore method.templateTypeNotInParameter 
 */
function applyTo(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($value, callable $interceptor) => $interceptor($value))(...$args);
}
