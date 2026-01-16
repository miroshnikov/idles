<?php

namespace Idles;

/**
 * Returns a function that always returns the given value.
 * 
 * @template T
 * @param T $value
 * @return callable():T
 * 
 * @category Function
 * 
 * @alias constant
 */
function always($value)
{
    return fn () => $value;
}
