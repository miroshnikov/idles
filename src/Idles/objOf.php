<?php

namespace Idles;

/**
 * Creates an array containing a single `key => value` pair.
 * 
 * @param string $key 
 * @param mixed $value
 * @return array{string: mixed}
 * 
 * @example ```
 *   $matchPhrases = compose(
 *       objOf('must'),
 *       map(objOf('match_phrase'))
 *   );
 *   $matchPhrases(['foo', 'bar', 'baz']);
 *   // ["must" => [["match_phrase" => 'foo'], ["match_phrase" => 'bar'], ["match_phrase" => 'baz']]]
 * ```
 * 
 * @category Record
 */
function objOf(mixed ...$args)
{
    static $arity = 2;
    return curryN($arity, fn (string $key, $value): array => [$key => $value])(...$args);
}
