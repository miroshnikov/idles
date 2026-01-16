<?php

namespace Idles;

/**
 * Converts string to upper case.
 * 
 * @param string $s
 * @return string
 * 
 * @category String
 */
function toUpper(string $s): string
{
    return \mb_strtoupper($s);
}
