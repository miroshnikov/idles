<?php

namespace Idles;

function once(callable $fn): callable
{
    $called = false;
    $cache = null;
    return function (...$args) use (&$called, &$cache, $fn) {
        if ($called) {
            return $cache;
        }
        $called = true;
        return $cache = $fn(...$args);
    };
}
