<?php

namespace Idles;

function _all(callable $predicate, ?iterable $collection): bool
{
    if ($collection) {
        foreach ($collection as $key => $value) {
            if (!$predicate($value, $key, $collection)) {
                return false;
            }
        }
    }
    return true;
}

function all(...$args)
{
    return curryN(
        2,
        fn (callable $predicate, ?iterable $collection) => _all($predicate, $collection)
    )(...$args);
}

function every(...$args)
{
    return all(...$args);
}
