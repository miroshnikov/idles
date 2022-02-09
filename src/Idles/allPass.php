<?php

namespace Idles;

function allPass(array $predicates): callable
{
    return curryN(
        \max(map('\Idles\size', $predicates)), 
        function (...$args) use ($predicates): bool {
            foreach ($predicates as $f) {
                if (!$f(...$args)) {
                    return false;
                }
            }
            return true;
        }
    );
}

function overEvery(array $predicates): callable
{
    return allPass($predicates);
}
