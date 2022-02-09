<?php

namespace Idles;

function values(?iterable $collection): iterable
{
    $collection ??= [];
    return \is_array($collection) ?
        \array_values($collection) : 
        new Iterators\ValuesIterator($collection);
}
