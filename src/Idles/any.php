<?php

namespace Idles;

/**
 * Checks if `$predicate` returns truthy for __any__ element of `$collection`. Stops on first found.
 * 
 * @param callable(mixed $value, array-key $key):bool  $predicate
 * @param ?iterable<array-key,mixed> $collection
 * @return \Closure|bool
 * 
 * @example ```
 *   $users = [
 *       [ 'user' => 'barney', 'active' => false ],
 *       [ 'user' => 'fred',   'active' => true ]
 *   ];
 *   any(propEq('active', true), $users); // true
 * ```
 * 
 * @category Collection
 * 
 * @see all()
 * 
 * @alias some
 */
function any(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function (callable $predicate, ?iterable $collection): bool {
            if (\is_array($collection)) {
                return \array_any($collection, $predicate);
            }
            foreach ($collection ?? [] as $key => $value) {
                if ($predicate($value, $key)) {
                    return true;
                }
            }
            return false;
        }
    )(...$args);
}
