<?php

/**
 * @param string $separator doesn't use /pattern/ delimiters
 */

namespace Idles;

function split(...$args)
{
    return curryN(2, 
        fn (string $separator, string $s): array => \mb_split($separator, $s)
    )(...$args);
}
