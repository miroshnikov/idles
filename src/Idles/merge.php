<?php

namespace Idles;

function mergeAll(...$args): array
{
    return curryN(1, 
        fn (array $records) => \array_merge(...\array_map(fn ($record) => collect($record), $records))
    )(...$args);
}

function merge(...$args)
{
    return curryN(2, 
        fn (?iterable $record1, ?iterable $record2) => mergeAll([$record1, $record2])
    )(...$args);
}

function mergeDeep(...$args): array
{
    return curryN(1, 
        fn (array $records) => \array_merge_recursive(...\array_map(fn ($record) => collect($record), $records))
    )(...$args);
}
