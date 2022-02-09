<?php

namespace Idles;

function toPath(/*string|int|array*/ $value): array
{
    if (\is_array($value)) {
        return $value;
    }
    if (\is_string($value)) {
        $pattern = '/\w+|\[([\'"]?)([^\1]+?)\1\]/';
        $matches = [];
        $path = [];
        $offset = 0;
        while (preg_match($pattern, $value, $matches, \PREG_OFFSET_CAPTURE, $offset)) {
            $offset = $matches[0][1] + strlen($matches[0][0]);
            $path[] = last($matches)[0];
        }
        return $path;
    }
    return [(string)$value];
}
