<?php

namespace Idles;

/**
 * $a > $b
 * 
 * @template T of mixed
 * @param T $a
 * @param T $b
 * @return bool
 * 
 * @example ```
 *   gt(100)(13); // true
 * ```
 * 
 * @category Math
 * 
 * @see gte()
 * @see lt()
 * @see lte()
 */
function gt(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($a, $b) => $a > $b)(...$args);
}