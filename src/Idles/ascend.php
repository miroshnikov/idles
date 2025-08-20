<?php

namespace Idles;

function ascend(...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn (callable $func, $a, $b) => $func($a) <=> $func($b)
    )(...$args);
}