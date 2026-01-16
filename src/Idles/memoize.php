<?php

namespace Idles;

/**
 * Creates a function that memoizes the result of `$fn`.
 * 
 * @param callable $fn
 * @return callable
 * 
 * @category Function
 * 
 * @see once()
 */
function memoize(mixed ...$args)
{
    return curryN(1, fn (callable $fn) => _memoize($fn))(...$args);
}

/**
 * Creates a function that memoizes the result of `$fn`. `$resolver` returns map cache key (args[0] by default).
 * 
 * @param callable(mixed...):array-key $resolver
 * @param callable $fn
 * @return callable
 * 
 * @category Function
 */
function memoizeWith(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn (callable $resolver, callable $fn) => _memoize($fn, $resolver))(...$args);
}

/** 
 * @internal 
 * @ignore
 */
function _memoize(callable $func, ?callable $resolver = null): callable
{
    $cache = [];
    $resolver ??= fn (...$args) => \strval($args[0]);
    return function (...$args) use ($func, &$cache, $resolver) {
        $key = $resolver(...$args);
        return \array_key_exists($key, $cache) ? $cache[$key] : $cache[$key] = $func(...$args);
    };
}