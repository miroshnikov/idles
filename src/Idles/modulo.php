<?php

namespace Idles;

/**
 * $a % $b
 * 
 * @param number $a
 * @param number $b
 * @return number
 * 
 * @category Math
 * 
 * @see divide()
 */
function modulo(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($a, $b) => $b % $a)(...$args);
}
