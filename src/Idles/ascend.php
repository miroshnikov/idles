<?php

namespace Idles;

function ascend(...$args)
{
    return curryN(3, 
        fn (callable $func, $a, $b) => $func($a) <=> $func($b)
    )(...$args);
}