<?php

namespace Idles;

/**
 * Returns the first element `$predicate` returns truthy for.
 * 
 * @param callable(mixed $value, array-key $key, iterable $collection):bool $predicate
 * @param ?iterable $collection
 * @return mixed|null
 * 
 * @category Collection
 * 
 * @see findIndex()
 * @see indexOf()
 */
function find(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $predicate, ?iterable $collection) => _find($collection, $predicate)
    )(...$args);
}

/**
 * Returns the first element `$predicate` returns truthy for starting from `$fromIndex`.
 * 
 * @param callable(mixed $value, array-key $key, iterable $collection):bool $predicate
 * @param int $fromIndex
 * @param ?iterable $collection
 * @return mixed|null
 * 
 * @category Collection
 */
function findFrom(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn (callable $predicate, int $fromIndex, ?iterable $collection) => _find($collection, $predicate, $fromIndex)
    )(...$args);
}


/** 
 * @internal 
 * @ignore
 * @param ?iterable<mixed> $collection
 */
function _find(?iterable $collection, callable $predicate, int $fromIndex = 0): mixed
{
    if (!$collection) {
        return null;
    }
    
    $collection = $fromIndex ? slice($fromIndex, null, $collection) : $collection;
    foreach ($collection as $k => $v) {
        if ($predicate($v, $k, $collection)) {
            return $v;
        }
    }
    return null;   
}
