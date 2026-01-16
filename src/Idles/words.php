<?php

namespace Idles;

/**
 * Splits string into an array of its words.
 * 
 * @param string $pattern doesn't use /pattern/ delimiters
 * @param string $s
 * @return array<string>
 * 
 * @example ```
 *  words('\w+', 'aa bb cc'); // ['aa', 'bb', 'cc']
 * ```
 * 
 * @category String
 * 
 * @see split
 */
function words(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn (string $pattern, string $s) => _words($s, $pattern))(...$args);
}


/** 
 * @internal 
 * @ignore
 * 
 * @return array<string>
 */
function _words(string $string, string $pattern = '\w+'): array
{
    if (!\mb_ereg_search_init($string, $pattern) || !\mb_ereg_search()) {
        return [];
    }

    if (!($res = \mb_ereg_search_getregs())) {
        return [];
    }

    $matches = [];
    do {
        $matches[] = $res[0];
    } while($res = \mb_ereg_search_regs());
    
    return $matches;
}
