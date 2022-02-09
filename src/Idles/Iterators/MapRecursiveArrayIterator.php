<?php

namespace Idles\Iterators;

class MapRecursiveArrayIterator extends \ArrayIterator implements \RecursiveIterator
{
    use MapCurrent;

    public function __construct(array $array, callable $iteratee)
    {
        parent::__construct($array);
        $this->iteratee = $iteratee;
    }

    public function getChildren(): \RecursiveIterator
    {
        return new \RecursiveArrayIterator($this->current());
    }

    public function hasChildren(): bool
    {
        return \is_array($this->current());
    }

    private $iteratee;
}
