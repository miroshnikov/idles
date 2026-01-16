<?php

namespace Idles;

/**
 * Keys in, values out. Order is preserved.
 * 
 * @param array<array-key|array<array-key>|string> $paths
 * @param ?iterable<mixed> $collection
 * @return array<mixed>
 * 
 * @example ```
 *   $a = [ 'a' => [ [ 'b' => [ 'c' => 3 ] ], 4] ];
 *   paths([['a',0,'b','c'], ['a',0,'z'], ['a',1]], $a); // [3, null, 4]
 *   paths(['a.0.b.c', 'a.0.z', 'a.1'], $a); // [3, null, 4]
 * ```
 * 
 * @category Record
 * 
 * @see path()
 * 
 * @alias props
 * @alias at
 */
function paths(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        function (array $paths, ?iterable $collection): array {
            $collection = collect($collection);
            $res = [];
            foreach ($paths as $path) {
                $res[] = path($path, $collection);
            }
            return $res;
        }
    )(...$args);
}
