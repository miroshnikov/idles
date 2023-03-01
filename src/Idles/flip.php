<?php

namespace Idles;

function flip(callable $fn): callable
{
    return curryN(
        (new \ReflectionFunction($fn))->getNumberOfParameters(),
        fn (...$args) => $fn(
            ...\array_merge(
                \array_reverse(\array_slice($args, 0 ,2)), 
                \array_slice($args, 2)
            )
        )
    );
}
