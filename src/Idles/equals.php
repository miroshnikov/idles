<?php

namespace Idles;

/**
 * `$a === $b`
 * 
 * @param mixed $a
 * @param mixed $b
 * @return \Closure|bool
 * 
 * @category Util
 * 
 * @alias isEqual
 */
function equals(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($a, $b) => $a === $b)(...$args);
}
