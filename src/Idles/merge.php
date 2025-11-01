<?php

namespace Idles;

function mergeAll(...$args)
{
    static $arity = 1;
    return curryN($arity, 
        fn (array $records) => \array_merge(...\array_map(fn ($record) => collect($record), $records))
    )(...$args);
}

function merge(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (?iterable $record1, ?iterable $record2) => mergeAll([$record1, $record2])
    )(...$args);
}

function mergeDeep(...$args)
{
    static $arity = 1;
    return curryN($arity, 
        fn (array $records) => \array_merge_recursive(...\array_map(fn ($record) => collect($record), $records))
    )(...$args);
}

function mergeRight(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (?iterable $left, ?iterable $right) => merge($left, $right)
    )(...$args);
}

function mergeLeft(...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (?iterable $left, ?iterable $right) => merge($right, $left)
    )(...$args);
}

