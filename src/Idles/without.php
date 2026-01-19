<?php

namespace Idles;

/**
 * Returns `$iterable` without `$values`.
 * 
 * @param array<mixed> $values
 * @param ?iterable<mixed> $collection
 * @return iterable<mixed>
 * 
 * @example ```
 *  without([1, 2], [2, 1, 2, 3]);  // [3]
 * ```
 * 
 * @category Record
 * 
 * @see filter()
 * 
 * @idles-lazy
 * @idles-reindexed
 */
function without(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (array $values, ?iterable $collection) => _without($collection, ...$values)
    )(...$args);
}


/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $collection
 * @param array<mixed> $values
 * @return iterable<mixed>
 */
function _without(?iterable $collection, ...$values): iterable
{
    $collection ??= [];

    if (\is_array($collection)) {
        return \array_values( \array_filter($collection, fn ($v) => !\in_array($v, $values)) );
    }

    return new \Idles\Iterators\ValuesIterator(
        new class($collection, $values) extends \FilterIterator {
            /**
             * @param array<mixed> $exclude
             */
            public function __construct($it, private array $exclude) 
            {
                parent::__construct($it);
            }
    
            public function accept(): bool
            {
                return !\in_array($this->getInnerIterator()->current(), $this->exclude);
            }
        }
    );
}
