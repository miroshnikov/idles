<?php

namespace Idles;

/**
 * Split `$collection` into two groups, the first of which contains elements `$predicate` returns truthy for, the second of which contains elements `$predicate` returns falsey for.
 * 
 * @param callable(mixed $value):bool $predicate
 * @param ?iterable<mixed> $collection
 * @return array{array<mixed>,array<mixed>}
 * 
 * @example ```
 *   partition(
 *       fn ($v) => stripos($v, 'A') !== false, 
 *       ['a' => 'AA', 'b' => 'BB', 'c' => 'AAA']
 *   ); 
 *   // [['a' => 'AA', 'c' => 'AAA'], ['b' => 'BB']]
 * ```
 * 
 * @category Collection
 * 
 * @see filter()
 * @see juxt()
 */
function partition(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        function (callable $predicate, ?iterable $collection): array {
            $res = [[],[]];
            $collection ??= [];
            foreach ($collection as $key => $value) {
                $res[$predicate($value) ? 0 : 1][$key] = $value;
            }
            return $res;
        }
    )(...$args);
}
