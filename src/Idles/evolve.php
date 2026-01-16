<?php

namespace Idles;

/**
 * Creates a new record by recursively calling transformation functions with `$record` properties.
 * 
 * @param array<string,callable(mixed):mixed> $transformations 
 * @param ?iterable<string,mixed> $record
 * @return array<string,mixed>
 * 
 * @example ```
 *   $tomato = ['firstName' => '  Tomato ', 'data' => ['elapsed' => 100, 'remaining' => 1400], 'id' => 123];
 *   $transformations = [
 *       'firstName' => '\trim',
 *       'lastName' => '\trim',  // Will not get invoked.
 *       'data' => [
 *           'elapsed' => add(1), 
 *           'remaining' => add(-1)
 *       ]
 *   ];
 *   evolve($transformations)($tomato);
 *   // ['firstName' => 'Tomato', 'data' =>  ['elapsed' =>  101, 'remaining' =>  1399], 'id' => 123]
 * ```
 * 
 * @see resolve()
 * 
 * @category Record
 */
function evolve(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
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
