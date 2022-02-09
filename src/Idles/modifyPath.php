<?php

namespace Idles;

function &_modifyPath(?iterable &$array, /*string|array*/ $path, callable $updater): array
{
    if (!$array) {
        $array = [];
    }
    if (!\is_array($array)) {
        $array = collect($array);
    }

    $path = \Idles\toPath($path);
    $last = \count($path) - 1;
    $ptr =& $array;
    foreach ($path as $i => $part) {
        if (!\is_array($ptr)) {
            $ptr = [];
        }
        if (!\array_key_exists($part, $ptr)) {
            $ptr[$part] = null;
        }
        if ($i < $last) {
            $ptr =& $ptr[$part];
        } else {
            $ptr[$part] = $updater($ptr[$part]);
        }
    }
    return $array;
}

function modifyPath(...$args)
{
    return curryN(3, 
        fn ($path, callable $updater, ?iterable $record) => _modifyPath($record, $path, $updater)
    )(...$args);
}

function update(...$args)
{
    return modifyPath(...$args);
}
