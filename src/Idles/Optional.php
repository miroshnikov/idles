<?php

namespace Idles;

/**
 * Maybe/Option monad (container) which may or may not contain a non-null value.
 * 
 * @category Util
 * 
 * @see just()
 * @see nothing()
 */
interface Optional
{
    /**
     * @return bool true if not empty
     */
    public function isPresent(): bool;
    /**
     * @return bool true if empty
     */
    public function isEmpty(): bool;
    /**
     * Returns value, throw exception if empty
     */
    public function get(): mixed;
    /**
     * Returns the contained value if the optional is nonempty or `$default`
     */
    public function orElse(mixed $default): mixed;
    /**
     * Returns the contained value, if present, otherwise throw an exception
     */
    public function orElseThrow(\Exception $e = new \Exception('No value on None')): mixed;
    /**
     * If a value is present, apply the `$fn` to it, and if the result is non-null, return an Optional describing the result
     */
    public function map(callable $fn): Optional;
    /**
     * Use instead of map if $f returns Optional
     */
    public function flatMap(callable $fn): Optional;
    /**
     * If a value is present and matches the `$predicate`, return an Optional with the value, otherwise an empty Optional.
     */
    public function filter(callable $predicate): Optional;
}
