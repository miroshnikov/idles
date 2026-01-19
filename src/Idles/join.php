<?php

namespace Idles;

/**
 * Joins iterable elements separated by `$separator`.
 * 
 * @param string $separator
 * @param ?iterable $collection
 * @return string
 * 
 * @example ```
 *   join('~', ['a', 'b', 'c']); // 'a~b~c'
 * ```
 * 
 * @category Array
 * 
 * @see split()
 */
function join(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (string $separator, ?iterable $collection) => \implode($separator, collect($collection))
    )(...$args);
}
