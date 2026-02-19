<?php

namespace Idles;

/**
 * Returns result of `!empty($value)`.
 * 
 * @param mixed $value
 * @return bool
 * 
 * @category Logic
 */
function isNotEmpty(mixed $value): bool
{
    return !isEmpty($value);
}
