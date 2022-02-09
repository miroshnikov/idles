<?php

namespace Idles;

function startsWith(...$args)
{
    return curryN(2, 
        fn (string $target, string $s): bool => \strncmp(\mb_substr($s, 0), $target, size($target)) === 0
    )(...$args);
}
