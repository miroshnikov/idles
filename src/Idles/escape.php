<?php

namespace Idles;

function escape(string $s)
{
    return \htmlspecialchars($s, \ENT_QUOTES);
}
