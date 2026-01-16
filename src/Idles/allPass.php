<?php

namespace Idles;

/**
 * Returns a function that checks if its arguments pass all `$predicates`.
 * 
 * @param array<callable(mixed...):bool> $predicates
 * @return callable(mixed...):bool a curried function whose arity matches that of the highest-arity predicate
 * 
 * @example ```
 *   $bothStrings = fn (...$args) => all(ary(1, \is_string(...)), $args);
 *   $equal = fn ($a, $b) => $a == $b;
 *   allPass([$bothStrings, $equal])('a', 'b'); // false
 *   allPass([$bothStrings, $equal])('a', 'a'); // true
 *   allPass([$bothStrings, $equal])(1, 1); // false
 * ```
 * 
 * @category Logic
 * 
 * @see anyPass()
 * 
 * @alias overEvery
 */
function allPass(array $predicates): callable
{
    return curryN(
        \max(map(length(...), $predicates)), 
        fn (...$args) => \array_all($predicates, fn ($f) => $f(...$args))
    );
}
