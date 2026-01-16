<?php

namespace Idles;

/**
 * Like `merge` but if a key exists in both records, `$customizer` is called to the values associated with the key.
 * 
 * @param callable(mixed $a,mixed $b):mixed $customizer
 * @param ?iterable<mixed> $left
 * @param ?iterable<mixed> $right
 * @return array<mixed>
 * 
 * @example ```
 *   mergeWith(concat(...), ['a' => [1], 'b' => [2]], ['a' => [3], 'b' => [4]]); 
 *   // ['a' => [1,3], 'b' => [2,4]]
 * ```
 * 
 * @category Record
 * 
 * @see merge()
 * @see mergeDeep()
 */
function mergeWith(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        function (callable $customizer, ?iterable $left, ?iterable $right): array {
            $l = collect($left);
            $r = collect($right);
            $res = merge($l, $r);
            map(
                function ($k) use (&$res, $customizer, $l, $r) { $res[$k] = $customizer($l[$k], $r[$k]); },
                intersection(keys($l), keys($r))
            );
            return $res;
        }
    )(...$args);
}
