<?php

namespace Idles;

/**
 * Converts `string` to kebab case.
 * 
 * @param string $string
 * @return string
 * 
 * @example ```
 *  kebabCase('fooBar'); // foo-bar
 * ```
 * 
 * @category String
 */
function kebabCase(string $string): string
{
    return pipe(
        replace('/(?<!^)(?<![A-Z])(?=[A-Z])/', '-'),
        toLower(...),
        replace('/[^a-z0-9]+/', '-'),
        trim('-')
    )($string);
}
