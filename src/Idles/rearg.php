<?php

namespace Idles;

function rearg(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (array $indexes, callable $f) => fn (...$args) => $f(...props($indexes, $args))
    )(...$args);
}