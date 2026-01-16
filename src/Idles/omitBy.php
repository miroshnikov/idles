<?php

namespace Idles;

/**
 * The opposite of `pickBy`. Returns properties of `$record` that $predicate returns `falsey` for.
 * 
 * @param callable(mixed $value, string $key):bool $predicate
 * @param ?iterable<string,mixed> $collection
 * @return iterable<string,mixed>
 * 
 * @example ```
 *   omitBy(unary('\is_int'), ['a' => 1, 'b' => '2', 'c' => 3]); // ['b' => '2']
 * ```
 * 
 * @category Record
 * 
 * @see without()
 * @see omit()
 */
function omitBy(mixed ...$args)
{
   static $arity = 2;
   return curryN($arity, 
      fn (callable $predicate, ?iterable $collection) => pickBy(negate($predicate), $collection)
   )(...$args);
}
