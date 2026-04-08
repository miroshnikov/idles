<?php

namespace Idles;

/**
 * Replace a regex match in a string with a replacement.
 * 
 * @param string|array $pattern RegExp
 * @param string $replacement
 * @param string $string
 * @return \Closure|string|array
 * 
 * @example ```
 *  replace('/foo/', 'bar', 'foo foo foo'); // bar bar bar
 * ```
 * 
 * @category String
 */
function replace(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn ($pattern, $replacement, $string) => \preg_replace($pattern, $replacement, $string)
    )(...$args);
}
