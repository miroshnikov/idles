<?php

namespace Idles;

function omitBy(...$args)
{
   return curryN(2, 
      fn (callable $predicate, ?iterable $collection): iterable => pickBy(negate($predicate), $collection)
   )(...$args);
}
