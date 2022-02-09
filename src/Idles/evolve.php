<?php

namespace Idles;

function evolve(...$args)
{
    return curryN(2, 
        function (array $transformations, ?iterable $record): array {
            $record = collect($record);
            $result = [];
            foreach ($record as $key => $value) {
                $transformation = $transformations[$key] ?? null;
                $result[$key] = \is_callable($transformation) ? 
                    $transformation($value) : 
                    (\is_array($transformation) && \is_iterable($value) ? evolve($transformation, $value) : $value);
            }
            return $result;
        }
    )(...$args);
}
