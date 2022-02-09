<?php

namespace Idles;

function compose(callable ...$funcs): callable
{
    return pipe(...\array_reverse($funcs));
}

function flowRight(array $funcs): callable
{
    return pipe(...\array_reverse(flattenDeep($funcs)));
}
