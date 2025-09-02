<?php

/**
 * Splits an array into slices on every occurrence of a value.
 * 
 * @param callable predicate that determines where the array or string is split.
 * 
 * @param array 
 * 
 * @return array
 */

namespace Idles;

function splitWhenever(...$args)
{
    return curryN(2, 
        function (callable $predicate, array $array) {
            $array = toArray($array);
            $parts = [];
            $prev = 0;
            for ($i = 0; $i < \count($array); ++$i) {
                if ($predicate($array[$i]) && $i > $prev) {
                    $parts[] = \array_slice($array, $prev, $i-$prev);
                    $prev = $i+1;
                }
            }
            if ($i > $prev) {
                $parts[] = \array_slice($array, $prev);
            }
            return $parts;
        }
    )(...$args);
}