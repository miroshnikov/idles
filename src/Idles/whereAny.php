<?php

namespace Idles;

function whereAny(...$args)
{
    return curryN(
        2,
        function (array $spec, ?iterable $record): bool {
            $record = collect($record);
            foreach ($spec as $prop => $f) {
                if (\array_key_exists($prop, $record) && $f($record[$prop])) {
                    return true;
                }
            }
            return false;
        }
    )(...$args);
}
