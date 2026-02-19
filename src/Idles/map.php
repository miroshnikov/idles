<?php

namespace Idles;

/**
 * Run each element in `$collection` through `$iteratee`.
 * 
 * @template T
 * @template U
 * @param callable(T $value, array-key $key, iterable<array-key,T> $collection):U $iteratee
 * @param ?iterable<array-key,T> $collection
 * @return \Closure|iterable<U>
 * 
 * @example ```
 *   map(fn ($n) => $n * $n, [4, 8]); // [16, 64]
 * ```
 * 
 * @category Collection
 * 
 * @see reduce()
 * 
 * @alias mapValues
 * 
 * @idles-lazy
 */
function map(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (callable $iteratee, ?iterable $collection) => _map($collection, $iteratee)
    )(...$args);
}

/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<array-key,mixed> $collection
 * @return iterable<int,mixed>
 */
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
