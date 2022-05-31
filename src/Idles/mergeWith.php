<?php

namespace Idles;

function mergeWith(...$args)
{
    return curryN(3, 
        function (callable $customizer, ?iterable $left, ?iterable $right): array {
            $l = collect($left);
            $r = collect($right);
            $res = merge($l, $r);
            map(
                function ($k) use (&$res, $customizer, $l, $r) { $res[$k] = $customizer($l[$k], $r[$k]); },
                intersection(keys($l), keys($r))
            );
            return $res;
        }
    )(...$args);
}
