<?php

namespace Idles;

/**
 * Returns elements `$predicate` returns truthy for.
 * 
 * @param callable(mixed $value, array-key $key, iterable $collection):bool $predicate 
 * @param ?iterable $collection
 * @return iterable<int,mixed>
 * 
 * @example ```
 *  filter('is_numeric', ['a', 'b', 13]); // [13]
 * ```
 * 
 * @category Collection
 * 
 * @see without()
 * 
 * @idles-lazy
 * @idles-reindexed
 */
function filter(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function (callable $predicate, ?iterable $collection): iterable  {
            $collection ??= [];

            if (\is_object($collection) && \is_a($collection, '\Iterator')) {
                return new Iterators\ValuesIterator(new \CallbackFilterIterator($collection, $predicate));
            }

            return \array_values(
                \array_filter(collect($collection), partialRight($predicate, [$collection]), \ARRAY_FILTER_USE_BOTH)
            );
        }
    )(...$args);
}
