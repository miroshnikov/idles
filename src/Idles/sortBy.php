<?php

namespace Idles;

function sortBy(...$args)
{
    return curryN(2, 
        fn (array $iteratees, ?iterable $collection) => orderBy($iteratees, [], $collection)
    )(...$args);
}
