<?php

namespace Idles;

function sort(callable $comparator, ?iterable $collection): array
{
    $collection = collect($collection);
    \usort($collection, $comparator);
    return $collection;
}