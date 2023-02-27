<?php

namespace Idles;

function uniqWith(...$args)
{
    return curryN(
        2,
        function (callable $predicate, ?iterable $collection): array {
            $res = [];
            foreach ($collection ?? [] as $findVal) {
                if (findIndex(fn ($v) => $predicate($v, $findVal), $res) === -1) {
                    \array_push($res, $findVal);
                }
            }
            return $res;
        }
    )(...$args);
}
