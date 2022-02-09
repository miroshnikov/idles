<?php

namespace Idles;

function defaultTo(...$args)
{
    return curryN(2, 
        fn ($default, $value) => $value ?? $default
    )(...$args);
}
