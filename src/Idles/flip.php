<?php

namespace Idles;

/**
 * Returns a new curried function with the first two arguments reversed
 *
 * @param callable      $fn
 *
 * @return callable
 */

function flip(callable $fn): callable
{
    return curryN(
        arity($fn),
        fn (...$args) => $fn(
            ...\array_merge(
                \array_reverse(\array_slice($args, 0 ,2)), 
                \array_slice($args, 2)
            )
        )
    );
}
