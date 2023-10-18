<?php

namespace Idles;

function unless(...$args)
{
    return curryN(
        3,
        fn (callable $predicate, callable $whenFalse, $value) => $predicate($value) ? $value : $whenFalse($value)
    )(...$args);
}