<?php

namespace Idles;

function add(int ...$args)
{
    static $arity = 2;
    return curryN(2, fn (int $a, int $b) => $a + $b)(...$args);
}
