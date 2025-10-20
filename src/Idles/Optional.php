<?php

namespace Idles;

interface Optional
{
    public function isPresent(): bool;
    public function isEmpty(): bool;
    public function get();
    public function orElse($default);
    public function orElseThrow(\Exception $e = new \Exception('No value on None'));
    public function map(callable $f): Optional;
    public function flatMap(callable $f): Optional;
    public function filter(callable $predicate): Optional;
}
