<?php

namespace Idles;

function arity(callable $fn): int
{
    $reflection = new \ReflectionFunction($fn);
    return 
        isset($reflection->getStaticVariables()['arity']) ? 
            $reflection->getStaticVariables()['arity'] - 
                (\count(\array_filter($reflection->getStaticVariables()['previous'] ?? [], fn ($arg) => !isPlaceholder($arg)))) : 
            $reflection->getNumberOfParameters();
}
