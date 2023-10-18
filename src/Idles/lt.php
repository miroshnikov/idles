<?php

namespace Idles;

function lt(...$args)
{
    return curryN(2, 
        function ($a, $b): bool {
            return $a < $b;
        }
    )(...$args);
}