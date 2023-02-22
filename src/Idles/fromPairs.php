<?php

namespace Idles;

function fromPairs(?iterable $collection): array
{
    $collection ??= [];
    $res = [];
    foreach ($collection as $entry) {
        if (\is_array($entry) && !empty($entry)) {
            $res[$entry[0]] = \count($entry) > 1 ? $entry[1] : null;
        }
    }
    return $res;
}