<?php

namespace Idles;

/**
 * Like `sortBy` but allows specifying the sort orders.
 * 
 * @param array<callable(mixed $value):mixed> $iteratees 
 * @param array<'asc'|'desc'> $orders
 * @param ?iterable<mixed> $collection
 * @return array<mixed>
 * 
 * @example ```
 *  $users = [
 *      [ 'user' => 'fred',   'age' => 48 ],
 *      [ 'user' => 'barney', 'age' => 34 ],
 *      [ 'user' => 'fred',   'age' => 40 ],
 *      [ 'user' => 'barney', 'age' => 36 ]
 *  ];
 *  orderBy([property('user'), property('age')], ['asc', 'desc'], $users);
 *  // [
 *  //     [ 'user' => 'barney', 'age' => 36 ],
 *  //     [ 'user' => 'barney', 'age' => 34 ],
 *  //     [ 'user' => 'fred',   'age' => 48 ],
 *  //     [ 'user' => 'fred',   'age' => 40 ]
 *  // ]
 * ```
 * 
 * @category Collection
 * 
 * @see sortBy()
 */
function orderBy(mixed ...$args)
{
    static $arity = 3;
    return curryN($arity,
        fn (array $iteratees, array $orders, ?iterable $collection) => _orderBy($collection, $iteratees, $orders)
    )(...$args);
}

/** 
 * @internal 
 * @ignore
 * 
 * @param ?iterable<mixed> $collection
 * @param array<callable(mixed $value):mixed> $iteratees 
 * @param array<'asc'|'desc'> $orders
 * @return array<mixed>
 */
function _orderBy(?iterable $collection, array $iteratees, array $orders)
{
    $collection = collect($collection ?? []);

    if (!$iteratees) {
        return $collection;
    }

    if (!$collection) {
        return [];
    }

    $orders = \array_pad(
        \array_map(fn ($s) => \preg_match('/desc/i', \trim($s)) ? \SORT_DESC : \SORT_ASC, $orders),
        \count($iteratees),
        \SORT_ASC
    );
    $indexes = \range(0, \count($collection) - 1);
    $arrays = concat(flatMap(fn ($iteratee, $i) => [map($iteratee, $collection), $orders[$i]], $iteratees), [$indexes]);
    \array_multisort(...$arrays);

    return map(fn ($i) => $collection[$i], last($arrays));
}
