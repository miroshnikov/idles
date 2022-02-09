<?php

namespace Idles;

function _includes(?iterable $collection, $value, int $fromIndex = 0): bool
{
    if (!$collection) {
        return false;
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

function includes(...$args)
{
    return curryN(2, 
        fn ($value, ?iterable $collection) => _includes($collection, $value)
    )(...$args);
}

function includesFrom(...$args)
{
    return curryN(3, 
        fn ($value, int $fromIndex, ?iterable $collection) => _includes($collection, $value, $fromIndex)
    )(...$args);
}

function contains(...$args)
{
    return includes(...$args);
}

