<?php

namespace Idles;

function tryCatch(...$args)
{
    return curryN(3, 
        function (callable $tryer, callable $catcher, $value) {
            try {
                return $tryer($value);
            } catch (\Exception $e) {
                return $catcher($e, $value);
            }
        }
    )(...$args);
}
