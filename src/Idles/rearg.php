<?php

namespace Idles;

/**
 * Returns a curried function that invokes `$fn` with arguments rearranged according to `$indexes`.
 * 
 * @param array<non-negative-int> $indexes
 * @param callable $fn
 * @return callable
 * 
 * @example ```
 *   $rearged = rearg(
 *     [2, 0, 1], 
 *     fn ($a, $b, $c) => [$a, $b, $c] 
 *   );
 *   $rearged('b', 'c', 'a'); // ['a', 'b', 'c']
 * ```
 * 
 * @category Function
 * 
 * @see nthArg()
 * @see ary()
 */
function rearg(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function (array $indexes, callable $fn) {
            $previous = [];
            $rearged = function (...$args) use (&$rearged, &$previous, $indexes, $fn) {
                $previous = [...$previous, ...$args];
                if (\count($previous) >= \count($indexes)) {
                    $res = $fn(...paths($indexes, $previous));
                    $previous = [];
                    return $res;
                }
                return $rearged;
            };
            return $rearged;
        }
    )(...$args);
}
