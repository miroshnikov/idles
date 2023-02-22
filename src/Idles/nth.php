<?php

namespace Idles;

function nth(...$args)
{
   return curryN(2, 
      function (int $offset, ?iterable $collection) {
        $l = collect($collection);
        return $offset >= 0 ? 
            ($offset >= \count($l) ? null : $l[$offset]) :
            (\abs($offset) > \count($l) ? null : $l[\count($l) + $offset]);
      }
   )(...$args);
}