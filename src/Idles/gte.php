<?php

namespace Idles;

function gte(...$args)
{
    return curryN(2, 
        function ($a, $b): bool {
            return $a >= $b;
        }
    )(...$args);
}