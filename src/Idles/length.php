<?php

namespace Idles;

/**
 * Returns size of a countable, number of parameters of a function, lenght of string or number of properties of an object.
 * 
 * @param array<mixed>|object|string|callable $value
 * @return int
 * 
 * @category Util
 * 
 * @alias size
 */
function length(array|object|string|callable $value): int
{
    if (\is_array($value) || \is_countable($value)) {
        return \count($value);
    }

    if (\is_callable($value)) {
        return arity($value);
    }

    if (\is_object($value)) {
        return \count(\get_object_vars($value));
    }

    if (\is_string($value)) {
        return \mb_strlen($value);
    }

    return \is_null($value) ? 0 : 1;
}
