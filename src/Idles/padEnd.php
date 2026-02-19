<?php

namespace Idles;

/**
 * Pad a string on the right side to a certain length with padding characters.
 * 
 * @param string $padChars
 * @param non-negative-int $length
 * @param string $string
 * @return \Closure|string
 * 
 * @example ```
 *  padEnd('_-', 6, 'abc'); // abc_-_
 * ```
 * 
 * @category String
 * 
 * @see pad()
 * @see padStart()
 */
function padEnd(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn ($padChars, $length, $string) => \mb_str_pad($string, $length, $padChars)
    )(...$args);
}
