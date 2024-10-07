<?php

namespace Idles;

/**
 * Returns an array: [$iteratee($value) => number of times the $iteratee($value) was found in $collection]
 *
 * @param callable      $iteratee
 * @param ?iterable     $collection
 *
 * @return array
 */

function countBy(...$args)
{
    static $arity = 2;
    return curryN(2, 
        function (callable $iteratee, ?iterable $collection): array {
            $collection ??= [];
            $result = [];
            foreach ($collection as $value) {
                $key = $iteratee($value);
                if (!isset($result[$key])) {
                    $result[$key] = 0;
                }
                $result[$key]++;
            }
            return $result;
        }
    )(...$args);
}
