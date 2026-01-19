<?php

namespace Idles;

/**
 * Left-to-right function composition. The first argument may have any arity; the remaining arguments must be unary.
 * 
 * @param callable ...$fns
 * @return callable
 * 
 * @example ```
 *    pipe('\trim', '\strtoupper')(' hello '); // 'HELLO'
 * ```
 * 
 * @category Function
 * 
 * @see flow()
 * @see compose()
 */
function pipe(callable ...$fns): callable
{
    if (empty($fns)) {
        return fn($arg) => $arg;
    }
    $first = \array_shift($fns);
    return \array_reduce($fns, fn($pipe, $f) => fn(...$args) => $f($pipe(...$args)), $first);
}

/**
 * Left-to-right function composition. The first argument may have any arity; the remaining arguments must be unary.
 * 
 * @param array<callable> $funcs
 * @return callable
 * 
 * @category Function
 * 
 * @see pipe()
 * @see compose()
 */
function flow(array $funcs): callable
{
    return pipe(...flattenDepth(\PHP_INT_MAX, $funcs));
}
