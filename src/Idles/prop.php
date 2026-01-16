<?php

namespace Idles;

/**
 * Return the specified property.
 * 
 * @param array-key $key
 * @param ?iterable<mixed> $record
 * @return mixed
 * 
 * @example ```
 *   propOr('NO', 'b', ['a' => 'A']); // 'NO'
 * ```
 * 
 * @category Record
 * 
 * @see path()
 * 
 * @alias property
 */
function prop(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($key, ?iterable $record) => collect($record)[$key] ?? null)(...$args);
}
