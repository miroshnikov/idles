<?php

namespace Idles;

/**
 * Returns the first argument it receives.
 * 
 * @param mixed $value
 * @return mixed
 * 
 * @category Util
 * 
 * @see always()
 */
function identity(mixed $value)
{
    return $value;
}

