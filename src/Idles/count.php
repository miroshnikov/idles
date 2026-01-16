<?php

namespace Idles;

/**
 * Counts the number of items in `$collection` matching the `$predicate`
 *
 * @param callable(mixed $v):bool $predicates
 * @param ?iterable $collection
 * @return non-negative-int
 * 
 * @example ```
 *   $even = fn ($x) => $x % 2 == 0;
 *   count($even, [1, 2, 3, 4, 5]); // 2
 * ```
 * 
 * @category Array
 * 
 * @see countBy()
 */
function count(mixed ...$args)
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
