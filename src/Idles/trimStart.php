<?php

namespace Idles;

/**
 * Strip characters from the beginning of a string.
 * 
 * @param string $characters that need to be stripped
 * @param string $string that will be trimmed
 * @return string
 * 
 * @category String
 * 
 * @see trim()
 * @see trimEnd()
 */
function trimStart(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (string $characters, string $string) => \mb_ltrim($string, $characters)
    )(...$args);
}
