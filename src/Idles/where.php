<?php

namespace Idles;

/**
 * Checks if `$record` satisfies the spec by invoking the `$spec` properties with the corresponding properties of $record.
 *
 * @param array<string,callable(mixed):bool> $spec
 * @param ?iterable<string,mixed> $record
 * @return \Closure|bool
 * 
 * @example ```
 *   $a = ['a' => 'A', 'b' => 'B'];
 *   where(['a' => fn ($v) => $v == 'A'], $a); // true
 * ```
 *  
 * @category Record
 * 
 * @see whereEq()
 * @see whereAny()
 * 
 * @alias conforms
 */
function where(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        function (array $spec, ?iterable $record): bool {
            $record = collect($record);
            foreach ($spec as $prop => $f) {
                if (!$f($record[$prop] ?? null)) {
                    return false;
                }
            }
            return true;
        }
    )(...$args);
}
