<?php

namespace Idles;

/**
 * Makes an descending comparator function out of a function that returns a value that can be compared with <=>.
 *
 * @template T
 * @param callable(T):numeric|string|array $fn
 * @param T $a
 * @param T $b
 * @return -1|0|1 $a < $b | $a == $b | $a > $b
 * 
 * @example ```
 *   $byAge = descend(prop('age'));
 *   $people = [
 *       [ 'name' => 'Emma',    'age' => 70 ],
 *       [ 'name' => 'Peter',   'age' => 78 ],
 *       [ 'name' => 'Mikhail', 'age' => 62 ],
 *   ];
 *   sort($byAge, $people); // Peter, Emma, Mikhail 
 * ```
 * 
 * @category Function
 * 
 * @see ascend()
 * 
 * @phpstan-ignore method.templateTypeNotInParameter
 */
function descend(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity, 
        fn (callable $func, $a, $b) => $func($b) <=> $func($a)
    )(...$args);
}