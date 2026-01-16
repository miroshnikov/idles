<?php

namespace Idles;

/**
 * Gets the first element of `$collecton`.
 * 
 * @param ?iterable<mixed> $collecton
 * @return mixed
 * 
 * @example ```
 *  head([1, 2, 3]); // 1
 * ```
 * 
 * @category Array
 * 
 * @alias first
 * 
 * @see last()
 * @see slice()
 */
function head(?iterable $collecton)
{
    if ($collecton) {
        foreach ($collecton as $first) {
            return $first;
        }
    }
    return null;
}
