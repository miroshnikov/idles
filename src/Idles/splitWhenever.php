<?php

namespace Idles;

/**
 * Splits an array into slices on every occurrence of a value.
 * 
 * @param callable(mixed $value):bool $predicate that determines where the array is split
 * @param ?iterable<mixed> $iterable
 * @return array<mixed>
 * 
 * @example ```
 *  splitWhenever(equals(2), [1, 2, 3, 2, 4, 5, 2, 6, 7]); // [[1], [3], [4, 5], [6, 7]]
 * ```
 * 
 * @category Array
 * 
 * @see slice()
 */
function splitWhenever(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function (callable $predicate, iterable $iterable) {
            $array = collect($iterable);
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