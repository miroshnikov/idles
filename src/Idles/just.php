<?php

namespace Idles;

/**
 * Returns an Optional with the specified non-null value
 * 
 * @param mixed $value
 * @return Optional
 * 
 * @example ```
 *   just('abc')->map(\strtoupper(...))->get(); // ABC
 *   just(113)
 *       ->filter(fn($n) => $n > 100)
 *       ->filter(fn($n) => $n < 120)
 *       ->get();    // 113
 * ```
 * 
 * @category Util
 * 
 * @see Optional
 * @see nothing()
 */
function just(mixed $value): Optional
{
    return new class ($value) implements Optional
    {
        function __construct(private mixed $value) 
        {
        }

        public function isPresent(): bool 
        {
            return true;
        }
    
        public function isEmpty(): bool 
        {
            return false;
        }
    
        public function get(): mixed
        {
            return $this->value;
        }
    
        public function orElse(mixed $default): mixed
        {
            return $this->value;
        }

        public function orElseThrow(\Exception $e = new \Exception('No value on None')): mixed
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
    };
}
