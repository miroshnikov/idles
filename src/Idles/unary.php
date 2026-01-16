<?php

namespace Idles;

/**
 * `ary(1, $fn)`
 * 
 * @param callable $fn
 * @return callable
 * 
 * @category Function
 * 
 * @see ary()
 */
function unary(callable $fn): callable
{
    return ary(1, $fn);
}
