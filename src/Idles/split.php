<?php

namespace Idles;

/**
 * Splits string by `$separator` regular expression.
 * 
 * @param string $separator doesn't use /pattern/ delimiters
 * @param string $s
 * @return string[]|false
 * 
 * @example ```
 *  split('\W+', 'aa bb'); // ['aa', 'bb']
 * ```
 * 
 * @category String
 * 
 * @see join()
 */
function split(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn (string $separator, string $s) => \mb_split($separator, $s))(...$args);
}
