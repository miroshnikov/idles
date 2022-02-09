<?php

namespace Idles;

function negate(callable $predicate): callable
{
    return fn (...$args) => !$predicate(...$args);
}

function complement(callable $predicate): callable
{
    return negate($predicate);
}
