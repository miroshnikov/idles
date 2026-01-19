<?php

namespace Idles;

/**
 * Like `pipe` but invokes the functions from right to left.
 * 
 * @param callable ...$fns
 * @return callable
 * 
 * @example ```
 *  compose('\strtoupper', fn ($s) => 'hello '.$s, '\trim')(' fred '); // 'HELLO FRED'
 * ```
 * 
 * @category Function
 * 
 * @see pipe()
 * 
 * @alias flowRight
 */
function compose(callable ...$fns): callable
{
    return pipe(...\array_reverse($fns));
}
