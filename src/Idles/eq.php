<?php

namespace Idles;

function eq(...$args)
{
    return curryN(2, 
        fn ($value, $other) => $value == $other
    )(...$args);
}

function identical(...$args)
{
    return eq(...$args);
}
