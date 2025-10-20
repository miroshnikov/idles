<?php

namespace Idles;

function arity(callable $fn): int
{
    $reflection = new \ReflectionFunction($fn);
    return 
        isset($reflection->getStaticVariables()['arity']) ? 
            $reflection->getStaticVariables()['arity'] - (\count($reflection->getStaticVariables()['previous'] ?? [])) : 
            $reflection->getNumberOfParameters();
}
