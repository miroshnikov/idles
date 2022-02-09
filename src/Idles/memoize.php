<?php

namespace Idles;

function _memoize(callable $func, ?callable $resolver = null): callable
{
    $cache = [];
    $resolver ??= fn (...$args) => \strval($args[0]);
    return function (...$args) use ($func, &$cache, $resolver) {
        $key = $resolver(...$args);
        return \array_key_exists($key, $cache) ? $cache[$key] : $cache[$key] = $func(...$args);
    };
}

function memoize(...$args)
{
    return curryN(1, fn (callable $func) => _memoize($func))(...$args);
}

function memoizeWith(...$args)
{
    return curryN(2, 
        fn (callable $resolver, callable $func) => _memoize($func, $resolver)
    )(...$args);
}
