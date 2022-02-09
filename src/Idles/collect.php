<?php

namespace Idles;

function collect(?iterable $collection): array
{
    $collection ??= [];
    return \is_array($collection) ? $collection : \iterator_to_array($collection);
}
