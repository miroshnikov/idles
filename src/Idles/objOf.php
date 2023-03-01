<?php

namespace Idles;

function objOf(...$args)
{
    return curryN(
        2,
        fn (string $key, $value): array => [$key => $value]
    )(...$args);
}
