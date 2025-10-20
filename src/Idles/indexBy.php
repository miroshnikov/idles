<?php

namespace Idles;

function _indexBy(?iterable $collection, ?callable $iteratee = null): iterable
{
    $collection ??= [];
    $iteratee = unary($iteratee ??= fn($v) => $v);

    if (\is_array($collection)) {
        return \array_combine(\array_map(partialRight($iteratee, $collection), $collection), $collection);
    }

    return new class ($collection, $iteratee) extends \IteratorIterator {
        public function __construct($collection, $iteratee)
        {
            parent::__construct($collection);
            $this->iteratee = $iteratee;
        }

        #[\ReturnTypeWillChange]
        public function key()
        {
            return ($this->iteratee)($this->current());
        }
        private $iteratee;
    };
}

function indexBy(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $iteratee, ?iterable $collection) => _indexBy($collection, $iteratee)
    )(...$args);
}

function keyBy(...$args)
{
    return indexBy(...$args);
}
