<?php

namespace Idles;

function times(...$args)
{
    return curryN(2, function (callable $iteratee, int $n): array {
        $res = [];
        for ($i = 0; $i < $n; ++$i) {
            $res[] = $iteratee($i);
        }
        return $res;
    })(...$args);
}
