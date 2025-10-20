<?php

namespace Idles;

function intersection(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (?iterable $record1, ?iterable $record2) => 
            values(\array_unique(\array_intersect(collect($record1), collect($record2))), \SORT_REGULAR)
    )(...$args);
}

function intersectionWith(...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn (callable $comparator, ?iterable $record1, ?iterable $record2) => 
            values(\array_unique(\array_uintersect(collect($record1), collect($record2), $comparator)), \SORT_REGULAR)
    )(...$args);
}

function intersectionBy(...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn (callable $iteratee, ?iterable $record1, ?iterable $record2) => 
            intersectionWith(fn ($a, $b) => $iteratee($a) <=> $iteratee($b), $record1, $record2)
    )(...$args);
}
