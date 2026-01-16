<?php

namespace Idles;

/**
 * Converts string to lower case.
 * 
 * @param string $s
 * @return string
 * 
 * @category String
 */
function toLower(string $s): string
{
    return \mb_strtolower($s);
}
