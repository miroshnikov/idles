<?php

namespace Idles;

function rebuild(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        function (callable $convert, ?iterable $record) {
            $res = [];
            foreach (collect($record) as $k => $v) {
                array_push($res, ...$convert($k, $v));
            }
            return fromPairs($res);
        }
    )(...$args);
}