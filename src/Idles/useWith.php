<?php

namespace Idles;

/**
 * Applies each transformer function to each argument. Returns a new curried functions.
 * 
 * @param callable $fn The function to wrap.
 * @param array $transformers Transformer functions
 * @return callable
 * 
 * @example ```
 *  $f = useWith(unapply(join(' ')), [toLower(...), toUpper(...)]);
 *  $f('HELLO', 'world!'); // hello WORLD!
 * ```
 * 
 * @category Function
 * 
 * @see ap()
 * @see juxt()
 * @see applySpec()
 * @see on()
 */
function useWith(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $fn, array $transformers) =>
            curryN(
                length($transformers),
                fn (...$args) => $fn(...map(fn ($f, $i) => $f($args[$i]), $transformers))
            )
    )(...$args);
}
