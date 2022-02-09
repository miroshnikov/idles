<?php

namespace Idles;

function juxt(array $iteratees): callable
{
    return fn(...$args) => \array_reduce($iteratees, fn($res, $f) => \array_merge($res, [$f(...$args)]), []);
}
