<?php

namespace Idles;

function descend(...$args)
{
    return curryN(3, 
        fn (callable $func, $a, $b) => $func($b) <=> $func($a)
    )(...$args);
}