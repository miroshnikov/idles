<?php

namespace Idles;

class Placeholder
{
}

const _ = new Placeholder();

/** 
 * @internal 
 * @ignore
 */
function isPlaceholder($value): bool
{
    return \is_a($value, '\Idles\Placeholder');
}
