<?php

namespace Idles;

function add(int ...$args)
{
    return curryN(2, fn (int $a, int $b) => $a + $b)(...$args);
}
