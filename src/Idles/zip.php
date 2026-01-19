<?php

namespace Idles;

/**
 * Creates a new iterable out of the two supplied by pairing up equally-positioned items from both iterables.
 * 
 * @param iterable<mixed> $a
 * @param iterable<mixed> $b
 * @return iterable<array{mixed,mixed}>
 * 
 * @example ```
 *  $a =  ['a', 'b' ];
 *  $aa = ['AA','BB'];
 *  zip($a, $aa);  // [ ['a', 'AA'], ['b', 'BB'] ]
 * ```
 * 
 * @category Array
 * 
 * @see zipWith()
 * 
 * @idles-lazy
 * @idles-reindexed
 */
function zip(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (iterable $a, iterable $b) => _zipWith(fn (...$values) => $values, $a, $b)
    )(...$args);
}

/**
 * Same as `zip` but for many iterables.
 * 
 * @param array<array<mixed>> $iterables
 * @return iterable<array<mixed>>
 * 
 * @category Array
 */
function zipAll(array $iterables)
{
    return _zipWith(fn (...$values) => $values, ...$iterables);
}

