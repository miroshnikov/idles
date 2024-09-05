<?php

namespace Idles;

function _sortWith(?iterable $collection, callable ...$comparators): array
{
    $collection = collect($collection);
    \usort(
        $collection,
        fn ($a, $b) => \array_reduce($comparators, fn ($res, $f) => $res == 0 ? $f($a, $b) : $res, 0)
    );
    return $collection;
}

function sortWith(...$args)
{
    return curryN(2, 
        fn (array $comparators, ?iterable $collection) => _sortWith($collection, ...$comparators)
    )(...$args);
}