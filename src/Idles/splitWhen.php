<?php

/**
 * Takes an array and a predicate and returns a pair of arrays with the following properties:
 * - the result of concatenating the two output arrays is equivalent to the input array;
 * - none of the elements of the first output array satisfies the predicate; and
 * - if the second output array is non-empty, its first element satisfies the predicate.
 * 
 * @param callable $predicate that determines where the array is split.
 * 
 * @param array $array
 * 
 * @return array
 */

namespace Idles;

function splitWhen(...$args)
{
    return curryN(2, 
        function (callable $predicate, $array) {
            $array = toArray($array);
            $i = findIndex($predicate, $array);
            return $i >= 0 ? splitAt($i, $array) : [$array, []];
        }
    )(...$args);
}