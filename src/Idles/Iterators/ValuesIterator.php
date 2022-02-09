<?php

namespace Idles\Iterators;

class ValuesIterator extends \IteratorIterator
{
    public function __construct(\Iterator $it)
    {
        parent::__construct($it);
    }

    public function rewind(): void
    {
        parent::rewind();
        $this->key = 0;
    }

    public function next(): void
    {
        parent::next();
        $this->key++;
    }

    public function key(): int
    {
        return $this->key;
    }

    private int $key = 0;
}