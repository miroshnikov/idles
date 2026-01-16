<?php

namespace Idles;

/**
 * Returns the `$offset` element. If `$offset` is negative the element at index length + `$offset` is returned.
 * 
 * @param int $offset
 * @param ?iterable<mixed> $collection
 * @return mixed
 * 
 * @example ```
 *   $list = ['foo', 'bar', 'baz', 'quux'];
 *   nth(1, $list); // 'bar'
 *   nth(-1, $list); // 'quux'
 *   nth(99, $list); // null
 * ```
 * 
 * @category Function
 * 
 * @see prop()
 */
function nth(mixed ...$args)
{
   static $arity = 2;
   return curryN($arity, 
      function (int $offset, ?iterable $collection) {
         $l = collect($collection);
         return $offset >= 0 ? 
            ($offset >= \count($l) ? null : $l[$offset]) :
            (\abs($offset) > \count($l) ? null : $l[\count($l) + $offset]);
      }
   )(...$args);
}