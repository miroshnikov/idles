<?php

namespace Idles;

/**
 * $a * $b
 * 
 * @param number $a
 * @param number $b
 * @return number
 * 
 * @category Math
 * 
 * @see add()
 */
function multiply(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($a, $b) => $a * $b)(...$args);
}
