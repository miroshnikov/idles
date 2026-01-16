<?php

namespace Idles;

/**
 * If string starts with `$target`.
 * 
 * @param string $target
 * @param string $s
 * @return bool
 * 
 * @category String
 * 
 * @see endsWith()
 */
function startsWith(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (string $target, string $s): bool => \strncmp(\mb_substr($s, 0), $target, length($target)) === 0
    )(...$args);
}
