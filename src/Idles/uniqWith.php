<?php

namespace Idles;

/**
 * Like `uniq` but uses `$predicate` to compare elements.
 * 
 * @param callable(mixed $a, mixed $b):bool $predicate
 * @param ?iterable<mixed> $collection
 * @return array<mixed>
 * 
 * @example ```
 *  uniqWith(fn ($a, $b) => $a == $b)([1, '1', 2, 1]); // [1, 2]
 * ```
 * 
 * @category Array
 * 
 * @see uniq()
 * 
 * @idles-reindexed
 */
function uniqWith(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        function (callable $predicate, ?iterable $collection): array {
            $res = [];
            foreach ($collection ?? [] as $findVal) {
                if (findIndex(fn ($v) => $predicate($v, $findVal), $res) === -1) {
                    \array_push($res, $findVal);
                }
            }
            return $res;
        }
    )(...$args);
}
