<?php

namespace Idles;

/**
 * Creates an array composed of keys generated from running each value through `$iteratee`.
 * 
 * @param callable(mixed $value):mixed $iteratee 
 * @param ?iterable<mixed> $collection
 * @return array<array-key,array<mixed>>
 * 
 * @example ```
 *  groupBy('strlen')(['one', 'two', 'three']); // [ '3' => ['one', 'two'], '5' => ['three'] ]
 * ```
 * 
 * @category Collection
 * 
 * @see partition()
 */
function groupBy(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $iteratee, ?iterable $collection) => _groupBy($collection, $iteratee)
    )(...$args);
}


/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $collection
 * @return array<mixed>
 */
function _groupBy(?iterable $collection, callable $iteratee): array
{
    $collection ??= [];
    $res = [];
    foreach ($collection as $value) {
        $res[(string)$iteratee($value)][] = $value;
    }
    return $res;
}
