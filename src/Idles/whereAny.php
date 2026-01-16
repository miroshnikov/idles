<?php

namespace Idles;

/**
 * Checks if `$record` satisfies the spec by invoking the $spec properties with the corresponding properties of `$record`. Returns true if at least one of the predicates returns true.
 * 
 * @param array<string,callable(mixed):bool> $spec
 * @param ?iterable<string,mixed> $record
 * @return bool
 * 
 * @example ```
 *  $objects = [
 *      [ 'a' => 2, 'b' => 1 ],
 *      [ 'a' => 1, 'b' => 2 ]
 *  ];
 *  $pred = whereAny([
 *      'a' => gt(_, 10),
 *      'b' => lt(_, 2)
 *  ]);
 *  filter($pred, $objects); // [[ 'a' => 2, 'b' => 1 ]]
 * ```
 * 
 * @category Record
 * 
 * @see where()
 * @see whereEq()
 */
function whereAny(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        function (array $spec, ?iterable $record): bool {
            $record = collect($record);
            foreach ($spec as $prop => $f) {
                if (\array_key_exists($prop, $record) && $f($record[$prop])) {
                    return true;
                }
            }
            return false;
        }
    )(...$args);
}
