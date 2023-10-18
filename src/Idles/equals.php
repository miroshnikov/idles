<?php

namespace Idles;

function equals(...$args)
{
    return curryN(2, fn ($a, $b) => $a === $b)(...$args);
}

function isEqual(...$args)
{
    return equals(...$args);
}
