<?php

namespace Idles;

/**
 * Transforms an object by converting the keys to new values.
 * 
 * @template T of array-key
 * @template U of array-key
 * @param callable(T $key):U $iteratee
 * @param ?iterable<array-key,T> $collection
 * @return \Closure|iterable<U>
 * 
 * @example ```
 *   mapKeys(toUpper(...), ['foo' => 1, 'bar' => 2]); // ['FOO' => 1, 'BAR' => 2]
 * ```
 * 
 * @category Record
 * 
 * @see renameKeys()
 * @see rebuild()
 * @see map()
 */
function mapKeys(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        function (callable $iteratee, ?iterable $collection) {
            if (\is_a($collection, '\Iterator')) {
                return new class($collection, $iteratee) extends \IteratorIterator {
                    public function __construct(\Iterator $it, callable $iteratee)
                    {
                        parent::__construct($it);
                        $this->iteratee = $iteratee;
                    }

                    public function key(): mixed
                    {
                        return ($this->iteratee)(parent::key());
                    }

                    private $iteratee;
                };
            }

            $collection = collect($collection);
            return \array_combine(
                \array_map($iteratee, \array_keys($collection)),
                \array_values($collection)
            );
        }
    )(...$args);
}
