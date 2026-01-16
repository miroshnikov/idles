<?php

namespace Idles;

/**
 * Returns the index of the first element predicate returns truthy for or `-1` if not found.
 * 
 * @param callable(mixed $value, array-key $key, iterable $collection):bool $predicate
 * @param ?iterable $collection
 * @return int
 * 
 * @example ```
 *   findIndex(['b', 'a', 'b', 'c'], fn ($v) => $v == 'b', 1); // 2
 * ```
 * 
 * @category Collection
 */
function findIndex(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $predicate, ?iterable $collection) => _findIndex($collection, $predicate)
    )(...$args);
}

/**
 * Returns the index of the first element `$predicate` returns truthy for starting from `$fromIndex`.
 * 
 * @param callable(mixed $value, array-key $key, iterable $collection):bool $predicate
 * @param int $fromIndex
 * @param ?iterable $collection
 * @return int
 * 
 * @example ```
 *   findIndexFrom(fn ($v) => $v == 'b', -2, ['a','b','a','b','c']) // 3 
 * ```
 * 
 * @category Collection
 */
function findIndexFrom(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn (callable $predicate, int $fromIndex, ?iterable $collection) => _findIndex($collection, $predicate, $fromIndex)
    )(...$args);
}



/** 
 * @internal 
 * @ignore
 * @param ?iterable<mixed> $collection
 */
function _findIndex(?iterable $collection, callable $predicate, int $fromIndex = 0): int
{   
    $size = 0;
    if ($fromIndex < 0) {
        $collection = collect($collection);
        $size = length($collection);
    }

    /** @var iterable<mixed> $items */
    $items = $fromIndex ? slice($fromIndex, null, $collection) : $collection;
    $collection = values($items);
    foreach ($collection as $i => $v) {
        if ($predicate($v, $i, $collection)) {
            return ($fromIndex < 0 ? \max(0, $fromIndex + $size) : $fromIndex) + $i;
        }
    }
    return -1;
}

