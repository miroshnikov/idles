<?php

namespace Idles;

function applyTo(...$args)
{
    return curryN(2, fn ($value, callable $interceptor) => $interceptor($value))(...$args);
}

function thru(...$args)
{
    return applyTo(...$args);
}
