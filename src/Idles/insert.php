<?php

namespace Idles;

/**
 * Inserts the `$element` at the specified `$index`.
 * 
 * @param positive-int $index 
 * @param mixed $element
 * @param array<mixed> $array
 * @return \Closure|array
 * 
 * @example ```
 *  insert(2, 'x', [1,2,3,4]); // [1,2,'x',3,4]
 * ```
 * @category Array
 * 
 * @see setPath()
 */
function insert(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn (int $index, mixed $element, array $array) => 
            \array_merge(
                \array_slice($array, 0, $index),
                [$element],
                \array_slice($array, $index)
            )
    )(...$args);
}