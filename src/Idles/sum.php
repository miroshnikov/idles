<?php

namespace Idles;

/**
 * Sums elements in $collection
 *
 * @param ?iterable<mixed> $collection
 * @return int|float
 * 
 * @example ```
 *  sum([4, 2, 8, 6]); // 20
 * ```
 * 
 * @category Math
 * 
 * @see sumBy()
 */
function sum(?iterable $collection): int|float
{
    return sumBy(identity(...), $collection);
}
