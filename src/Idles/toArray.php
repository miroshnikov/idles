<?php

namespace Idles;

function toArray($value): array
{
    if (\is_array($value)) {
        return $value;
    }

    if (\is_iterable($value)) {
        return \iterator_to_array($value);
    }

    if (\is_object($value)) {
        return \get_object_vars($value);
    }

    return is_callable($value) ? [$value()] : [$value];
}
