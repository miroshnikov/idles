<?php

namespace Idles;

/**
 * Iterates over elements of `$collection`. Iteratee may exit iteration early by returning `false`.
 * 
 * @param ?callable(mixed $value, array-key $key, iterable $collection):bool $iteratee
 * @param ?iterable $collection
 * @return iterable<mixed>|null the original collection
 * 
 * @category Collection
 * 
 * @see eachRight()
 * 
 * @alias foreach
 */
function each(mixed ...$args)
{
    static $arity = 2;
    return curryN(
        $arity,
        function (?callable $iteratee, ?iterable $collection) {
            $iteratee = $iteratee ?? fn ($v) => $v;
            foreach (($collection ?? []) as $key => $value) {
                if ($iteratee($value, $key, $collection) === false) {
                    return $collection;
                }
            }
            return $collection;
        }
    )(...$args);
}
