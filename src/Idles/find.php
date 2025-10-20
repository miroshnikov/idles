<?php

namespace Idles;

function _find(?iterable $collection, callable $predicate, int $fromIndex = 0)
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

function find(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $predicate, ?iterable $collection) => _find($collection, $predicate)
    )(...$args);
}

function findFrom(...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn (callable $predicate, int $fromIndex, ?iterable $collection) => _find($collection, $predicate, $fromIndex)
    )(...$args);
}
