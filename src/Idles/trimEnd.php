<?php

/**
 * Strip characters from the end of a string.
 * 
 * @param string $characters that need to be stripped
 * 
 * @param string $string that will be trimmed
 * 
 * @return string
 */

namespace Idles;

function trimEnd(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (string $characters, string $string) => \mb_rtrim($string, $characters)
    )(...$args);
}
