<?php

namespace Idles;

function stubTrue(...$_): callable
{
    return fn () => true;
}

function T(...$_): callable
{
    return fn () => true;
}
