<?php

namespace Idles;

/**
 * Sums elements, $iteratee is invoked for each element in $collection to generate the value to be summed.
 *
 * @param callable(mixed $value):int|float $iteratee
 * @param ?iterable<mixed> $collection
 * @return int|float
 * 
 * @example ```
 *  $ns = [[ 'n'=> 4 ], [ 'n'=> 2 ], [ 'n'=> 8 ], [ 'n'=> 6 ]];
 *  sumBy(property('n'), $ns); // 20
 * ```
 * 
 * @category Math
 */
function sumBy(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($iteratee, $collection) => _sumBy($collection, $iteratee))(...$args);
}


/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $collection
 * @return int|float
 */
function _sumBy(?iterable $collection, callable $iteratee)
{
    $collection ??= [];
    $sum = 0;
    foreach ($collection as $n) {
        $sum += $iteratee($n);
    }
    return $sum;
}