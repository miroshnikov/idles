<?php

namespace Idles;

/**
 * Calls `$tryer`, if it throws, calls `$catcher`.
 * 
 * @template T
 * @param callable(T $value):mixed $tryer
 * @param callable(\Exception $e, T $value):mixed $catcher
 * @param T $value
 * @return mixed
 * 
 * @example ```
 *  tryCatch(fn ($v) => "[$v]", fn ($err, $value) => [$err, $value])('A'); // '[A]'
 *  tryCatch(
 *      fn ($v) => throw new \Exception('Error'),
 *      fn (\Exception $err, $value) => [$err->getMessage(), $value]
 *  )('A'); // ['Error', 'A']
 * ```
 * 
 * @category Function
 * 
 * @see attempt()
 * 
 * @phpstan-ignore method.templateTypeNotInParameter 
 */
function tryCatch(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        function (callable $tryer, callable $catcher, $value) {
            try {
                return $tryer($value);
            } catch (\Exception $e) {
                return $catcher($e, $value);
            }
        }
    )(...$args);
}
