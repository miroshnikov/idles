<?php

namespace Idles;

function modulo(...$args)
{
    return curryN(
        2,
        fn (/*int|float*/ $a, /*int|float*/ $b) => $b % $a,
    )(...$args);
}
