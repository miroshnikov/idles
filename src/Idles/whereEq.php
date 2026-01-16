<?php

namespace Idles;

/**
 * Check if the `$test` satisfies the `$spec`.
 * 
 * @param array<string,mixed> $spec
 * @param ?iterable<string,mixed> $test
 * @return bool
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
            return \array_replace_recursive($test, $spec) === $test;
        }
    )(...$args);
}
