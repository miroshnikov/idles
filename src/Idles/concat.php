<?php

namespace Idles;

function concatAll(array $values)
{
    if (empty($values)) {
        return [];
    }
    $array = \array_shift($values);
    $array = \is_iterable($array) ? $array : [$array];
    if (\is_array($array)) {
        return \array_merge(
            values($array), 
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

function concat(...$args)
{
    return curryN(2, 
        fn (?iterable $array, $value): iterable => concatAll([$array, $value])
    )(...$args);
}
