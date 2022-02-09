<?php

namespace Idles;

function resolve(...$args)
{
    return curryN(2, 
        function (array $resolvers, array $record): array {
            foreach ($resolvers as $path => $fn) {
                $record = setPath($path, $fn($record), $record);
            }
            return $record;
        }
    )(...$args);
}
