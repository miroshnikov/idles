<?php

namespace Idles;

/**
 * Creates a new record from a list key-value pairs. The inverse of `toPairs`.
 * 
 * @param ?iterable<array{array-key,mixed}> $collection
 * @return array<array-key,mixed>
 * 
 * @example ```
 *   fromPairs([['a', 1], ['b', 2], ['a', 3]]); // ['a' => 3, 'b' => 2]
 * ```
 * 
 * @category Array
 * 
 * @see toPairs()
 */
function fromPairs(?iterable $collection): array
{
    $collection ??= [];
    $res = [];
    foreach ($collection as $entry) {
        if (\is_array($entry) && !empty($entry)) {
            $res[$entry[0]] = \count($entry) > 1 ? $entry[1] : null;
        }
    }
    return $res;
}