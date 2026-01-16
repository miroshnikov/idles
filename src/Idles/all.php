<?php

namespace Idles;

/**
 * Checks if `$predicate` returns truthy for __all__ elements of `$collection`. Stop once it returns falsey.
 * 
 * @param callable(mixed $value, array-key $key):bool $predicate
 * @param ?iterable $collection
 * @return bool
 * 
 * @example ```
 *   all('\is_numeric')([1,2,3]); // true
 *   $users = [
 *     [ 'user' => 'barney', 'age' => 36, 'active' => true ],
 *     [ 'user' => 'fred',   'age' => 40, 'active' => true ]
 *   ];
 *   all(property('active'))($users); // true
 * ```
 * 
 * @category Collection
 * 
 * @alias every
 */
function all(mixed ...$args)
{
    static $arity = 2;
    return curryN(
        2,
        fn (callable $predicate, ?iterable $collection) => _all($predicate, $collection)
    )(...$args);
}


/** 
 * @internal 
 * @ignore
 * @phpstan-ignore missingType.iterableValue
 */
function _all(callable $predicate, ?iterable $collection): bool
{
    if (\is_array($collection)) {
        return \array_all($collection, $predicate);
    }
    if ($collection) {
        foreach ($collection as $key => $value) {
            if (!$predicate($value, $key)) {
                return false;
            }
        }
    }
    return true;
}
