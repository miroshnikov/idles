<?php

namespace Idles;

/**
 * Converts string to lower case.
 * 
 * @param string $string
 * @return string
 * 
 * @category String
 */
function toLower(string $string): string
{
    return \mb_strtolower($string);
}
