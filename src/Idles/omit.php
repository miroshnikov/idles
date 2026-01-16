<?php

namespace Idles;

/**
 * The opposite of `pick`. Returns record without `$keys`.
 * 
 * @param array<string> $keys
 * @param ?iterable<string,mixed> $collection
 * @return iterable<string,mixed>
 * 
 * @example ```
 *  omit(['a', 'd'], ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4]);
 *  // ['b' => 2, 'c' => 3]
 * ```
 * 
 * @category Record
 */
function omit(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (array $keys, ?iterable $collection) =>
            omitBy(fn ($_, $key) => \in_array($key, $keys), $collection)
    )(...$args);
}
