<?php

namespace Idles;

function ary(...$args)
{
    static $arity = 2;
    return curryN(
        2,
        fn (int $n, callable $fn) => fn (...$args) => $fn(...take($n, $args))
    )(...$args);
}

function nAry(...$args)
{
    static $arity = 2;
    return ary(...$args);
}
