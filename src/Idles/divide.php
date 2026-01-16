<?php

namespace Idles;

/**
 * Returns $a / $b
 *
 * @param int|float $a
 * @param int|float $b
 * @return int|float $a / $b
 * 
 * @category Math
 * 
 * @see modulo()
 */
function divide(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($a, $b) => $a / $b)(...$args);
}
