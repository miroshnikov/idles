<?php

namespace Idles;

/**
 * Pad a string on the left side to a certain length with padding characters.
 * 
 * @param string $padChars
 * @param non-negative-int $length
 * @param string $string
 * @return \Closure|string
 * 
 * @example ```
 *  padStart('_-', 6, 'abc'); // _-_abc
 * ```
 * 
 * @category String
 * 
 * @see pad()
 * @see padEnd()
 */
function padStart(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn ($padChars, $length, $string) => \mb_str_pad($string, $length, $padChars, \STR_PAD_LEFT)
    )(...$args);
}
