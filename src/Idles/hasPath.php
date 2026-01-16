<?php

namespace Idles;

/**
 * Checks if `$path` exists in `$record`.
 * 
 * @param array-key|array<array-key>|string $path
 * @param ?iterable<mixed> $record
 * @return bool
 * 
 * @example ```
 *  $r = [ 'a' => [ 'b' => 2 ] ];
 *  hasPath('a', $r); // true
 *  hasPath(['a', 'b'], $r); // true
 *  hasPath('a.b', $r); // true
 * ```
 * 
 * @category Record
 * 
 * @see path()
 * @see has()
 */
function hasPath(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn ($path, ?iterable $record) => _hasPath($record, $path)
    )(...$args);
}

/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $record
 * @param string|int|array<string> $path
 */
function _hasPath(?iterable $record, string|int|array $path): bool
{
    $record = collect($record);
    foreach (toPath($path) as $part) {
        if (!\is_array($record) || !\array_key_exists($part, $record)) {
            return false;
        }
        $record = $record[$part];
    }
    return true;
}
