<?php

namespace Idles;

/**
 * Creates a function that invokes `$fn` with `$partials` prepended to the arguments. `\Idles\_` const may be used as a placeholder.
 * 
 * @param callable $fn
 * @param array<mixed> $partials
 * @return callable
 * 
 * @example ```
 *   use const \Idles\_;
 *   $abcd = fn ($a, $b, $c, $d) => $a.$b.$c.$d;
 *   partial($abcd, ['a', _, 'c'])('b', 'd'); // 'abcd'
 * ```
 * 
 * @category Function
 * 
 * @see curry()
 * @see partialRight()
 */
function partial(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn (callable $fn, array $partials) => _partial($fn, ...$partials))(...$args);
}

/**
 * Like partial but `$partials` are __appended__.
 * 
 * @param callable $fn
 * @param array<mixed> $partials
 * @return callable
 * 
 * @example ```
 *   use const \Idles\_;
 *   $abcd = fn ($a, $b, $c, $d) => $a.$b.$c.$d;
 *   partialRight($abcd, ['b', _, 'd'])('a', 'c')); // 'abcd'
 * ```
 * 
 * @category Function
 * 
 * @see curry()
 * @see partial()
 */
function partialRight(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn (callable $func, array $partials) => _partialRight($func, ...$partials))(...$args);
}


/** 
 * @internal 
 * @ignore
 * 
 * @param array<mixed> $partials
 */
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

/** 
 * @internal 
 * @ignore
 * 
 * @param array<mixed> $partials
 */
function _partialRight(callable $func, ...$partials): callable
{
    return function (...$args) use ($func, $partials) {
        $from = length($partials);
        while (($i = findLastIndexFrom(fn ($arg) => \Idles\isPlaceholder($arg), $from, $partials)) >= 0) {
            $partials[$i] = \array_pop($args);
            $from = $i + 1;
        }
        return $func(...\array_merge($args, $partials));
    };
}