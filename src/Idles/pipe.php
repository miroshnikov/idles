<?php

namespace Idles;

function pipe(callable ...$funcs): callable
{
    if (empty($funcs)) {
        return fn($arg) => $arg;
    }
    $first = \array_shift($funcs);
    return \array_reduce($funcs, fn($pipe, $f) => fn(...$args) => $f($pipe(...$args)), $first);
}

function flow(array $funcs): callable
{
    return pipe(...flattenDeep($funcs));
}
