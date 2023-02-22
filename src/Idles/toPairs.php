<?php

namespace Idles;

function toPairs(?iterable $record): iterable
{
    $record ??= [];
    if (\is_array($record)) {
        $pairs = [];
        \array_walk($record, function ($v, $k) use (&$pairs) { $pairs[] = [$k, $v]; });
        return $pairs;
    }
    return new Iterators\ValuesIterator(new Iterators\MapRecursiveIterator($record, fn ($v, $k) => [$k, $v]));
}

function entries(?iterable $record): iterable
{
    return toPairs($record);
}
