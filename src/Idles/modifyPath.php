<?php

namespace Idles;

/**
 * Creates new record by applying an `$updater` function to the value at the given `$path`.
 *
 * @param array<array-key>|array-key $path
 * @param callable(mixed):mixed $updater
 * @param ?iterable<mixed> $record
 * @return array<mixed>
 * 
 * @example ```
 *  $a = [ 'a' => [ [ 'b' => [ 'c' => 3 ] ] ] ];
 *  modifyPath(['a',0,'b','c'], fn ($n) => $n*$n, $a); // [ 'a' => [ [ 'b' => [ 'c' => 9 ] ] ] ]
 * ```
 * 
 * @category Record
 * 
 * @see setPath()
 * 
 * @alias update
 */
function modifyPath(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn ($path, callable $updater, ?iterable $record) => _modifyPath($record, $path, $updater)
    )(...$args);
}


/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $array
 * @param array<array-key>|array-key $path
 * @return array<mixed>
 */
function &_modifyPath(?iterable &$array, $path, callable $updater): array
{
    if (!$array) {
        $array = [];
    }
    if (!\is_array($array)) {
        $array = collect($array);
    }

    $path = \Idles\toPath($path);
    $last = \count($path) - 1;
    $ptr =& $array;
    foreach ($path as $i => $part) {
        if (!\is_array($ptr)) {
            $ptr = [];
        }
        if (!\array_key_exists($part, $ptr)) {
            $ptr[$part] = null;
        }
        if ($i < $last) {
            $ptr =& $ptr[$part];
        } else {
            $ptr[$part] = $updater($ptr[$part]);
        }
    }
    return $array;
}