<?php

namespace Idles;

/**
 * Reduces `$collection` to a value which is the accumulated result of running each element in collection through `$iteratee`.
 *
 * @param callable(mixed $accumulator, mixed $value, array-key $key, iterable $collection):mixed $iteratee
 * @param mixed $accumulator
 * @param ?iterable<mixed> $collection
 * @return mixed
 * 
 * @example ```
 *   reduce(ary(2, subtract(...)), 0, [1, 2, 3, 4]); // -10
 * ```
 * 
 * @category Collection
 * 
 * @see reduceRight()
 */
function reduce(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity,
        fn (callable $iteratee, $accumulator, ?iterable $collection) => _reduce($collection, $iteratee, $accumulator)
    )(...$args);
}

/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $collection
 * @param mixed $accumulator
 * @return mixed
 */
function _reduce(?iterable $collection, callable $iteratee, $accumulator = null)
{
    $collection ??= [];
    $first = true;
    foreach ($collection as $key => $value) {
        $accumulator = (\is_null($accumulator) && $first) ? $value : $iteratee($accumulator, $value, $key, $collection);
        $first = false;
    }
    return $accumulator;
}
