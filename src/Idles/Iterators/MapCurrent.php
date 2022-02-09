<?php

namespace Idles\Iterators;

trait MapCurrent
{
    public function rewind(): void
    {
        parent::rewind();
        $this->mapCurrent();
    }

    public function next(): void
    {
        parent::next();
        $this->mapCurrent();
    }

    #[\ReturnTypeWillChange]
    public function current()
    {
        return $this->curr;
    }

    private function mapCurrent()
    {
        if ($this->valid()) {
            $this->curr = ($this->iteratee)(parent::current(), $this->key(), $this);
        }
    }

    private $curr;
}
