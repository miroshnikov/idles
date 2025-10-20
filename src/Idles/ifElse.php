<?php

namespace Idles;

function ifElse(...$args)
{
    static $arity = 3;
    return curryN($arity,
        fn (callable $predicate, callable $onTrue, callable $onFalse) => 
            fn (...$args) => $predicate(...$args) ? $onTrue(...$args) : $onFalse(...$args)
    )(...$args);
}