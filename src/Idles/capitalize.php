<?php

namespace Idles;

/**
 * Converts the first character of string to upper case and the remaining to lower case.
 * 
 * @param string $string 
 * @return string
 * 
 * @example ```
 *   capitalize('FRED'); // Fred
 * ```
 * 
 * @category String
 */
function capitalize(string $string): string
{
    return \mb_ucfirst(\mb_strtolower($string));
}
