<?php

namespace Idles;

function remove(...$args)
{
    return curryN(3, 
        function (int $start, int $count, ?iterable $iterable): array {
            $a = collect(values($iterable));
            return \array_merge(\array_slice($a, 0, $start), \array_slice($a, $start + $count));
        }
    )(...$args);
}
