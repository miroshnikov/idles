<?php

namespace Idles;

function cond(array $pairs): callable
{
    return function (...$args) use ($pairs) {
        foreach ($pairs as [$predicate, $func]) {
            if ($predicate(...$args)) {
                return $func(...$args);
            }
        }
        return null;
    };
}
