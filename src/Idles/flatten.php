<?php

namespace Idles;

use \Idles\Iterators\{
    FlattenIteratorIterator,
    FlattenIterator,
    ValuesIterator
};

function _flattenDepth(?iterable $collection, int $depth): iterable
{
    if (!$collection) {
        return [];
    }

    if (\is_array($collection)) {
        $it = new FlattenIteratorIterator(new \RecursiveArrayIterator($collection));
        $it->setMaxDepth($depth);
        return \iterator_to_array(new ValuesIterator($it), false);
    }
    $it = new FlattenIteratorIterator(new FlattenIterator($collection));
    $it->setMaxDepth($depth);
    return new ValuesIterator($it);
}

function flatten(...$args)
{
    return curryN(1, 
        fn (?iterable $collection) => _flattenDepth($collection, 1)
    )(...$args);
}

function unnest(...$args)
{
    return flatten(...$args);
}

function flattenDeep(...$args)
{
    static $arity = 1;
    return curryN(
        $arity,
        fn (?iterable $collection) => _flattenDepth($collection, \PHP_INT_MAX)
    )(...$args);
}

function flattenDepth(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (int $depth, ?iterable $collection) => _flattenDepth($collection, $depth)
    )(...$args);
}
