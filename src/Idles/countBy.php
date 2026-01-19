<?php

namespace Idles;

/**
 * Returns an `array<result of $iteratee($value), number of times the $iteratee($value) was found in $collection>`
 *
 * @param callable(mixed $value):array-key $iteratee
 * @param ?iterable $collection
 * @return array<array-key,int>
 * 
 * @example ```
 *   $numbers = [1.0, 1.1, 1.2, 2.0, 3.0, 2.2];
 *   countBy(\floor(...))($numbers);  // [1 => 3, 2 => 2, 3 => 1]
 * ```
 * 
 * @category Array
 * 
 * @see count()
 */
function countBy(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
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
