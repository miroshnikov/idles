<?php

namespace Idles;

/**
 * Returns a new copy of the array with the element at the provided index replaced with the given value.
 * 
 * @param int $index
 * @param mixed $value
 * @param ?iterable<mixed> $collection
 * @return \Closure|array<mixed>
 * 
 * @example ```
 *  update(1, '_', ['a', 'b', 'c']); // ['a', '_', 'c']
 * ```
 * 
 * @category Array
 * 
 * @see modifyPath()
 * @see setPath()
 */
function update(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity,
        function (int $index, mixed $value, ?iterable $collection) {
            $array = collect($collection);
            $index = $index < 0 ? \count($array) + $index : $index;
            if (\array_key_exists($index, $array)) {
                return [...$array, $index => $value];
            }
            return $array;
        }
    )(...$args);
}