<?php

namespace Idles;

function uniqBy(...$args)
{
    return curryN(
        2,
        fn (callable $iteratee, ?iterable $collection): array => 
            uniqWith(fn ($a, $b) => $iteratee($a) === $iteratee($b), $collection)
    )(...$args);
}
