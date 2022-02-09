<?php

namespace Idles;

function _pickBy(?iterable $collection, callable $predicate): iterable
{
    $collection ??= [];
    
    if (\is_array($collection)) {
        return \array_filter($collection, $predicate, \ARRAY_FILTER_USE_BOTH);
    }
    return new \CallbackFilterIterator($collection, $predicate);
}

function pickBy(...$args)
{
    return curryN(2, 
        fn (callable $predicate, ?iterable $collection) => _pickBy($collection, $predicate)
    )(...$args);
}

function pick(...$args)
{
    return curryN(2, 
        fn (array $keys, ?iterable $collection) => pickBy(fn ($_, $key) => \in_array($key, $keys), $collection)
    )(...$args);
}
