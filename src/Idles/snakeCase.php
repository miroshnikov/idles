<?php

namespace Idles;

/**
 * Converts `string` to snake case.
 * 
 * @param string $string
 * @return string
 * 
 * @example ```
 *  snakeCase('fooBar'); // foo_bar
 * ```
 * 
 * @category String
 */
function snakeCase(string $string): string
{
    return pipe(
        replace('/(?<!^)(?<![A-Z])(?=[A-Z])/', '_'),
        toLower(...),
        replace('/[^a-z0-9]+/', '_'),
        trim('_')
    )($string);
}
