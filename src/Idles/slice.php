<?php

namespace Idles;

/**
 * Returns a slice of iterable or string from `$start` up to, but not including `$end`.
 * 
 * @template T of iterable<mixed>|string
 * @param int $start
 * @param ?int $end
 * @param T|null $collection
 * @return T
 * 
 * @category Array
 * 
 * @see take()
 * @see takeRight()
 * @see drop()
 * @see dropRight()
 * @see head()
 * @see last()
 */
function slice(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn (int $start, ?int $end, iterable|null|string $collection) => _slice($collection, $start, $end)
    )(...$args);
}

/** 
 * @internal 
 * @ignore
 * 
 * @param iterable<mixed>|null|string $collection
 * @return iterable<int,mixed>|string
 */
function _slice(iterable|null|string $collection, int $start = 0, ?int $end = null): iterable|string
{
    if (!$collection) {
        return [];
    }

    if (\is_string($collection)) {
        return \mb_substr($collection, $start, $end);
    }
    
    if (($start < 0 || $end < 0) && !\is_array($collection)) {
        $collection = collect($collection);
    }

    if (\is_array($collection)) {
        $length = \count($collection);
        $start = $start >= 0 ? $start : \max(0, $length + $start);
        $end = $end ?? $length;
        $end = \max(0, $end >= 0 ? $end - $start : $length + $end - 1);
        return \array_values(\array_slice($collection, $start, $end));
    }

    return new class($collection, $start, $end) extends \IteratorIterator
    {
        public function __construct(\Traversable $it, private ?int $start, private ?int $end)
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
    };
}
