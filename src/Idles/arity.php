<?php

namespace Idles;

function arity(callable $fn): int
{
    $reflection = new \ReflectionFunction($fn);
    return 
        \is_array($reflection->getStaticVariables()) && 
        isset($reflection->getStaticVariables()['arity']) ? 
            $reflection->getStaticVariables()['arity'] - (\count($reflection->getStaticVariables()['previous'] ?? [])) : 
            $reflection->getNumberOfParameters();
}
