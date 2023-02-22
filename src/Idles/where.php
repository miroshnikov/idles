<?php

namespace Idles;

function where(...$args)
{
    return curryN(
        2,
        function (array $spec, ?iterable $record): bool {
            $record = collect($record);
            foreach ($spec as $prop => $f) {
                if (!\array_key_exists($prop, $record) || !$f($record[$prop])) {
                    return false;
                }
            }
            return true;
        }
    )(...$args);
}

function conforms(...$args)
{
    return where(...$args);
}
