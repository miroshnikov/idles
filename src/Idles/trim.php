<?php

namespace Idles;

/**
 * Strip characters from the beginning and end of a string.
 * 
 * @param string $characters that need to be stripped
 * @param string $string that will be trimmed
 * @return string
 * 
 * @example ```
 *  trim(" \t.", "\t\tThese are a few words :) ...  "); // These are a few words :)
 * ```
 * 
 * @category String
 * 
 * @see words()
 * @see trimStart()
 * @see trimEnd()
 */
function trim(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (string $characters, string $string) => \mb_trim($string, $characters)
    )(...$args);
}
