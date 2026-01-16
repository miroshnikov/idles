<?php

namespace Idles;

/**
 * Always returns `true`
 * 
 * @param mixed ...$args
 * @return true
 * 
 * @category Util
 * 
 * @alias stubTrue
 */
function T(mixed ...$_): bool
{
    return true;
}
