<?php

namespace Idles;

function _zipWith(callable $iteratee, iterable ...$arrays): iterable
{
    if (find(fn ($a) => \is_a($a, '\Iterator'), $arrays) === null) {
        return \array_map($iteratee, ...$arrays);
    }

    $i = new \MultipleIterator();
    foreach ($arrays as $a) {
        $i->attachIterator(\is_array($a) ? new \ArrayIterator($a) : $a);
    }
    return new class (new Iterators\ValuesIterator($i), $iteratee) extends \IteratorIterator {
        public function __construct($iterator, $iteratee)
        {
            parent::__construct($iterator);
            $this->iteratee = $iteratee;
        }
        #[\ReturnTypeWillChange]
        public function current()
        {
            return ($this->iteratee)(...parent::current());
        }
        private $iteratee;
    };
}

function zipWith(...$args)
{
    return curryN(
        3,
        fn (callable $iteratee, iterable $a, iterable $b) => _zipWith($iteratee, $a, $b)
    )(...$args);
}
