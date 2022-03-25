<?php

namespace Idles;

function keys(?iterable $record): iterable
{
    $record ??= [];

    if (\is_array($record)) {
        return \array_keys($record);
    }

    return new Iterators\ValuesIterator(
        new class ($record) extends \IteratorIterator {
            public function __construct($i)
            {
                parent::__construct($i);
            }

            #[\ReturnTypeWillChange]
            public function current()
            {
                return $this->getInnerIterator()->key();
            }
        }
    );
}
