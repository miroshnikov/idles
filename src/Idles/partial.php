<?php

namespace Idles;

function _partial(callable $func, ...$partials): callable
{
    return function (...$args) use ($func, $partials) {
        $from = 0;
        while (($i = findIndexFrom(fn ($arg) => \Idles\isPlaceholder($arg), $from, $partials)) >= 0) {
            $partials[$i] = \array_shift($args);
            $from = $i + 1;
        }
        return $func(...\array_merge($partials, $args));
    };
}

function partial(...$args)
{
    return curryN(2, fn (callable $func, array $partials) => _partial($func, ...$partials))(...$args);
}


function _partialRight(callable $func, ...$partials): callable
{
    return function (...$args) use ($func, $partials) {
        $from = size($partials);
        while (($i = findLastIndexFrom(fn ($arg) => \Idles\isPlaceholder($arg), $from, $partials)) >= 0) {
            $partials[$i] = \array_pop($args);
            $from = $i + 1;
        }
        return $func(...\array_merge($args, $partials));
    };
}

function partialRight(...$args)
{
    return curryN(2, fn (callable $func, array $partials) => _partialRight($func, ...$partials))(...$args);
}
