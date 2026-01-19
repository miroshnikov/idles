<?php

namespace Idles;

/**
 * Returns the index of the first occurrence of the item in an iterable or string, else `-1`.
 * 
 * @param mixed $item
 * @param iterable<mixed>|string $collection
 * @return positive-int|-1
 * 
 * @example ```
 *  indexOf(2, [1, 2, 1, 2]); // 1
 * ```
 * 
 * @category Array
 * 
 * @see lastIndexOf()
 * @see findIndex()
 * @see find()
 */
function indexOf(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn ($item, $collection) => 
            \is_string($collection) ? 
                \mb_strpos($collection, $item) :
                findIndex(fn ($v) => $v == $item, $collection)
    )(...$args);
}


/**
 * Returns the index of the first occurrence of the item in an iterable or string, starting from `$fromIndex`, else `-1`.
 * 
 * @param mixed $item
 * @param int $fromIndex
 * @param iterable<mixed>|string $collection
 * @return positive-int|-1
 * 
 * @category Array
 */
function indexOfFrom(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn ($item, int $fromIndex, ?iterable $collection) => 
            findIndexFrom(fn ($v) => $v == $item, $fromIndex, $collection)
    )(...$args);
}
