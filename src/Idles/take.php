<?php

namespace Idles;

function take(...$args)
{
    return curryN(2, 
        function (int $n, ?iterable $collection): iterable {
            $collection ??= [];
            if (\is_array($collection)) {
                return \array_slice($collection, 0, $n);
            }  
            return new \LimitIterator($collection, 0, $n);
        }
    )(...$args);
}
