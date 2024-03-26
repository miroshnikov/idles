<?php

namespace Idles;

function _iterate(callable $func, $value): iterable
{
    while (1) {
        yield $value;
        $value = $func($value);
    }
}

function iterate(...$args)
{
    return curryN(2, fn (callable $func, $value) => _iterate($func, $value))(...$args);
}
