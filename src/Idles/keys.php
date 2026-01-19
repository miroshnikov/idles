<?php

namespace Idles;

/**
 * Returns an indexed iterable of keys in `$record`.
 * 
 * @param ?iterable<string,mixed> $record
 * @return iterable<string>
 * 
 * @example ```
 *   keys([ 'a'=> 1, 'b'=> 2, 'c'=> 3 ]); // ['a', 'b', 'c']
 * ```
 * 
 * @category Record
 * 
 * @see values()
 * 
 * @idles-lazy
 */
function keys(?iterable $record): iterable
{
    $record ??= [];

    if (\is_array($record)) {
        return \array_keys($record);
    }

    return new Iterators\ValuesIterator(
        new class ($record) extends \IteratorIterator {
            public function __construct(\Traversable $i)
            {
                parent::__construct($i);
            }

            #[\ReturnTypeWillChange]
            public function current()
            {
                return $this->getInnerIterator()->key();
            }
        }
    );
}
