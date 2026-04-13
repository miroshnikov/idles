<?php

namespace Idles;

/**
 * Concatinates an iterable with an iterable/value.
 * 
 * @param iterable<mixed>|string $first
 * @param iterable<mixed>|string $second
 * @return iterable<mixed> Numerically indexed concatenated iterable or string
 * 
 * @example ```
 *   concat(['a','b'], ['c', 'd']); // ['a', 'b', 'c', 'd']
 *   concat(['a','b'], 'C');  // ['a', 'b', 'C']
 * ```
 * 
 * @category Array
 * 
 * @see merge()
 * 
 * @idles-lazy
 * @idles-reindexed
 */
function concat(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn ($first, $second) => concatAll([$first, $second])
    )(...$args);
}

/**
 * Concatinates an iterable with additional iterables/values
 * 
 * @param array<iterable<mixed>|mixed> $values
 * @return iterable<mixed> Numerically indexed concatenated iterable
 * 
 * @category Array
 * 
 * @idles-lazy
 * @idles-reindexed
 */
function concatAll(array $values)
{
    if (empty($values)) {
        return [];
    }

    if (\is_string($values[0])) {
        return \array_reduce($values, fn ($res, $s) => $res.$s, '');
    }

    $array = \array_shift($values);
    $array = \is_iterable($array) ? $array : [$array];
    if (\is_array($array)) {
        return \array_merge(
            collect(values($array)), 
            ...(array) map(fn ($v) => values(collect(\is_iterable($v) ? $v : [$v])), $values)
        );
    }

    $i = new \AppendIterator();
    $i->append($array);
    foreach ($values as $v) {
        $i->append(\is_a($v, '\Iterator') ? $v : new \ArrayIterator(\is_array($v) ? $v : [$v]));
    }
    return new Iterators\ValuesIterator($i);
}
