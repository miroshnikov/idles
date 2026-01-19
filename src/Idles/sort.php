<?php

namespace Idles;

/**
 * Sorts `$collection` using `$comparator` comparison (`$a <=> $b`) function.
 * 
 * @param callable(mixed $a,mixed $b):int $comparator returns -1|0|1
 * @param ?iterable<mixed> $collection
 * @return array<mixed>
 * 
 * @example ```
 *  $diff = fn ($a, $b) => $a - $b;
 *  sort($diff, [4,2,7,5]); // [2, 4, 5, 7]
 * ```
 * 
 * @category Collection
 * 
 * @see sortBy()
 * @see sortWith()
 * @see orderBy()
 */
function sort(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function (callable $comparator, ?iterable $collection) {
            $collection = collect($collection);
            \usort($collection, $comparator);
            return $collection;
        }
    )(...$args);
}
