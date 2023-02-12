<?php

namespace Idles\Iterators;

class MapRecursiveIterator extends \IteratorIterator
{
    use MapCurrent;

    public function __construct(\Iterator $it, callable $iteratee)
    {
        parent::__construct($it);
        $this->iteratee = $iteratee;
    }

    private $iteratee;
}