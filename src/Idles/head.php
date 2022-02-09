<?php

namespace Idles;

function head(?iterable $collecton)
{
    if ($collecton) {
        foreach ($collecton as $first) {
            return $first;
        }
    }
    return null;
}

function first(?iterable $collecton)
{
    return head($collecton);
}