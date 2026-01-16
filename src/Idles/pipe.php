<?php

namespace Idles;

/**
 * Left-to-right function composition. The first argument may have any arity; the remaining arguments must be unary.
 * 
 * @param callable ...$funcs
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
function pipe(callable ...$funcs): callable
{
    if (empty($funcs)) {
        return fn($arg) => $arg;
    }
    $first = \array_shift($funcs);
    return \array_reduce($funcs, fn($pipe, $f) => fn(...$args) => $f($pipe(...$args)), $first);
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
