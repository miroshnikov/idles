<?php

namespace Idles;

function setPath(...$args)
{
    return curryN(3, 
        fn ($path, $value, ?iterable $record) => modifyPath($path, fn () => $value, $record)
    )(...$args);
}

function assocPath(...$args)
{
    return setPath(...$args);
}
