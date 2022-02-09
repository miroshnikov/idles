<?php

namespace Idles;

function tap(...$args)
{
    return curryN(2, 
        function (callable $interceptor, $value) {
            $interceptor($value);
            return $value;
        }
    )(...$args);
}
