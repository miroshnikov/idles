<?php

/**
 * Applies each transformer function to each argument.
 * 
 * @param callable The function to wrap.
 * 
 * @param array Transformer functions
 * 
 * @return mixed
 */

namespace Idles;

function useWith(...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (callable $fn, array $transformers) =>
            curryN(
                size($transformers),
                fn (...$args) => $fn(...map(fn ($f, $i) => $f($args[$i]), $transformers))
            )

    )(...$args);
}
