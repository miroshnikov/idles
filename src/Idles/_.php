<?php

namespace Idles;

class Placeholder {};

const _ = new Placeholder;

function isPlaceholder($value) {
    return \is_a($value, '\Idles\Placeholder');
}
