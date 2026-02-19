<?php

namespace Idles;

/**
 * If string starts with `$target`.
 * 
 * @param string $target
 * @param string $string
 * @return \Closure|bool
 * 
 * @category String
 * 
 * @see endsWith()
 */
function startsWith(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (string $target, string $string) => \strncmp(\mb_substr($string, 0), $target, length($target)) === 0
    )(...$args);
}
