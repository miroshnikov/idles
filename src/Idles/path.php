<?php

namespace Idles;

/**
 * Retrieve the value at a given path.
 * 
 * @param array-key|array<array-key>|string $path
 * @param ?iterable<mixed> $collection
 * @return mixed
 * 
 * @example ```
 *   $rec = [ 'a' => [[ 'b' => [ 'c' => 3 ] ]] ];
 *   path(['a', '0', 'b', 'c'], $rec); // 3
 *   path('a[0].b.c', $rec); // 3
 *   pathOr('default', 'a.b.c', $rec); // 'default'
 * ```
 * 
 * @category Record
 * 
 * @see prop()
 * 
 * @alias get
 */
function path(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($path, ?iterable $collection) => _path($collection, $path))(...$args);
}

/**
 * Retrieve the value at a given path. If path is not found, the `$default` is returned.
 * 
 * @param mixed $default
 * @param array-key|array<array-key>|string $path
 * @param ?iterable<mixed> $collection
 * @return mixed
 * 
 * @example ```
 *   $rec = [ 'a' => [[ 'b' => [ 'c' => 3 ] ]] ];
 *   path(['a', '0', 'b', 'c'], $rec); // 3
 *   path('a[0].b.c', $rec); // 3
 *   pathOr('default', 'a.b.c', $rec); // 'default'
 * ```
 * 
 * @category Record
 * 
 * @see path()
 * 
 * @alias getOr
 */
function pathOr(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, fn ($default, $path, ?iterable $collection) => _path($collection, $path, $default))(...$args);
}

/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $record
 * @param array-key|array<array-key>|string $path
 * @param mixed $default
 * @return mixed
 */
function _path(?iterable $record, $path, $default = null)
{
    $record = collect($record);
    each(function ($part) use (&$record, $default) {
        /** @var array<mixed> $record */
        if (\array_key_exists($part, $record)) {
            $record = $record[$part];
        } else {
            $record = $default;
            return false;
        }
    }, toPath($path));
    return $record;
}


