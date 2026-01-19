<?php

namespace Idles;

/**
 * Returns fn (...$args) => $fn($args)
 *
 * @param callable $fn
 * @return callable
 * 
 * @example ```
 *  unapply(\json_encode(...))(1,2,3); // '[1,2,3]'
 * ```
 * 
 * @category Function
 * 
 * @see apply()
 */
function unapply(callable $fn)
{
    return fn (...$args) => $fn($args);
}
