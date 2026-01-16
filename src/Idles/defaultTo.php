<?php

namespace Idles;

/**
 * Returns the first argument if it is truthy, otherwise the second argument.
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
    return curryN(2, 
        fn ($default, $value) => $value ? $value : $default
    )(...$args);
}
