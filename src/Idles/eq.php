<?php

namespace Idles;

/**
 * `$a == $b`
 * 
 * @param mixed $a
 * @param mixed $b
 * @return bool
 * 
 * @category Util
 * 
 * @see gt()
 * @see lt()
 * 
 * @alias identical
 */
function eq(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn ($a, $b) => $a == $b)(...$args);
}
