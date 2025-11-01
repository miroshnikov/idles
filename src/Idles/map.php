<?php

namespace Idles;

function _map(?iterable $collection, ?callable $iteratee = null): iterable
{
    $collection ??= [];
    $iteratee ??= fn ($v) => $v;

    if (\is_array($collection)) {
        $res = [];
        foreach ($collection as $k => $v) {
            $res[$k] = $iteratee($v, $k, $collection);
        }
        return $res;
    }

    return new class ($collection, $iteratee) extends \IteratorIterator
    {
        public function __construct(\Iterator $it, callable $iteratee)
        {
            parent::__construct($it);
            $this->iteratee = $iteratee;
        }

        #[\ReturnTypeWillChange]
        public function current()
        {
            return ($this->iteratee)(parent::current(), $this->key(), $this);
        }

        private $iteratee;
    };
}

function map(...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (callable $iteratee, ?iterable $collection) => _map($collection, $iteratee)
    )(...$args);
}

function mapValues(...$args)
{
    return map(...$args);
}
