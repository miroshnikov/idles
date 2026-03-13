<?php

namespace Idles;

/**
 * Converts the first character of string to lower case.
 * 
 * @param string $string
 * @return string
 * 
 * @category String
 * 
 * @see toLower()
 * @see upperFirst()
 */
function lowerFirst(string $string): string
{
    return \mb_lcfirst($string);
}
