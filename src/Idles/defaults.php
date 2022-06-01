<?php

namespace Idles;

function defaultsAll(array $iterables): array
{
    return 
        \array_replace( 
            ...\array_reverse(
                \array_map(fn ($i) => collect($i ?? []), $iterables)
            )
        );
}

function defaults(...$args)
{
    return curryN(2, 
        fn (?iterable $record1, ?iterable $record2): array => defaultsAll([$record1, $record2])
    )(...$args);
}
