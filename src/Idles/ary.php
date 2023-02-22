<?php

namespace Idles;

function ary(...$args)
{
    return curryN(
        2,
        fn (int $n, callable $fn) => fn (...$args) => $fn(...take($n, $args))
    )(...$args);
}

function nAry(...$args)
{
    return ary(...$args);
}
