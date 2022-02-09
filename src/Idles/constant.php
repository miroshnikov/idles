<?php

namespace Idles;

function constant($value)
{
    return fn () => $value;
}

function always($value)
{
    return constant($value);
}
