<?php

namespace Idles;

/**
 * Creates a record composed of keys generated from the results of running each element of $collection through $iteratee.
 * 
 * @param callable(mixed):array-key $iteratee
 * @param ?iterable<mixed> $collection
 * @return iterable<mixed>
 * 
 * @example ```
 *  $a = [ [ 'code' => 97 ],  [ 'code' => 100 ] ];
 *  indexBy(fn ($r) => \chr($r['code']), $a); // ['a' => [ 'code' => 97 ], 'd' => [ 'code' => 100 ]]
 * ```
 * 
 * @category Collection
 * 
 * @see groupBy()
 * 
 * @alias keyBy
 */
function indexBy(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $iteratee, ?iterable $collection) => _indexBy($collection, $iteratee)
    )(...$args);
}



/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $collection
 * @return iterable<mixed>
 */
function _indexBy(?iterable $collection, ?callable $iteratee = null): iterable
{
    $collection ??= [];
    $iteratee = unary($iteratee ??= fn($v) => $v);

    if (\is_array($collection)) {
        return \array_combine(\array_map(partialRight($iteratee, $collection), $collection), $collection);
    }

    return new class ($collection, $iteratee) extends \IteratorIterator {
        public function __construct(iterable $collection, private $iteratee)
        {
            parent::__construct($collection);
        }

        #[\ReturnTypeWillChange]
        public function key()
        {
            return ($this->iteratee)($this->current());
        }
    };
}