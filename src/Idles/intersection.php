<?php

namespace Idles;

/**
 * Returns unique values that are included in both arrays.
 * 
 * @param ?iterable $array1
 * @param ?iterable $array2
 * @return array<int, mixed>
 * 
 * @category Array
 * 
 * @see intersectionBy() 
 * @see intersectionWith()
 */
function intersection(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (?iterable $array1, ?iterable $array2) => 
            values(
                \array_unique(\array_intersect(collect($array1), collect($array2)), \SORT_REGULAR)
            )
    )(...$args);
}


/**
 * Like `intersection` but invokes `$comparator` to compare elements.
 * 
 * @param callable(mixed $a, mixed $b):int $comparator e.g. $a <=> $b
 * @param ?iterable $array1
 * @param ?iterable $array2
 * @return array<int, mixed>
 * 
 * @category Array
 * 
 * @see intersectionBy()
 * @see intersection()
 */
function intersectionWith(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn (callable $comparator, ?iterable $array1, ?iterable $array2) => 
            values(
                \array_unique(\array_uintersect(collect($array1), collect($array2), $comparator), \SORT_REGULAR)
            )
    )(...$args);
}

/**
 * Like intersection but invokes `$iteratee` for each element before comparison.
 * 
 * @param callable(mixed):mixed $iteratee
 * @param ?iterable $array1
 * @param ?iterable $array2
 * @return array<int, mixed>
 * 
 * @category Array
 * 
 * @see intersection()
 * @see intersectionWith()
 */
function intersectionBy(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn (callable $iteratee, ?iterable $array1, ?iterable $array2) => 
            intersectionWith(fn ($a, $b) => $iteratee($a) <=> $iteratee($b), $array1, $array2)
    )(...$args);
}
