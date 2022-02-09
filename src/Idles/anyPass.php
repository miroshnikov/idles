<?php

namespace Idles;

function anyPass(array $predicates): callable
{
    return curryN(
        \max(map('\Idles\size', $predicates)), 
        function (...$args) use ($predicates): bool {
            foreach ($predicates as $f) {
                if ($f(...$args)) {
                    return true;
                }
            }
            return false;
        }
    );
}

function overSome(array $predicates): callable
{
    return anyPass($predicates);
}
