<?php

namespace Idles;

function pluck(...$args)
{
    return curryN(
        2,
        fn ($key, ?iterable $collection) => map(prop($key), $collection)
    )(...$args);
}
