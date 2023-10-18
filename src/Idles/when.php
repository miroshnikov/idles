<?php

namespace Idles;

function when(...$args)
{
    return curryN(
        3,
        fn (callable $predicate, callable $whenTrue, $value) => $predicate($value) ? $whenTrue($value) : $value
    )(...$args);
}
