<?php

namespace Idles;

function omit(...$args)
{
   return curryN(2, 
      fn (array $keys, ?iterable $collection): iterable => omitBy(fn ($_, $key) => \in_array($key, $keys), $collection)
   )(...$args);
}
