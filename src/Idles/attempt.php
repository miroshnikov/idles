<?php

namespace Idles;

function attempt(callable $func)
{
    try {
        return $func();
    } catch (\Exception $e) {
        return $e;
    }
}
