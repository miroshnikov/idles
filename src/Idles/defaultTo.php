<?php

namespace Idles;

/**
 * Returns `$value` if it is truthy, otherwise `$default`.
 * 
 * @param mixed $default
 * @param mixed $value
 * @return mixed
 * 
 * @example ```
 *   defaultTo(10, null); // 10
 * ```
 * 
 * @category Logic
 * 
 * @alias or
 */
function defaultTo(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn ($default, $value) => $value ? $value : $default
    )(...$args);
}
