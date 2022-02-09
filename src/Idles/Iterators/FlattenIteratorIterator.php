<?php

namespace Idles\Iterators;

class FlattenIteratorIterator extends \RecursiveIteratorIterator
{
    public function callHasChildren(): bool
    {
        return $this->getDepth() < $this->getMaxDepth() ? 
            is_iterable($this->current()) : // parent::callHasChildren() returns true for Closure ?
            false;
    }
}
