<?php

namespace Idles;

/**
 * Returns a function which returns its $nth argument.
 *
 * @param int      $n
 *
 * @return callable
 */

function nthArg(...$args)
{
   return curryN(1, 
      fn (int $n) => fn (...$args) => nth($n, $args)
   )(...$args);
}