<?php

namespace Idles;

function gt(...$args)
{
    return curryN(2, 
        function ($a, $b): bool {
            return $a > $b;
        }
    )(...$args);
}