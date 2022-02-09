<?php

namespace Idles;

function invert(...$args): array
{
    return curryN(1, 
        fn (?iterable $collection) => \array_flip(collect($collection))
    )(...$args);
}
