<?php

namespace Idles\Iterators;

class MapRecursiveIterator extends \IteratorIterator implements \RecursiveIterator
{
    use MapCurrent;

    public function __construct(\Iterator $it, callable $iteratee)
    {
        parent::__construct($it);
        $this->iteratee = $iteratee;
    }

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

    private $iteratee;
}
