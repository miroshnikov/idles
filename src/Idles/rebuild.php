<?php

namespace Idles;

/**
 * Transforms an object into a new one, applying to every key-value pair a function creating zero, one, or many new key-value pairs, and combining the results into a single object.
 * 
 * @param callable(array-key $key, mixed $value): array<array{array-key, mixed}> $convert
 * @param ?iterable $collection
 * @return \Closure|iterable<array-key,mixed>
 * 
 * @example ```
 *  rebuild(
 *    fn ($k, $v) => [[toUpper($k), $v * $v]],
 *    ['a' => 1, 'b' => 2, 'c' => 3]
 *  ); // ['A' => 1, 'B' => 4, 'C' => 9]
 * ```
 * 
 * @category Record
 * 
 * @see mapKeys()
 * @see renameKeys()
 * @see map()
 */
function rebuild(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        function (callable $convert, ?iterable $record) {
            $res = [];
            foreach (collect($record) as $k => $v) {
                array_push($res, ...$convert($k, $v));
            }
            return fromPairs($res);
        }
    )(...$args);
}