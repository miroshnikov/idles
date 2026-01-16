<?php

namespace Idles;

/**
 * Like `uniq` but apply `$iteratee` fist.
 *
 * @param callable(mixed):mixed $iteratee
 * @param ?iterable<mixed> $collection
 * @return array<mixed>
 * 
 * @example ```
 *  uniqBy(\abs(...))([-1, -5, 2, 10, 1, 2]); // [-1, -5, 2, 10]
 * ```
 *
 * @category Array
 * 
 * @see uniq()
 */
function uniqBy(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (callable $iteratee, ?iterable $collection) =>
            uniqWith(fn ($a, $b) => $iteratee($a) === $iteratee($b), $collection)
    )(...$args);
}
