<?php

namespace Idles;

/**
 * Gets the last element of iterable.
 * 
 * @param ?iterable<mixed> $collecton
 * @return mixed
 * 
 * @example ```
 *   last([1, 2, 3]);  // 3
 * ```
 * 
 * @category Array
 * 
 * @see first()
 */
function last(?iterable $collecton): mixed
{
    if (\is_array($collecton)) {
        $k = \array_key_last($collecton);
        return $k !== null ? $collecton[$k] : null;
    }
    $last = null;
    if ($collecton) {
        foreach ($collecton as $value) {
            $last = $value;
        }    
    }
    return $last;
}