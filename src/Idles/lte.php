<?php

namespace Idles;

function lte(...$args)
{
    return curryN(2, 
        function ($a, $b): bool {
            return $a <= $b;
        }
    )(...$args);
}