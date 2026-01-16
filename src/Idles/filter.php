<?php

namespace Idles;

/**
 * Returns elements `$predicate` returns truthy for.
 * 
 * @param callable(mixed $value, array-key $key, iterable $collection):bool $predicate 
 * @param ?iterable $collection
 * @return iterable<int,mixed>
 * 
 * @category Collection
 * 
 * @see without()
 */
function filter(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function (callable $predicate, ?iterable $collection): iterable  {
            $collection ??= [];
            if (\is_array($collection)) {
                return \array_values(\array_filter($collection, partialRight($predicate, [$collection]), \ARRAY_FILTER_USE_BOTH));
            }
            return new Iterators\ValuesIterator(new \CallbackFilterIterator($collection, $predicate));
        }
    )(...$args);
}
