<?php

namespace Idles;

/**
 * Counts the number of items in $collection matching the $predicate
 *
 * @param callable      $predicate
 * @param ?iterable     $collection
 *
 * @return int
 */

function count(...$args)
{
    static $arity = 2;
    return curryN(2, 
        function (callable $predicate, ?iterable $collection): int {
            $collection ??= [];
            $count = 0;
            foreach ($collection as $value) {
                $count += !!$predicate($value);
            }
            return $count;
        }
    )(...$args);
}
