<?php

namespace Idles;

function _slice(?iterable $collection, int $start = 0, ?int $end = null): iterable
{
    if (!$collection) {
        return [];
    }
    
    if (($start < 0 || $end < 0) && !\is_array($collection)) {
        $collection = collect($collection);
    }

    if (\is_array($collection)) {
        $length = \count($collection);
        $start = $start >= 0 ? $start : \max(0, $length + $start);
        $end = $end ?? $length;
        $end = \max(0, $end >= 0 ? $end - $start : $length + $end - 1);
        return \array_slice($collection, $start, $end);
    }

    return new class($collection, $start, $end) extends \IteratorIterator
    {
        public function __construct($it, $start, $end)
        {
            parent::__construct($it);
            $this->start = $start;
            $this->end = $end;
        }
        public function rewind(): void
        {
            parent::rewind();
            $this->i = 0;
            while ($this->i < $this->start) {
                $this->next();
            }
        }
        public function next(): void
        {
            parent::next();
            $this->i++;
        }
        public function key(): int
        {
            return $this->i - $this->start;
        }
        public function valid(): bool
        {
            $valid = parent::valid();
            if (\is_null($this->end)) {
                return $valid;
            }
            return $valid ? $this->i < $this->end : false;
        }

        private int $i = 0;
        private ?int $start = 0;
        private ?int $end = 0;
    };
}

function slice(...$args)
{
    return curryN(3, 
        fn (int $start, ?int $end, ?iterable $collection) => _slice($collection, $start, $end)
    )(...$args);
}
