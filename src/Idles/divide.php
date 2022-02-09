<?php

namespace Idles;

function divide(...$args)
{
    return curryN(2, 
        fn (/*int|float*/ $a, /*int|float*/ $b) => $a / $b,
    )(...$args);
}
