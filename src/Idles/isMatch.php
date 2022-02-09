<?php

namespace Idles;

function isMatch(...$args)
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
    return isMatch(...$args);
}

function whereEq(...$args)
{
    return isMatch(...$args);
}
