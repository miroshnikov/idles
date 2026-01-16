<?php

namespace Idles;

/** 
 * @internal 
 * @ignore
 */
function toArray($value): array
{
    if (\is_iterable($value)) {
        return collect($value);
    }

    if (\is_object($value)) {
        return \get_object_vars($value);
    }

    return \is_callable($value) ? [$value()] : [$value];
}
