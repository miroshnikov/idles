<?php

namespace Idles;

/**
 * Checks if `$record` satisfies the spec by invoking the `$spec` properties with the corresponding properties of $record.
 *
 * @param array<string,callable(mixed):bool> $spec
 * @param ?iterable<string,mixed> $record
 * @return bool
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
                if (!\array_key_exists($prop, $record) || !$f($record[$prop])) {
                    return false;
                }
            }
            return true;
        }
    )(...$args);
}
