<?php

namespace Idles;

/**
 * Returns $a / $b
 *
 * @param int|float      $a
 * @param int|float      $b
 *
 * @return int|float    $a / $b
 */

function divide(...$args)
{
    static $arity = 2;
    return curryN(
        2,
        fn ($a, $b) => $a / $b,
    )(...$args);
}
