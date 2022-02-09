<?php

namespace Idles;

function unary(callable $fn): callable
{
    return ary(1, $fn);
}
