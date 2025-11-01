<?php

namespace Idles;

function lte(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function ($a, $b): bool {
            return $a <= $b;
        }
    )(...$args);
}