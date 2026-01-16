<?php

namespace Idles;

/**
 * $a - $b
 * 
 * @param int $a
 * @param int $b
 * @return int
 * 
 * @category Math
 */
function subtract(int ...$args)
{
    static $arity = 2;
    return curryN($arity, fn (int $a, int $b) => $a - $b)(...$args);
}
