<?php

namespace Idles;

function project(...$args)
{
    static $arity = 2;
    return curryN(
        $arity,
        fn (array $props, ?iterable $collection) => map(pick($props), $collection)
    )(...$args);
}