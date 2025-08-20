<?php

namespace Idles;

/**
 * Calls $fn(...$args)
 *
 * @param callable      $fn
 * @param ?iterable     $args
 *
 * @return mixed
 */

function apply(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $fn, ?iterable $args) => $fn(...collect($args))
    )(...$args);
}
