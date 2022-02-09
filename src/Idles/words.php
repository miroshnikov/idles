<?php

/**
 * @param string $pattern doesn't use /pattern/ delimiters
 */

namespace Idles;

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

function words(...$args)
{
    return curryN(2, 
        fn (string $pattern, string $string): array => _words($string, $pattern)
    )(...$args);
}
