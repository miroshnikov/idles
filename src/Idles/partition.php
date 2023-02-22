<?php

namespace Idles;

function partition(...$args)
{
    return curryN(
        2,
        function (callable $predicate, ?iterable $collection): array {
            $res = [[],[]];
            $collection ??= [];
            foreach ($collection as $key => $value) {
                $res[$predicate($value) ? 0 : 1][$key] = $value;
            }
            return $res;
        }
    )(...$args);
}
