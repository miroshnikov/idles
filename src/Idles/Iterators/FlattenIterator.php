<?php

namespace Idles\Iterators;

class FlattenIterator extends \IteratorIterator implements \RecursiveIterator
{
    public function getChildren(): \RecursiveIterator
    {
        return \is_array($this->current()) ?
            new \RecursiveArrayIterator($this->current()) :
            new FlattenIterator($this->current());
    }

    public function hasChildren(): bool
    {
        return \is_iterable($this->current());
    }
}
