<?php

namespace Idles;

function indexOfPlaceholder(array $args): int 
{
    foreach ($args as $i => $arg) {
        if (isPlaceholder($arg)) {
            return $i;
        }
    }
    return -1;
}

function _curry(callable $f, bool $right, ?int $arity = null): callable
{
    $arity ??= (new \ReflectionFunction($f))->getNumberOfParameters();
    $curried = function (...$previous) use ($f, $arity, &$curried, $right) {
        return function (...$current) use ($f, $arity, $previous, $curried, $right) {
            $from = 0;
            while (!empty($current) && ($i = indexOfPlaceholder(\array_slice($previous, $from))) >= 0) {
                $previous[$from+$i] = \array_shift($current);
                $from += $i + 1;
            }
            $args = $right ? [...$current, ...$previous] : [...$previous, ...$current];
            return \count(\array_filter($args, fn ($arg) => !isPlaceholder($arg))) >= $arity ? 
                $f( ...\array_slice($args, 0, $arity) ) : 
                $curried(...$args);
        };
    };
    return $curried();
}


function curry(callable $f): callable
{
    return _curry($f, false);
}

function curryRight(callable $f): callable
{
    return _curry($f, true);
}


function curryN(...$args): callable
{
    return curry(fn (int $arity, callable $f) => _curry($f, false, $arity), 2)(...$args);
}

function curryRightN(...$args): callable
{
    return curry(fn (int $arity, callable $f) => _curry($f, true, $arity), 2)(...$args);
}
