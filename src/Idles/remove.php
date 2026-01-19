<?php

namespace Idles;

/**
 * Removes items from `$iterable` starting at $start and containing `$count` elements.
 * 
 * @param positive-int $start
 * @param positive-int $count
 * @param ?iterable<mixed> $iterable
 * @return array<mixed>
 * 
 * @example ```
 *   remove(2, 3, [1,2,3,4,5,6,7,8]); // [1,2,6,7,8]
 * ```
 * 
 * @category Collection
 * 
 * @see without()
 */
function remove(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        function (int $start, int $count, ?iterable $iterable): array {
            $a = collect(values($iterable));
            return \array_merge(\array_slice($a, 0, $start), \array_slice($a, $start + $count));
        }
    )(...$args);
}
