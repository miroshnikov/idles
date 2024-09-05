<?php

namespace Idles;

function _sortBy(?iterable $collection, callable ...$iteratees): array
{
    $collection = collect($collection);
    if (empty($collection)) {
        return [];
    }
    $indexes = \range(0, \count($collection)-1);
    $arrays = concat(map(fn ($iteratee) => map($iteratee, $collection), $iteratees), [$indexes]);
    \array_multisort(...$arrays);

    return collect(map(fn ($i) => $collection[$i], last($arrays)));
}

function sortBy(...$args)
{
    return curryN(2, 
        fn (array $iteratees, ?iterable $collection) => _sortBy($collection, ...$iteratees)
    )(...$args);
}
