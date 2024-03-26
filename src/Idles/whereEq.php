<?php

namespace Idles;

function whereEq(...$args)
{
    return curryN(2, 
        function (array $spec, ?iterable $test): bool {
            $test = collect($test);
            return \array_replace_recursive($test, $spec) === $test;
        }
    )(...$args);
}

function matches(...$args)
{
    return whereEq(...$args);
}
