<?php

namespace Idles;

/**
 * Check if the `$test` satisfies the `$spec`.
 * 
 * @param array<string,mixed> $spec
 * @param ?iterable<string,mixed> $test
 * @return \Closure|bool
 * 
 * @example ```
 *  $pred = whereEq(['a' => 1, 'b' => 2]);
 *  $pred(['a' => 1])); // false
 *  $pred(['a' => 1, 'b' => 2])); // true
 *  $pred(['a' => 1, 'b' => 2, 'c' => 3])); // true
 *  $pred(['a' => 1, 'b' => 1]));   // false
 * ```
 * 
 * @category Record
 * 
 * @see where()
 * @see whereAny()
 * 
 * @alias matches
 */
function whereEq(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function (array $spec, ?iterable $test): bool {
            $test = collect($test);
            foreach ($spec as $prop => $v) {
                if (($test[$prop] ?? null) !== $v) {
                    return false;
                }
            }
            return true;
        }
    )(...$args);
}
