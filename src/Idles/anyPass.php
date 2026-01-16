<?php

namespace Idles;

/**
 * Returns a function that checks if its arguments pass any of the `$predicates`.
 * 
 * @param array<callable(mixed...):bool> $predicates
 * @return callable(mixed...):bool a curried function whose arity matches that of the highest-arity predicate
 * 
 * @example ```
 *   $bothStrings = fn (...$args) => all(ary(1, \is_string(...)), $args);
 *   $equal = fn ($a, $b) => $a == $b;
 *   anyPass([$bothStrings, $equal])('a', 'b'); // true
 *   anyPass([$bothStrings, $equal])('1', 2); // false
 *   anyPass([$bothStrings, $equal])(1, 1); // true
 * ```
 * 
 * @category Logic
 * 
 * @see allPass()
 * 
 * @alias overSome
 */
function anyPass(array $predicates): callable
{
    return curryN(
        \max(map(length(...), $predicates)),
        fn (...$args) => \array_any($predicates, fn ($f) => $f(...$args))
    );
}
