<?php

namespace Idles;

function lt(...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($a, $b) => $a < $b)(...$args);
}