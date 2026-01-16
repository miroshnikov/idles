<?php

namespace Idles;

/**
 * Applies a list of functions to a list of values.
 * 
 * @param array<callable> $iteratees
 * @return callable(mixed...): array<mixed>
 * 
 * @example ```
 *   juxt([\max(...), \min(...)])(1,2,3,4); // [4,1]
 *   $isOdd = fn ($n) => $n % 2;
 *   juxt([filter($isOdd), remove($isOdd)])([1,2,3,4,5,6,7,8,9]);
 *   // [[1,3,5,7,9], [2,4,6,8]]
 * ```
 * 
 * @category Function
 * 
 * @see useWith()
 * @see on()
 * @see applySpec()
 * @see ap()
 */
function juxt(array $iteratees): callable
{
    return fn (...$args) => \array_reduce($iteratees, fn($res, $f) => \array_merge($res, [$f(...$args)]), []);
}
