<?php

namespace Idles;

/**
 * Returns all but the first element of the iterable or string
 * 
 * @template T of iterable<mixed>|string
 * @param T|null $collection
 * @return T
 * 
 * @category Array
 * 
 * @see head()
 * @see drop()
 */
function tail(iterable|null|string $collection)
{
    return slice(1, null, $collection);
}