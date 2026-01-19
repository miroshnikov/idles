<?php

namespace Idles;

/**
 * Like `zip` except that it accepts `$iteratee` to specify how grouped values should be combined.
 * 
 * @param callable(mixed $a, mixed $b):mixed $iteratee
 * @param iterable<mixed> $a
 * @param iterable<mixed> $b
 * @return iterable<mixed>
 * 
 * @example ```
 *  $a =  ['a', 'b' ];
 *  $aa = ['AA','BB'];
 *  zipWith(fn ($a,$b) => $a.'='.$b, $a, $aa);  // ["a=AA", "b=BB"]
 * ```
 * 
 * @category Array
 * 
 * @see zip()
 * 
 * @idles-lazy
 * @idles-reindexed
 */
function zipWith(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity,
        fn (callable $iteratee, iterable $a, iterable $b) => _zipWith($iteratee, $a, $b)
    )(...$args);
}


/**
 * @internal 
 * @ignore
 * 
 * @param iterable<iterable<mixed>> $arrays
 * @return iterable<mixed>
 */
function _zipWith(callable $iteratee, iterable ...$arrays): iterable
{
    if (!\count($arrays)) {
        return [];
    }

    if (find(fn ($a) => \is_a($a, '\Iterator'), $arrays) === null) {
        $minLength = \array_reduce($arrays, fn ($min, $a) => \min($min, \count($a)), \PHP_INT_MAX);
        return \array_map($iteratee, ...\array_map(fn ($a) => \array_slice($a, 0, $minLength), $arrays));
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
