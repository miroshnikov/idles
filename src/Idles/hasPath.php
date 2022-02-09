<?php

namespace Idles;

function _hasPath(?iterable $record, /*string|int|array*/ $path): bool
{
    $record = collect($record);
    foreach (\Idles\toPath($path) as $part) {
        if (!\is_array($record) || !\array_key_exists($part, $record)) {
            return false;
        }
        $record = $record[$part];
    }
    return true;
}

function hasPath(...$args)
{
    return curryN(2, fn ($path, ?iterable $record) => _hasPath($record, $path))(...$args);
}
