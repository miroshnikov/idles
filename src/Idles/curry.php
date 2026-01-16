<?php

namespace Idles;

/**
 * `\Idles\_` const may be used as a placeholder.
 * 
 * @param callable $fn
 * @return callable
 * 
 * @example ```
 *   use const \Idles\_;
 *   $abc = fn ($a, $b, $c) => $a.$b.$c;
 *   curry($abc)('a')('b')('c'); // 'abc'
 *   curry($abc)(_, 'b')(_, 'c')('a'); // 'abc'
 * ```
 * 
 * @see partial() 
 * @see curryRight()
 * 
 * @category Function
 */
function curry(callable $fn): callable
{
    return _curry($fn, false);
}

/**
 * Curry with fixed arity. `\Idles\_` const may be used as a placeholder.
 * 
 * @param int $arity
 * @param callable $fn
 * @return callable
 * 
 * @example ```
 *  $sum = fn (int ...$nums) => \array_sum($nums);
 *  curryN(2, $sum)(2)(3); // 5
 * ```
 * 
 * @category Function
 */
function curryN(mixed ...$args): callable
{
    return curry(fn (int $arity, callable $fn) => _curry($fn, false, $arity))(...$args);
}

/**
 * Like `curry` but arguments are prepended.
 * 
 * @param callable $f
 * @return callable
 * 
 * @example ```
 *   $abc = fn ($a, $b, $c) => $a.$b.$c;
 *   curryRight($abc)('c')('b')('a'); // 'abc'
 * ```
 * 
 * @category Function
 */
function curryRight(callable $f): callable
{
    return _curry($f, true);
}

/**
 * Like `curryN` but arguments are prepended.
 * 
 * @param int $arity
 * @param callable $f
 * @return callable
 * 
 * @example ```
 *   $join = fn (string ...$strings) => \implode(',', $strings);
 *   curryRightN(3, $join)('c')('b')('a'); // a,b,c
 * ```
 * 
 * @category Function
 */
function curryRightN(mixed ...$args): callable
{
    return curry(fn (int $arity, callable $f) => _curry($f, true, $arity))(...$args);
}



/** 
 * @internal 
 * @ignore
 * 
 * @param array<int,mixed> $args
 */
function indexOfPlaceholder(array $args): int 
{
    foreach ($args as $i => $arg) {
        if (isPlaceholder($arg)) {
            return $i;
        }
    }
    return -1;
}

/** 
 * @internal 
 * @ignore
 */
function _curry(callable $f, bool $right, ?int $arity = null): callable
{
    $arity ??= arity($f);
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
