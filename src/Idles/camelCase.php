<?php

namespace Idles;

/**
 * Converts string to camel case.
 * 
 * @param string $string
 * @return string
 * 
 * @example ```
 *   camelCase('--foo-bar--');  // fooBar
 * ```
 * 
 * @category String
 */
function camelCase(string $string): string
{
    return \Idles\join('',
        useWith(
            concat(...),
            [identity(...), map(capitalize(...))]
        )(...splitAt(1, words('[a-z0-9]+', toLower($string))))
    );
}
