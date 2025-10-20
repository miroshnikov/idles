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
    static $arity = 2;
    return curryN(
        $arity, 
        fn (callable $func, $value) => _iterate($func, $value)
    )(...$args);
}
