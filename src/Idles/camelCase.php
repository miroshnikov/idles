<?php

/**
 * Converts string to camel case.
 * 
 * @param string 
 * 
 * @return string
 */

namespace Idles;

function camelCase(string $string): string
{
    return join('',
        useWith(
            '\Idles\merge',
            ['\Idles\identity', map('\Idles\capitalize')]
        )(...splitAt(1, words('[a-z0-9]+', toLower($string))))
    );
}
