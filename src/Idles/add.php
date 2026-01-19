<?php

namespace Idles;

/**
 * Calculates the sum of two numbers.
 * 
 * @param number $a The first number in an addition. 
 * @param number $b The second number in an addition.
 * @return number the total
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
