<?php

namespace Idles;

/**
 * Returns record containing only `$keys`.
 * 
 * @param array<array-key> $keys
 * @param ?iterable<mixed> $collection
 * @return iterable<mixed>
 * 
 * @example ```
 *   pick(['a', 'd'], ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4]); 
 *   // ['a' => 1, 'd' => 4]
 * ```
 * 
 * @category Record
 * 
 * @see pickBy()
 */
function pick(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (array $keys, ?iterable $collection) => pickBy(fn ($_, $key) => \in_array($key, $keys), $collection)
    )(...$args);
}

/**
 * Returns record containing only keys $predicate returns truthy for.
 * 
 * @param callable(mixed $value, array-key $key):bool $predicate
 * @param ?iterable<mixed> $collection
 * @return iterable<mixed>
 * 
 * @example ```
 *   $isUpperCase = fn ($val, $key) => \strtoupper($key) == $key;
 *   pickBy($isUpperCase, ['a' => 1, 'b' => 2, 'A' => 3, 'B' => 4]);
 *   // ['A' => 3, 'B' => 4]
 * ```
 * 
 * @category Record
 * 
 * @see pick()
 */
function pickBy(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $predicate, ?iterable $collection) => _pickBy($collection, $predicate)
    )(...$args);
}

/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $collection
 * @return iterable<mixed>
 */
function _pickBy(?iterable $collection, callable $predicate): iterable
{   
    if (\is_object($collection) && \is_a($collection, '\Iterator')) {
        return new \CallbackFilterIterator($collection, $predicate);
    }
    return \array_filter(collect($collection), $predicate, \ARRAY_FILTER_USE_BOTH);
}
