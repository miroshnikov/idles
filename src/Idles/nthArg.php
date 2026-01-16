<?php

namespace Idles;

/**
 * Returns a function which returns its `$nth` argument.
 *
 * @param int $n
 * @return callable
 * 
 * @example ```
 *   nthArg(1)('a', 'b', 'c');  // b
 *   nthArg(-1)('a', 'b', 'c'); // c
 * ```
 * 
 * @category Function
 * 
 * @see rearg()
 */
function nthArg(mixed ...$args)
{
   static $arity = 1;
   return curryN($arity, fn (int $n) => fn (...$args) => nth($n, $args))(...$args);
}