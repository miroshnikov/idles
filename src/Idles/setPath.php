<?php

namespace Idles;

/**
 * Return copy of `$record` with `$path` set with `$value`.
 * 
 * @param array-key|array<array-key>|string $path
 * @param mixed $value
 * @param ?iterable<mixed> $record
 * @return array<mixed>
 * 
 * @example ```
 *  $a = [ 'a' => [ [ 'b' => [ 'c' => 3 ] ] ] ];
 *  setPath(['a',0,'b','c'], 113, $a);  
 *  // [ 'a' => [ [ 'b' => [ 'c' => 113 ] ] ] ]
 * ```
 * 
 * @category Record
 * 
 * @see modifyPath()
 * @see merge()
 * 
 * @alias assocPath
 */
function setPath(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity,
        fn ($path, $value, ?iterable $record) => modifyPath($path, fn () => $value, $record)
    )(...$args);
}
