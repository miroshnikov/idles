<?php

namespace Idles;

/**
 * Sorts `$collection` in ascending order according to `$comparators`.
 * 
 * @param array<callable(mixed $value):mixed> $iteratees 
 * @param ?iterable $collection
 * @return array<mixed>
 * 
 * @example ```
 *  $users = [
 *      [ 'user' => 'fred',   'age' => 48 ],
 *      [ 'user' => 'barney', 'age' => 36 ],
 *      [ 'user' => 'fred',   'age' => 40 ],
 *      [ 'user' => 'barney', 'age' => 34 ]
 *  ];
 *  sortBy([property('user'), property('age')], $users);
 *  // [
 *  //     [ 'user' => 'barney', 'age' => 34 ],
 *  //     [ 'user' => 'barney', 'age' => 36 ],
 *  //     [ 'user' => 'fred',   'age' => 40 ],
 *  //     [ 'user' => 'fred',   'age' => 48 ]
 *  // ]
 * ```
 * 
 * @category Collection
 * 
 * @see orderBy
 */
function sortBy(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        fn (array $iteratees, ?iterable $collection) => orderBy($iteratees, [], $collection)
    )(...$args);
}
