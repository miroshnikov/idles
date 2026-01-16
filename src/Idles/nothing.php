<?php

namespace Idles;

/**
 * Returns an empty `Optional`.
 * 
 * @return Optional
 * 
 * @example ```
 *  nothing()->map(\strtoupper(...))->orElse('ABC'); // ABC
 * ```
 * @category Util
 * 
 * @see Optional
 * @see just()
 */
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

        public function get(): mixed
        {
            throw new \RuntimeException("Illegal get() call on None");
        }

        function orElse(mixed $default): mixed 
        {
            return $default;
        }

        public function orElseThrow(\Exception $e = new \Exception('No value on None')): mixed
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