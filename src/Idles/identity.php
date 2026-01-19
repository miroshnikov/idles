<?php

namespace Idles;

/**
 * Returns the first argument it receives.
 * 
 * @template T of iterable<mixed>|string
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

