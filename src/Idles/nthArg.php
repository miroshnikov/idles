<?php

namespace Idles;

function nthArg(...$args)
{
   return curryN(1, 
      fn (int $n) => fn (...$args) => nth($n, $args)
   )(...$args);
}