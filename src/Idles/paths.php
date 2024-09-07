<?php

namespace Idles;

function paths(...$args)
{
    return curryN(
        2,
        function (array $paths, ?iterable $collection): array {
            $collection = collect($collection);
            $res = [];
            foreach ($paths as $path) {
                $res[] = path($path, $collection);
            }
            return $res;
        }
    )(...$args);
}

function props(...$args)
{
    return paths(...$args);
}

function at(...$args)
{
    return paths(...$args);
}