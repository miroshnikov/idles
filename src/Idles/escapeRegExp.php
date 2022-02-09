<?php

namespace Idles;

function escapeRegExp(string $s): string
{
    return \preg_quote($s);
}
