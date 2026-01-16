<?php

namespace Idles;

/**
 * Like SQL `select` statement.
 * 
 * @param array<array-key> $props
 * @param ?iterable<mixed> $collection
 * @return iterable<mixed>
 * 
 * @example ```
 *   $kids =  [
 *       [ 'name' => 'Abby', 'age' => 7, 'hair' => 'blond', 'grade' => 2 ],
 *       [ 'name' => 'Fred', 'age' => 12, 'hair' => 'brown', 'grade' => 7 ]
 *   ];
 *   project(['name', 'grade'], $kids); // [['name' => 'Abby', 'grade' => 2], [ 'name' => 'Fred', 'grade' => 7 ]]
 * ```
 * 
 * @category Record
 * 
 * @see pick()
 * @see pluck()
 * @see props()
 * @see prop()
 */
function project(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity,
        fn (array $props, ?iterable $collection) => map(pick($props), $collection)
    )(...$args);
}