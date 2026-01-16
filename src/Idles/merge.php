<?php

namespace Idles;

/**
 * Merges properties, numeric keys are __replaced__.
 * 
 * @param array<iterable<mixed>> $iterables
 * @return array<mixed>
 * 
 * @category Record
 * 
 * @see concat
 * 
 * @alias asign
 * @alias extend
 */
function mergeAll(mixed ...$args)
{
    static $arity = 1;
    return curryN($arity, 
        fn (array $records) => \array_replace(...\array_map(fn ($record) => collect($record), $records))
    )(...$args);
}

/**
 * Merges properties, numeric keys are __replaced__.
 * 
 * @param ?iterable $left
 * @param ?iterable $right
 * @return array<mixed>
 * 
 * @example ```
 *   merge(['a', 'c' => 'C'], ['b', 'd' => 'D']); // ['b', 'c' => 'C', 'd' => 'D']
 * ```
 * 
 * @category Record
 */
function merge(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (?iterable $l, ?iterable $r) => mergeAll([$l, $r])
    )(...$args);
}

/**
 * Merges properties recursively, numeric keys are __replaced__.
 * 
 * @param ?iterable $left
 * @param ?iterable $right
 * @return array<mixed>
 * 
 * @example ```
 *   $a = ['a' => ['b' => 1, 'c' => 'C'], ['e' => 'E'], 'x'];
 *   $b = ['a' => ['b' => 2, 'd' => 'D'], ['f' => 'F'], 'y'];
 *   mergeDeep([$a, $b]);
 *   // ['a' => ['b' => [1, 2], 'c' => 'C', 'd' => 'D'], ['e' => 'E'], 'x', ['f' => 'F'], 'y'],
 * ```
 * 
 * @category Record
 */
function mergeDeep(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (?iterable $l, ?iterable $r) => 
            \array_replace_recursive(...\array_map(fn ($record) => collect($record), [$l, $r]))
    )(...$args);
}
