<?php

namespace Idles;

/**
 * Converts a record into an array of `[$key, $value]`.
 * 
 * @param ?iterable<mixed> $record
 * @return iterable<array{array-key, mixed}>
 * 
 * @example ```
 *  toPairs(['a' => 1, 'b' => 2, 'c' => 3]); // [['a', 1], ['b', 2], ['c', 3]]
 * ```
 * 
 * @category Record
 * 
 * @alias entries
 * 
 * @idles-lazy
 * @idles-reindexed
 */
function toPairs(?iterable $record): iterable
{
    $record ??= [];

    if (\is_object($record) && \is_a($record, '\Iterator')) {
        return new Iterators\ValuesIterator(new Iterators\MapRecursiveIterator($record, fn ($v, $k) => [$k, $v]));
    }

    $pairs = [];
    $array = collect($record);
    \array_walk($array, function ($v, $k) use (&$pairs) { $pairs[] = [$k, $v]; });
    return $pairs;
}
