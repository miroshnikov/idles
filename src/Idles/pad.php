<?php

namespace Idles;

/**
 * Pad a string on the left and right sides to a certain length with padding characters.
 * 
 * @param string $padChars
 * @param non-negative-int $length
 * @param string $string
 * @return \Closure|string
 * 
 * @example ```
 *  pad('_-', 8, 'abc'); // _-abc_-_
 * ```
 * 
 * @category String
 * 
 * @see padStart()
 * @see padEnd()
 */
function pad(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn ($padChars, $length, $string) => \mb_str_pad($string, $length, $padChars, \STR_PAD_BOTH)
    )(...$args);
}
