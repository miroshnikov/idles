<?php

namespace Idles;

function any(...$args)
{
    return curryN(2, 
        function (callable $predicate, ?iterable $collection): bool {
            $collection ??= [];
            foreach ($collection as $key => $value) {
                if ($predicate($value, $key, $collection)) {
                    return true;
                }
            }
            return false;
        }
    )(...$args);
}

function some(...$args)
{
    return any(...$args);
}
