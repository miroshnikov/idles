<?php

namespace Idles;

/**
 * $a - $b
 * 
 * @param number $a
 * @param number $b
 * @return number
 * 
 * @category Math
 */
function subtract(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($a, $b) => $a - $b)(...$args);
}
