<?php

namespace Idles;

function both(...$args)
{
    static $arity = 2;
    return curryN(
        2,
        fn (callable $f1, callable $f2) => function (...$args) use ($f1, $f2) { 
            $res1 = $f1(...$args);
            return $res1 ? $f2(...$args) : $res1;
        }
    )(...$args);
}