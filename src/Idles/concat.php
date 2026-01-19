<?php

namespace Idles;

/**
 * Concatinates an iterable with an iterable/value.
 * 
 * @param iterable<mixed> $iterable
 * @param iterable<mixed>|mixed $value
 * @return iterable<mixed> Numerically indexed concatenated iterable
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
        fn (?iterable $iterable, $value): iterable => concatAll([$iterable, $value])
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
    $array = \array_shift($values);
    $array = \is_iterable($array) ? $array : [$array];
    if (\is_array($array)) {
        return \array_merge(
            collect(values($array)), 
            ...map(fn ($v) => values(collect(\is_iterable($v) ? $v : [$v])), $values)
        );
    }

    $i = new \AppendIterator();
    $i->append($array);
    foreach ($values as $v) {
        $i->append(\is_a($v, '\Iterator') ? $v : new \ArrayIterator(\is_array($v) ? $v : [$v]));
    }
    return new Iterators\ValuesIterator($i);
}
