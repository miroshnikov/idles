<?php

namespace Idles;

/**
 * Splits an array by predicate.
 * 
 * @param callable(mixed $value, array-key $key, iterable $collection):bool $predicate
 * @param iterable<mixed> $iterable
 * @return array<mixed>
 * 
 * @example ```
 *  splitWhen(equals(2), [1, 2, 3, 1, 2, 3]); // [[1], [2, 3, 1, 2, 3]]
 * ```
 * 
 * @category Array
 * 
 * @see slice()
 */
function splitWhen(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function (callable $predicate, iterable $iterable) {
            $array = collect($iterable);
            $i = findIndex($predicate, $array);
            return $i >= 0 ? splitAt($i, $array) : [$array, []];
        }
    )(...$args);
}