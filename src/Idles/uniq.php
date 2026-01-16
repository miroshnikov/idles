<?php

namespace Idles;

/**
 * Removes duplicates using `===`. 
 * 
 * @param ?iterable<mixed> $collection
 * @return array<mixed>
 * 
 * @example ```
 *  uniq([1, 1, 2, '1']); // [1, 2, '1']
 * ```
 * 
 * @category Array
 * 
 * @see without()
 */
function uniq(?iterable $collection): array
{
    $res = [];
    foreach ($collection ??= [] as $v) {
        if (\array_search($v, $res, true) === false) {
            \array_push($res, $v);
        }
    }
    return $res;
}
