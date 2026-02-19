<?php

namespace Idles;

/**
 * Escapes regular expression.
 * 
 * @param string $string
 * @return string
 * 
 * @category String
 */
function escapeRegExp(string $string): string
{
    return \preg_quote($string);
}
