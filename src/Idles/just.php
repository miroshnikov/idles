<?php

namespace Idles;

function just($value): Optional
{
    return new class ($value) implements Optional
    {
        function __construct($value) 
        {
            $this->value = $value;
        }

        public function isPresent(): bool 
        {
            return true;
        }
    
        public function isEmpty(): bool 
        {
            return false;
        }
    
        public function get() 
        {
            return $this->value;
        }
    
        public function orElse($default) 
        {
            return $this->value;
        }

        public function orElseThrow(\Exception $e = new \ValueError('No value on None')) 
        {
            return $this->value;
        }

        public function map(callable $f): Optional 
        {
            $value = $f($this->value);
            return $value !== null ? just($value) : nothing();
        }

        public function flatMap(callable $f): Optional
        {
            return $f($this->value);
        }

        public function filter(callable $predicate): Optional
        {
            return $predicate($this->value) ? just($this->value) : nothing();
        }
    
        private $value;
    };
}
