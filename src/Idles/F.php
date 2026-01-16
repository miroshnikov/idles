<?php

namespace Idles;

/**
 * Always returns `false`
 * 
 * @param mixed ...$args
 * @return false
 * 
 * @category Util
 * 
 * @alias stubFalse
 */
function F(mixed ...$_): bool
{
    return false;
}

