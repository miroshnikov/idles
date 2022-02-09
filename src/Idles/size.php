<?php

namespace Idles;

function size(/*array|Countable|object|string|callable*/ $value): int
{
    if (\is_iterable($value)) {
        return \count($value);
    }

    if (\is_callable($value)) {
        return (new \ReflectionFunction($value))->getNumberOfParameters();
    }

    if (\is_object($value)) {
        return \count(\get_object_vars($value));
    }

    if (\is_string($value)) {
        return \mb_strlen($value);
    }

    return \is_null($value) ? 0 : 1;
}

function length(...$args)
{
    return size(...$args);
}
