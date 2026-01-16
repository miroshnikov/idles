<?php

namespace Idles;

/**
 * Returns an indexed iterable of values in `$collection`.
 * 
 * @param ?iterable<array-key,mixed> $collection
 * @return iterable<int,mixed>
 * 
 * @example ```
 *  values(['a' => 'AA', 'b' => 'BB']); // ['AA', 'BB']
 * ```
 * 
 * @category Collection
 * 
 * @see keys()
 */
function values(?iterable $collection): iterable
{
    $collection ??= [];

    if (\is_object($collection) && \is_a($collection, '\Iterator')) {
        new Iterators\ValuesIterator($collection);
    }
    return \array_values(collect($collection));
}
