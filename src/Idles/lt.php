<?php

namespace Idles;

/**
 * $a < $b
 * 
 * @template T of mixed
 * @param T $a
 * @param T $b
 * @return bool
 * 
 * @example ```
 *   lt(100)(13); // false
 * ```
 * 
 * @category Math
 * 
 * @see gt()
 * @see lte()
 * @see gte()
 */
function lt(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($a, $b) => $a < $b)(...$args);
}