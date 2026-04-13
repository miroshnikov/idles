<?php

namespace Idles;

/**
 * Resulting function will call each function with input arguments and pass results to `$afterFn`.
 * 
 * @param callable $afterFn
 * @param non-empty-list<callable> $functions
 * @return \Closure
 * 
 * @example ```
 *  $average = converge(divide(...), [sum(...), length(...)]);
 *  $average([1, 2, 3, 4, 5, 6, 7]); // 4
 * ```
 * 
 * @category Function
 * 
 * @see useWith()
 */
function converge(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, function (callable $afterFn, array $functions) {
        static $arity = apply(\max(...), map(arity(...), $functions));
        return curryN($arity,
            fn (...$args) => $afterFn(...(array) map(apply(_, $args), $functions))
        );
    })(...$args);
}
