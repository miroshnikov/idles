<?php

namespace Idles;

function eq(...$args)
{
    return curryN(2, fn ($a, $b) => $a == $b)(...$args);
}

function identical(...$args)
{
    return eq(...$args);
}
