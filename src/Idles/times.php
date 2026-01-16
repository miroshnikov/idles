<?php

namespace Idles;

/**
 * Calls the iteratee `$n` times, returning an array of the results of each invocation.
 * 
 * @param callable(int $index):mixed $iteratee  $index begins at `0` and is incremented to `$n - 1`
 * @param positive-int $n
 * @return array<mixed>
 * 
 * @example ```
 *  times(fn($i) => "$i", 3); // ['0', '1', '2']
 * ```
 * 
 * @category Function
 */
function times(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function (callable $iteratee, int $n): array {
            $res = [];
            for ($i = 0; $i < $n; ++$i) {
                $res[] = $iteratee($i);
            }
            return $res;
        }
    )(...$args);
}
