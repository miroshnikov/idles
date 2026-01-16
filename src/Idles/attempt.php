<?php

namespace Idles;

/**
 * Calls `$fn`, returning either the result or the caught exception.
 * 
 * @param callable $fn
 * @param array<mixed> $args
 * @return mixed|\Exception
 * 
 * @example ```
 *   attempt(fn () => 'A'); // A
 *   attempt(fn () => throw new \Exception('Error')); // Exception('Error')
 * ```
 * 
 * @category Function
 * 
 * @see tryCatch()
 */
function attempt(callable $fn, array $args = [])
{
    try {
        return $fn(...$args);
    } catch (\Exception $e) {
        return $e;
    }
}
