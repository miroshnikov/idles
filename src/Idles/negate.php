<?php

namespace Idles;

function negate(callable $predicate): callable
{
    return curryN(
        arity($predicate),
        fn (...$args) => !$predicate(...$args)   
    );
}

function complement(callable $predicate): callable
{
    return negate($predicate);
}
