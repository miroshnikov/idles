<?php

/**
 * Strip characters from the beginning and end of a string.
 * 
 * @param string $characters that need to be stripped
 * 
 * @param string $string that will be trimmed
 * 
 * @return string
 */

namespace Idles;

function trim(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (string $characters, string $string) => \mb_trim($string, $characters)
    )(...$args);
}
