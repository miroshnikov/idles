<?php

namespace Idles;

function uniq(?iterable $collection): array
{
    $collection ??= [];
    $res = [];
    foreach ($collection as $v) {
        if (\array_search($v, $res, true) === false) {
            \array_push($res, $v);
        }
    }
    return $res;
}
