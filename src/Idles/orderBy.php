<?php

namespace Idles;

function _orderBy(?iterable $collection, array $iteratees, array $orders): array
{
    $collection = collect($collection ?? []);
    if (!$collection) {
        return [];
    }

    $orders = \array_pad(
        \array_map(fn ($s) => \preg_match('/desc/i', \trim($s)) ? \SORT_DESC : \SORT_ASC, $orders ?? []),
        \count($iteratees),
        \SORT_ASC
    );
    $indexes = \range(0, \count($collection) - 1);
    $arrays = concat(flatMap(fn ($iteratee, $i) => [map($iteratee, $collection), $orders[$i]], $iteratees), [$indexes]);
    \array_multisort(...$arrays);

    return collect(map(fn ($i) => $collection[$i], last($arrays)));
}

function orderBy(...$args)
{
    return curryN(
        3,
        fn (array $iteratees, array $orders, ?iterable $collection) => _orderBy($collection, $iteratees, $orders)
    )(...$args);
}
