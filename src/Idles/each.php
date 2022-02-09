<?php

namespace Idles;

function each(...$args)
{
    return curryN(2, 
        function (callable $iteratee, ?iterable $collection): iterable {
            $iteratee = $iteratee ?? fn ($v) => $v;
            foreach (($collection ?? []) as $key => $value) {
                if ($iteratee($value, $key, $collection) === false) {
                    return $collection;
                }
            }
            return $collection;
        }
    )(...$args);
}
