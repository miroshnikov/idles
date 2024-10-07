<?php

namespace Idles;

function any(...$args)
{
    static $arity = 2;
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
    static $arity = 2;
    return any(...$args);
}
