<?php

namespace Idles;

function assignAll(...$args)
{
    return curryN(1, 
        fn (array $records) => \array_replace(...\array_map(fn ($r) => collect($r), $records))
    )(...$args);
}

function extendAll(...$args)
{
    return assignAll(...$args);
}

function assign(...$args)
{
    static $arity = 2;
    return curryN(2, 
        fn (?iterable $record1, ?iterable $record2) => assignAll([$record1, $record2])
    )(...$args);
}

function extend(...$args)
{
    static $arity = 2;
    return assign(...$args);
}



function assignDeep(...$args)
{
    return curryN(1, 
        fn (array $iterables) => \array_replace_recursive(...\array_map(fn ($r) => collect($r), $iterables))
    )(...$args);
}

function extendDeep(...$args)
{
    return assignDeep(...$args);
}
