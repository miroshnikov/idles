<?php

namespace Idles;

/**
 * Calculates the sum of two numbers.
 * 
 * @param int|float $a The first number in an addition. 
 * @param int|float $b The second number in an addition.
 * @return int|float the total
 * 
 * @example 
 *  add(100)(13); // 113
 * 
 * @see sum()
 * @see subtract()
 * 
 * @category Math
 */
function add(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($a, $b) => $a + $b)(...$args);
}
