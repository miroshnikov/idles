<?php

namespace Idles;

function _path(?iterable $record, /*array|string*/ $path, $default = null)
{
    $record = collect($record);
    each(function ($part) use (&$record, $default) {
        if (\array_key_exists($part, $record)) {
            $record = $record[$part];
        } else {
            $record = $default;
            return false;
        }
    }, \Idles\toPath($path));
    return $record;
}

function path(...$args)
{
    return curryN(2, fn ($path, ?iterable $collection) => _path($collection, $path))(...$args);
}

function get(...$args)
{
    return path(...$args);
}

function pathOr(...$args)
{
    return curryN(3, fn ($default, $path, ?iterable $collection) => _path($collection, $path, $default))(...$args);
}

function getOr(...$args)
{
    return pathOr(...$args);
}
