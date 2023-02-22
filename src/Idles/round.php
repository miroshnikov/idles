<?php

namespace Idles;

function round(...$args)
{
    return curryN(
        2,
        fn (int $precision, /*int|float*/ $number): float => \round($number, $precision),
    )(...$args);
}
