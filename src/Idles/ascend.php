<?php

namespace Idles;

function ascend(...$args)
{
    static $arity = 3;
    return curryN(3, 
        fn (callable $func, $a, $b) => $func($a) <=> $func($b)
    )(...$args);
}