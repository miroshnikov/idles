<?php

namespace Idles;

/**
 * Like `pipe` but invokes the functions from right to left.
 * 
 * @param callable ...$fns
 * @return callable
 * 
 * @alias flowRight
 * 
 * @category Function
 */
function compose(callable ...$fns): callable
{
    return pipe(...\array_reverse($fns));
}
