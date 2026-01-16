<?php

namespace Idles;

/**
 * Checks if `$value` is in $collection.
 * 
 * @param mixed $value
 * @param iterable<mixed>|null|string $collection
 * @return bool
 * 
 * @example ```
 *   includes(1, ['a' => 1, 'b' => 2]); // true
 * ```
 * @category Collection
 * 
 * @alias contains
 */
function includes(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn ($value, iterable|null|string $collection) => _includes($collection, $value)
    )(...$args);
}

/**
 * Checks if `$value` is in $collection, starting from `$fromIndex`.
 * 
 * @param mixed $value
 * @param int $fromIndex
 * @param iterable<mixed>|null|string $collection
 * @return bool
 * 
 * @category Collection
 */
function includesFrom(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn ($value, int $fromIndex, iterable|null|string $collection) => _includes($collection, $value, $fromIndex)
    )(...$args);
}


/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $collection
 */
function _includes(iterable|null|string $collection, mixed $value, int $fromIndex = 0): bool
{
    if (!$collection) {
        return false;
    }

    if (\is_string($collection)) {
        return \mb_strpos($collection, $value, $fromIndex) !== false;
    }

    if ($fromIndex < 0 && !\is_array($collection)) {
        $collection = collect($collection);
    }

    if (\is_array($collection)) {
        return \in_array($value, $fromIndex ? slice($fromIndex, null, $collection) : $collection);
    }
    foreach ($collection as $i => $item) {
        if ($i >= $fromIndex && $value == $item) {
            return true;
        }
    }
    return false;
}