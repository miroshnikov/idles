<?php

namespace Idles;

/**
 * Converts the first character of string to upper case.
 * 
 * @return string
 * 
 * @category String
 * 
 * @see capitalize()
 * @see camelCase()
 * @see lowerFirst()
 */
function upperFirst(string $string): string
{
    return \mb_ucfirst($string);
}
