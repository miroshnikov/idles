<?php

namespace Idles;

/**
 * Returns fn (...$args) => $fn($args)
 *
 * @param callable      $fn
 *
 * @return callable
 */

function unapply(...$args)
{
    static $arity = 1;
    return curryN($arity, 
        fn (callable $fn) => fn (...$args) => $fn($args)
    )(...$args);
}
