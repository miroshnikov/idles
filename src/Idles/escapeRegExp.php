<?php

namespace Idles;

/**
 * Escapes regular expression.
 * 
 * @param string $s
 * @return string
 * 
 * @category String
 */
function escapeRegExp(string $s): string
{
    return \preg_quote($s);
}
