<?php

namespace Idles;

function descend(...$args)
{
    static $arity = 3;
    return curryN(3, 
        fn (callable $func, $a, $b) => $func($b) <=> $func($a)
    )(...$args);
}