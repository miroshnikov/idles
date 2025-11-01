<?php

namespace Idles;

function invert(...$args): array
{
    static $arity = 1;
    return curryN($arity, 
        fn (?iterable $collection) => \array_flip(collect($collection))
    )(...$args);
}
