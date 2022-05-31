<?php

namespace Idles;

function mergeAll(...$args)
{
    return curryN(1, 
        fn (array $records) => \array_merge(...\array_map(fn ($record) => collect($record), $records))
    )(...$args);
}

function merge(...$args)
{
    return curryN(2, 
        fn (?iterable $record1, ?iterable $record2) => mergeAll([$record1, $record2])
    )(...$args);
}

function mergeDeep(...$args)
{
    return curryN(1, 
        fn (array $records) => \array_merge_recursive(...\array_map(fn ($record) => collect($record), $records))
    )(...$args);
}

function mergeRight(...$args)
{
    return curryN(2, 
        fn (?iterable $left, ?iterable $right) => merge($left, $right)
    )(...$args);
}

function mergeLeft(...$args)
{
    return curryN(2, 
        fn (?iterable $left, ?iterable $right) => merge($right, $left)
    )(...$args);
}

