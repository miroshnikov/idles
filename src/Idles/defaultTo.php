<?php

namespace Idles;

function defaultTo(...$args)
{
    static $arity = 2;
    return curryN(2, 
        fn ($default, $value) => $value ?? $default
    )(...$args);
}
