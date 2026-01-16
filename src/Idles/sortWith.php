<?php

namespace Idles;

/**
 * Sorts a `$collection` according to an array of comparison (`$a <=> $b`) functions.
 * 
 * @param array<callable(mixed $a, mixed $b):int> $comparators
 * @param ?iterable<mixed> $collection
 * @return array<mixed>
 * 
 * @example ```
 *  $people = [
 *      [ 'name' => 'clara', 'age' => 40],
 *      [ 'name' => 'bob',   'age' => 30],
 *      [ 'name' => 'alice', 'age' => 40],
 *  ];
 *  sortWith(
 *      [ descend(prop('age')), ascend(prop('name')) ],
 *      $people
 *  ); 
 *  // alice, clara, bob
 * ```
 * 
 * @category Collection
 * 
 * @see sort()
 * @see sortBy()
 * @see orderBy()
 */
function sortWith(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (array $comparators, ?iterable $collection) => _sortWith($collection, ...$comparators)
    )(...$args);
}


/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $collection
 * @return array<mixed>
 */
function _sortWith(?iterable $collection, callable ...$comparators)
{
    $collection = collect($collection);
    \usort(
        $collection,
        fn ($a, $b) => \array_reduce($comparators, fn ($res, $f) => $res == 0 ? $f($a, $b) : $res, 0)
    );
    return $collection;
}