<?php

namespace Idles;

/**
 * $a >= $b
 * 
 * @template T of mixed
 * @param T $a
 * @param T $b
 * @return bool
 * 
 * @example ```
 *   gte(13)(13); // true
 * ```
 * 
 * @category Math
 * 
 * @see gt()
 * @see lt()
 * @see lte()
 */
function gte(...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($a, $b) => $a >= $b)(...$args);
}
