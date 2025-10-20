<?php

namespace Idles;

function nothing(): Optional
{
    return new class implements Optional
    {
        public function isPresent(): bool 
        {
            return false;
        }

        function isEmpty(): bool 
        {
            return true;
        }

        public function get() 
        {
            throw new \RuntimeException("Illegal get() call on None");
        }

        function orElse($default) 
        {
            return $default;
        }

        public function orElseThrow(\Exception $e = new \Exception('No value on None')) 
        {
            throw $e;
        }

        public function map(callable $f): Optional 
        {
            return nothing();
        }

        public function flatMap(callable $f): Optional
        {
            return nothing();
        }

        public function filter(callable $predicate): Optional   
        {
            return nothing();
        }
    };
}