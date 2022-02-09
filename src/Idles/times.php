<?php

namespace Idles;

function times(...$args)
{
    return curryN(2, function (int $n, callable $iteratee): array {
        $res = [];
        for ($i = 0; $i < $n; ++$i) {
            $res[] = $iteratee($i);
        }
        return $res;
    })(...$args);
}
