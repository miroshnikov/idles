<?php

namespace Idles;

/** 
 * @internal 
 * @ignore
 */
function arity(callable $fn): int
{
    if (\is_a($fn, '\Closure') || \is_string($fn)) {
        $reflection = new \ReflectionFunction($fn);
        return 
            isset($reflection->getStaticVariables()['arity']) ? 
                $reflection->getStaticVariables()['arity'] - 
                    (\count(\array_filter($reflection->getStaticVariables()['previous'] ?? [], fn ($arg) => !isPlaceholder($arg)))) : 
                $reflection->getNumberOfParameters();
    }
    if (\is_array($fn) && \count($fn) == 2) {
        $reflection = new \ReflectionMethod($fn[0], $fn[1]);
        return $reflection->getNumberOfParameters();
    }

    if (\is_object($fn)) {
        $reflection = new \ReflectionClass($fn::class);
        if ($reflection->hasMethod('__invoke')) {
            return $reflection->getMethod('__invoke')->getNumberOfParameters();
        }
    }

    throw new \Exception("Can't get arity of ".$fn);
}
