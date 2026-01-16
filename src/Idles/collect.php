<?php

namespace Idles;

/**
 * Collects any iterable into array
 * 
 * @template T
 * @param ?iterable<T> $collection
 * @return array<T>
 * 
 * @category Util
 */
function collect(?iterable $collection): array
{
    $collection ??= [];
    if (\is_array($collection)) {
        return $collection;
    }
    if (\is_object($collection) && \is_a($collection, '\Traversable')) {
        return \iterator_to_array($collection);
    }
    return [$collection];
}
