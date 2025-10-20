<?php

namespace Idles;

function equals(...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($a, $b) => $a === $b)(...$args);
}

function isEqual(...$args)
{
    static $arity = 2;
    return equals(...$args);
}
