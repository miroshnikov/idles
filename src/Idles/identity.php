<?php

namespace Idles;

/**
 * Returns the first argument it receives.
 * 
 * @template T of mixed
 * @param T $value
 * @return T
 * 
 * @category Util
 * 
 * @see always()
 */
function identity(mixed $value)
{
    return $value;
}

