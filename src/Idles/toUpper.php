<?php

namespace Idles;

/**
 * Converts string to upper case.
 * 
 * @param string $string
 * @return string
 * 
 * @category String
 */
function toUpper(string $string): string
{
    return \mb_strtoupper($string);
}
