<?php

namespace Idles;

use \Idles\Iterators\{
    FlattenIteratorIterator,
    MapRecursiveIterator,
    MapRecursiveArrayIterator,
    ValuesIterator
};

/**
 * Maps and flattens.
 * 
 * @param callable(mixed $value, array-key $key, iterable $collection):mixed $iteratee
 * @param ?iterable $collection
 * @return iterable<int,mixed>
 * 
 * @example ```
 *   flatMap(fn ($n) => [$n, $n], [1,2]); // [1, 1, 2, 2]
 * ```
 * 
 * @category Collection
 * 
 * @see flatMapDepth()
 * @see map()
 * @see flatten()
 * 
 * @alias chain
 * 
 * @idles-lazy
 * @idles-reindexed
 */
function flatMap(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $iteratee, ?iterable $collection) => _flatMapDepth($collection, $iteratee, 1)
    )(...$args);
}

/**
 * Maps and flattens the mapped results up to `$depth` times.
 * 
 * @param callable(mixed $value, array-key $key, iterable $collection):mixed $iteratee
 * @param int $depth
 * @param ?iterable $collection
 * @return iterable<int,mixed>
 * 
 * @example ```
 *   flatMapDepth(fn ($n) => [[[$n, $n]]], 2, [1, 2]); // [[1, 1], [2, 2]];
 * ```
 * 
 * @category Collection
 * 
 * @see flatMap()
 * 
 * @idles-lazy
 * @idles-reindexed
 */
function flatMapDepth(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn (callable $iteratee, int $depth, ?iterable $collection) => _flatMapDepth($collection, $iteratee, $depth)
    )(...$args);
}



/** 
 * @internal 
 * @ignore
 * @param ?iterable<mixed> $collection
 * @return iterable<mixed>
 */
function _flatMapDepth(?iterable $collection, callable $iteratee, int $depth): iterable
{
    $collection ??= [];

    if (\is_array($collection)) {
        $it = new FlattenIteratorIterator(new MapRecursiveArrayIterator($collection, $iteratee));
        $it->setMaxDepth($depth);
        return \iterator_to_array(new ValuesIterator($it), false);
    }
    $it = new FlattenIteratorIterator(new MapRecursiveIterator($collection, $iteratee));
    $it->setMaxDepth($depth);
    return new ValuesIterator($it);
}