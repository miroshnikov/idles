<?php

/**
 * Converts the first character of string to upper case and the remaining to lower case.
 * 
 * @param string 
 * 
 * @return string
 */

namespace Idles;

function capitalize(string $string): string
{
    return \mb_ucfirst(\mb_strtolower($string));
}
