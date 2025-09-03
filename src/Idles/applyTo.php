<?php

namespace Idles;

function applyTo(...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($value, callable $interceptor) => $interceptor($value))(...$args);
}

function thru(...$args)
{
    static $arity = 2;
    return applyTo(...$args);
}
