<?php

namespace Idles;

/**
 * Returns the index of the last element predicate returns truthy for, -1 if not found.
 * 
 * @param callable(mixed $value, array-key $key, iterable $collection):bool $predicate
 * @param ?iterable $collection
 * @return int
 * 
 * @example ```
 *   findLastIndexFrom(fn ($v) => $v == 'b', 2, ['a', 'b', 'a', 'b']); // 1
 * ```
 * 
 * @category Collection
 */
function findLastIndex(mixed ...$args)
{
    static $arity = 2;
    return curryN(
        $arity,
        fn (callable $predicate, ?iterable $collection) => _findLastIndex($collection, $predicate)
    )(...$args);
}

/**
 * Returns the index of the last element `$predicate` returns truthy for starting from `$fromIndex`.
 * 
 * @param callable(mixed $value, array-key $key, iterable $collection):bool $predicate
 * @param int $fromIndex
 * @param ?iterable $collection
 * @return int
 * 
 * @category Collection
 */
function findLastIndexFrom(mixed ...$args)
{
    static $arity = 3;
    return curryN(
        $arity,
        fn (callable $predicate, int $fromIndex, ?iterable $collection) =>
            _findLastIndex($collection, $predicate, $fromIndex)
    )(...$args);
}

/** 
 * @internal 
 * @ignore
 * @param ?iterable<mixed> $collection
 */
function _findLastIndex(?iterable $collection, callable $predicate, ?int $fromIndex = null): int
{
    $a = collect($collection);
    $size = length($a);
    $fromIndex ??= $size;
    $from = $fromIndex < 0 ? \max(0, $size + $fromIndex) : \min($fromIndex, $size - 1);
    for ($i = $from; $i >= 0; --$i) {
        if ($predicate($a[$i], $i, $a)) {
            return $i;
        }
    }
    return -1;
}