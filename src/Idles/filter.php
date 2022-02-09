<?php

namespace Idles;

function filter(...$args)
{
    return curryN(2, 
        function (callable $predicate, ?iterable $collection): iterable  {
            $collection ??= [];
        
            if (\is_array($collection)) {
                return \array_values(\array_filter($collection, partialRight($predicate, [$collection]), \ARRAY_FILTER_USE_BOTH));
            }
            
            return new Iterators\ValuesIterator(new \CallbackFilterIterator($collection, $predicate));
        }
    )(...$args);
}
