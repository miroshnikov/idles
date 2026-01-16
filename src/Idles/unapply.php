<?php

namespace Idles;

/**
 * Returns fn (...$args) => $fn($args)
 *
 * @param callable $fn
 * @return callable
 * 
 * @category Function
 * 
 * @see apply()
 */
function unapply(callable $fn)
{
    return fn (...$args) => $fn($args);
}
