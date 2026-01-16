<?php

namespace Idles;

/**
 * Concatinates `$array` with additional iterables/values
 * 
 * @param array<iterable<mixed>|mixed> $values
 * @return iterable<mixed> Numerically indexed concatenated iterable
 * 
 * @category Array
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

/**
 * Concatinates two iterables
 * 
 * @param iterable<mixed> $a
 * @param iterable<mixed> $b
 * @return iterable<mixed> Numerically indexed concatenated iterable
 * 
 * @example ```
 *   concat(['a','b'], ['c', 'd'])' // ['a', 'b', 'c', 'd']
 *   concat(['a','b'], 'C');  // ['a', 'b', 'C']
 * ```
 * 
 * @category Array
 * 
 * @see merge()
 */
function concat(mixed ...$args)
{
    static $arity = 2;
    return curryN(2, 
        fn (?iterable $array, $value): iterable => concatAll([$array, $value])
    )(...$args);
}
