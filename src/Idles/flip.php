<?php

namespace Idles;

/**
 * Returns a new curried function with the first two arguments reversed.
 *
 * @param callable $fn
 * @return callable
 * 
 * @example ```
 *   flip(fn ($a, $b, $c, $d) => [$a, $b, $c, $d])(1, 2)(3, 4); // [2, 1, 3, 4]
 * ```
 * 
 * @category Function
 * 
 * @see rearg()
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
