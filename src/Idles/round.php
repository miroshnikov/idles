<?php

namespace Idles;

/**
 * Rounds $number to specified $precision
 * 
 * @param int $precision
 * @param int|float $number
 * @return float
 * 
 * @category Math
 */
function round(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (int $precision, $number): float => \round($number, $precision),
    )(...$args);
}
