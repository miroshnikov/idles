<?php

namespace Idles;

/**
 * Returns variable if it can be called as a function or throws.
 * 
 * @param mixed $var
 * @return callable
 * @throws InvalidArgumentException if $var is not callable
 */
function c(mixed $var): callable
{
    if (\is_callable($var)) {
        return $var;
    }
    throw new \InvalidArgumentException('Variable '.print_r($var, true).' is not callable');
}