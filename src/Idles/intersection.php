<?php

namespace Idles;

function intersection(...$args)
{
    return curryN(2, 
        fn (?iterable $record1, ?iterable $record2) => 
            values(\array_unique(\array_intersect(collect($record1), collect($record2))), \SORT_REGULAR)
    )(...$args);
}

function intersectionWith(...$args)
{
    return curryN(3, 
        fn (callable $comparator, ?iterable $record1, ?iterable $record2) => 
            values(\array_unique(\array_uintersect(collect($record1), collect($record2), $comparator)), \SORT_REGULAR)
    )(...$args);
}

function intersectionBy(...$args)
{
    return curryN(3, 
        fn (callable $iteratee, ?iterable $record1, ?iterable $record2) => 
            intersectionWith(fn ($a, $b) => $iteratee($a) <=> $iteratee($b), $record1, $record2)
    )(...$args);
}
