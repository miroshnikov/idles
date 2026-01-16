<?php

namespace Idles;

use \Idles\Iterators\{
    FlattenIteratorIterator,
    FlattenIterator,
    ValuesIterator
};

/**
 * Flattens iterable a single level deep.
 * 
 * @param ?iterable $collection
 * @return iterable<int,mixed>
 * 
 * @example ```
 *  flatten(['a' => 'A', ['b' => 'B'], 'c' => 'C']);  // ['A', 'B', 'C']
 * ```
 * 
 * @category Array
 * 
 * @see flattenDepth()
 * 
 * @alias unnest
 */
function flatten(mixed ...$args)
{
    static $arity = 1;
    return curryN($arity, 
        fn (?iterable $collection) => _flattenDepth($collection, 1)
    )(...$args);
}

/**
 * Recursively flatten array up to `$depth` times.
 * 
 * @param int $depth
 * @param ?iterable $collection
 * @return iterable<int,mixed>
 * 
 * @category Array
 * 
 * @see flatten()
 */
function flattenDepth(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (int $depth, ?iterable $collection) => _flattenDepth($collection, $depth)
    )(...$args);
}



/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $collection
 * @return iterable<mixed>
 */
function _flattenDepth(?iterable $collection, int $depth): iterable
{
    if (!$collection) {
        return [];
    }

    if (\is_array($collection)) {
        $it = new FlattenIteratorIterator(new \RecursiveArrayIterator($collection));
        $it->setMaxDepth($depth);
        return \iterator_to_array(new ValuesIterator($it), false);
    }
    $it = new FlattenIteratorIterator(new FlattenIterator($collection));
    $it->setMaxDepth($depth);
    return new ValuesIterator($it);
}