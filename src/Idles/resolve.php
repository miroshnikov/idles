<?php

namespace Idles;

/**
 * Adds new properties to `$record` using `$resolvers`.
 * 
 * @param array<string,callable(array<string,mixed>):mixed> $resolvers
 * @param array<string,mixed> $record
 * @return array<string,mixed>
 * 
 * @example ```
 *  $users = [
 *      [ 'name' => 'Steve', 'surname' => 'Jobs'  ],
 *      [ 'name' => 'Bill',  'surname' => 'Gates' ]
 *  ];
 *  map(
 *      resolve([
 *          'initials' => fn ($r) => $r['name'][0].$r['surname'][0]
 *      ]),
 *      $users
 *  );
 *  // [
 *  //    [ 'name' => 'Steve', 'surname' => 'Jobs',  'initials' => 'SJ' ],
 *  //    [ 'name' => 'Bill',  'surname' => 'Gates', 'initials' => 'BG' ]
 *  // ]
 * ```
 * 
 * @category Collection
 * 
 * @see evolve()
 */
function resolve(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, 
        function (array $resolvers, array $record): array {
            foreach ($resolvers as $path => $fn) {
                $record = setPath($path, $fn($record), $record);
            }
            return $record;
        }
    )(...$args);
}
