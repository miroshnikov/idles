<?php

namespace Idles;

/**
 * Calls `$interceptor($value)` then returns the original `$value`.
 * 
 * @template T
 * @param callable(T $value):void $interceptor
 * @param T $value
 * @return T
 * 
 * @phpstan-ignore method.templateTypeNotInParameter 
 */
function tap(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        function (callable $interceptor, $value) {
            $interceptor($value);
            return $value;
        }
    )(...$args);
}
