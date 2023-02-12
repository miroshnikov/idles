<?php

namespace Idles;

function _without(?iterable $collection, ...$values): iterable
{
    $collection ??= [];

    if (\is_array($collection)) {
        return \array_values( \array_filter($collection, fn ($v) => !\in_array($v, $values)) );
    }

    return new \Idles\Iterators\ValuesIterator(
        new class($collection, $values) extends \FilterIterator {
            public function __construct($it, $exclude) 
            {
                parent::__construct($it);
                $this->exclude = $exclude;
            }
    
            public function accept(): bool
            {
                return !\in_array($this->getInnerIterator()->current(), $this->exclude);
            }
            private $exclude;
        }
    );
}

function without(...$args)
{
    return curryN(2, 
        fn (array $values, ?iterable $collection) => _without($collection, ...$values)
    )(...$args);
}
