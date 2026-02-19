<p align="center">
    <a href="https://idlephp.tech" target="_blank">
        <img src="https://github.com/miroshnikov/idles/blob/main/docs/assets/logo.png" width="128" />
    </a>
</p>

# IDLES - a PHP functional library
A PHP functional utility library, port of Javascript Lodash/Fp and Ramda libraries to PHP.

All functions are <strong>side-effect free</strong> and <strong>automatically curried</strong>, data is <strong>immutable</strong>.

The iterable collection parameter is usually supplied last to make currying convenient.

<strong>Lazy / delayed evaluation</strong> is supported in functional pipelines.

Go to __[https://idlephp.tech](https://idlephp.tech)__ for more details, documentation and examples.

## Requirements
`PHP 8.4` or higher

## Installation
`composer require miroshnikov/idles`

## Roadmap
> [!NOTE]  
> Idles is currently under active development. 
> Roadmap is to add all methods from Lodash and Ramda libraries and some functional tools.

## Documentation


### [add](https://idlephp.tech/#add)

```php
add($a, $b)
```

<p>Calculates the sum of two numbers.</p>

### [all](https://idlephp.tech/#all)

```php
all($predicate, $collection)
```

<p>Checks if <code>$predicate</code> returns truthy for <strong>all</strong> elements of <code>$collection</code>. Stop once it returns falsey.</p>

### [allPass](https://idlephp.tech/#allPass)

```php
allPass($predicates)
```

<p>Returns a function that checks if its arguments pass all <code>$predicates</code>.</p>

### [always](https://idlephp.tech/#always)

```php
always($value)
```

<p>Returns a function that always returns the given value.</p>

### [any](https://idlephp.tech/#any)

```php
any($predicate, $collection)
```

<p>Checks if <code>$predicate</code> returns truthy for <strong>any</strong> element of <code>$collection</code>. Stops on first found.</p>

### [anyPass](https://idlephp.tech/#anyPass)

```php
anyPass($predicates)
```

<p>Returns a function that checks if its arguments pass any of the <code>$predicates</code>.</p>

### [apply](https://idlephp.tech/#apply)

```php
apply($fn, $args)
```

<p>Calls $fn(...$args)</p>

### [applyTo](https://idlephp.tech/#applyTo)

```php
applyTo($value, $interceptor)
```

<p>Returns the result of <code>$interceptor($value)</code>.</p>

### [ary](https://idlephp.tech/#ary)

```php
ary($n, $fn)
```

<p>Creates a function that invokes <code>$fn</code>, with up to <code>$n</code> arguments, ignoring any additional arguments.</p>

### [ascend](https://idlephp.tech/#ascend)

```php
ascend($fn, $a, $b)
```

<p>Makes an ascending comparator function out of a function that returns a value that can be compared with <code>&lt;=&gt;</code>.</p>

### [attempt](https://idlephp.tech/#attempt)

```php
attempt($fn, $args)
```

<p>Calls <code>$fn</code>, returning either the result or the caught exception.</p>

### [both](https://idlephp.tech/#both)

```php
both($fn1, $fn2)
```

<p>Resulting function returns <code>$fn1(...$args)</code> if it is falsy or <code>$fn2(...$args)</code> otherwise, short-circuited.</p>

### [camelCase](https://idlephp.tech/#camelCase)

```php
camelCase($s)
```

<p>Converts string to camel case.</p>

### [capitalize](https://idlephp.tech/#capitalize)

```php
capitalize($string)
```

<p>Converts the first character of string to upper case and the remaining to lower case.</p>

### [collect](https://idlephp.tech/#collect)

```php
collect($collection)
```

<p>Collects any iterable into array</p>

### [compose](https://idlephp.tech/#compose)

```php
compose(...$fns)
```

<p>Like <code>pipe</code> but invokes the functions from right to left.</p>

### [concat](https://idlephp.tech/#concat)

```php
concat($iterable, $value)
```

<p>Concatinates an iterable with an iterable/value.</p>

### [concatAll](https://idlephp.tech/#concatAll)

```php
concatAll($values)
```

<p>Concatinates an iterable with additional iterables/values</p>

### [cond](https://idlephp.tech/#cond)

```php
cond($pairs)
```

<p>Iterates over <code>$pairs</code> and invokes the corresponding function of the first predicate to return truthy.</p>

### [count](https://idlephp.tech/#count)

```php
count($predicate, $collection)
```

<p>Counts the number of items in <code>$collection</code> matching the <code>$predicate</code></p>

### [countBy](https://idlephp.tech/#countBy)

```php
countBy($iteratee, $collection)
```

<p>Returns an <code>array&lt;result of $iteratee($value), number of times the $iteratee($value) was found in $collection&gt;</code></p>

### [curry](https://idlephp.tech/#curry)

```php
curry($fn)
```

<p><code>\Idles\_</code> const may be used as a placeholder.</p>

### [curryN](https://idlephp.tech/#curryN)

```php
curryN($arity, $fn)
```

<p>Curry with fixed arity. <code>\Idles\_</code> const may be used as a placeholder.</p>

### [curryRight](https://idlephp.tech/#curryRight)

```php
curryRight($f)
```

<p>Like <code>curry</code> but arguments are prepended.</p>

### [curryRightN](https://idlephp.tech/#curryRightN)

```php
curryRightN($arity, $f)
```

<p>Like <code>curryN</code> but arguments are prepended.</p>

### [dec](https://idlephp.tech/#dec)

```php
dec($number)
```

<p>Returns $number - 1</p>

### [defaultTo](https://idlephp.tech/#defaultTo)

```php
defaultTo($default, $value)
```

<p>Returns <code>$value</code> if it is truthy, otherwise <code>$default</code>.</p>

### [descend](https://idlephp.tech/#descend)

```php
descend($fn, $a, $b)
```

<p>Makes an descending comparator function out of a function that returns a value that can be compared with &lt;=&gt;.</p>

### [divide](https://idlephp.tech/#divide)

```php
divide($a, $b)
```

<p>Returns $a / $b</p>

### [drop](https://idlephp.tech/#drop)

```php
drop($n, $collection)
```

<p>Skips the first <code>$n</code> elemens and returns the rest of iterable or string.</p>

### [dropLast](https://idlephp.tech/#dropLast)

```php
dropLast($n, $collection)
```

<p>Skips the last <code>$n</code> elements of iterable or string.</p>

### [each](https://idlephp.tech/#each)

```php
each($iteratee, $collection)
```

<p>Iterates over elements of <code>$collection</code>. Iteratee may exit iteration early by returning <code>false</code>.</p>

### [either](https://idlephp.tech/#either)

```php
either($fn1, $fn2)
```

<p>Resulting function returns <code>$fn1(...$args)</code> if it is truthy or <code>$fn2(...$args)</code> otherwise, short-circuited.</p>

### [eq](https://idlephp.tech/#eq)

```php
eq($a, $b)
```

<p><code>$a == $b</code></p>

### [equals](https://idlephp.tech/#equals)

```php
equals($a, $b)
```

<p><code>$a === $b</code></p>

### [escapeRegExp](https://idlephp.tech/#escapeRegExp)

```php
escapeRegExp($s)
```

<p>Escapes regular expression.</p>

### [evolve](https://idlephp.tech/#evolve)

```php
evolve($transformations, $record)
```

<p>Creates a new record by recursively calling transformation functions with <code>$record</code> properties.</p>

### [F](https://idlephp.tech/#F)

```php
F(...$args)
```

<p>Always returns <code>false</code></p>

### [filter](https://idlephp.tech/#filter)

```php
filter($predicate, $collection)
```

<p>Returns elements <code>$predicate</code> returns truthy for.</p>

### [find](https://idlephp.tech/#find)

```php
find($predicate, $collection)
```

<p>Returns the first element <code>$predicate</code> returns truthy for.</p>

### [findFrom](https://idlephp.tech/#findFrom)

```php
findFrom($predicate, $fromIndex, $collection)
```

<p>Returns the first element <code>$predicate</code> returns truthy for starting from <code>$fromIndex</code>.</p>

### [findIndex](https://idlephp.tech/#findIndex)

```php
findIndex($predicate, $collection)
```

<p>Returns the index of the first element predicate returns truthy for or <code>-1</code> if not found.</p>

### [findIndexFrom](https://idlephp.tech/#findIndexFrom)

```php
findIndexFrom($predicate, $fromIndex, $collection)
```

<p>Returns the index of the first element <code>$predicate</code> returns truthy for starting from <code>$fromIndex</code>.</p>

### [findLastIndex](https://idlephp.tech/#findLastIndex)

```php
findLastIndex($predicate, $collection)
```

<p>Returns the index of the last element predicate returns truthy for, -1 if not found.</p>

### [findLastIndexFrom](https://idlephp.tech/#findLastIndexFrom)

```php
findLastIndexFrom($predicate, $fromIndex, $collection)
```

<p>Returns the index of the last element <code>$predicate</code> returns truthy for starting from <code>$fromIndex</code>.</p>

### [flatMap](https://idlephp.tech/#flatMap)

```php
flatMap($iteratee, $collection)
```

<p>Maps and flattens.</p>

### [flatMapDepth](https://idlephp.tech/#flatMapDepth)

```php
flatMapDepth($iteratee, $depth, $collection)
```

<p>Maps and flattens the mapped results up to <code>$depth</code> times.</p>

### [flatten](https://idlephp.tech/#flatten)

```php
flatten($collection)
```

<p>Flattens iterable a single level deep.</p>

### [flattenDepth](https://idlephp.tech/#flattenDepth)

```php
flattenDepth($depth, $collection)
```

<p>Recursively flatten array up to <code>$depth</code> times.</p>

### [flip](https://idlephp.tech/#flip)

```php
flip($fn)
```

<p>Returns a new curried function with the first two arguments reversed.</p>

### [flow](https://idlephp.tech/#flow)

```php
flow($funcs)
```

<p>Left-to-right function composition. The first argument may have any arity; the remaining arguments must be unary.</p>

### [fromPairs](https://idlephp.tech/#fromPairs)

```php
fromPairs($collection)
```

<p>Creates a new record from a list key-value pairs. The inverse of <code>toPairs</code>.</p>

### [groupBy](https://idlephp.tech/#groupBy)

```php
groupBy($iteratee, $collection)
```

<p>Creates an array composed of keys generated from running each value through <code>$iteratee</code>.</p>

### [gt](https://idlephp.tech/#gt)

```php
gt($a, $b)
```

<p>$a &gt; $b</p>

### [gte](https://idlephp.tech/#gte)

```php
gte($a, $b)
```

<p>$a &gt;= $b</p>

### [has](https://idlephp.tech/#has)

```php
has($key, $record)
```

<p>Checks if <code>$record</code> has <code>$key</code>.</p>

### [hasPath](https://idlephp.tech/#hasPath)

```php
hasPath($path, $record)
```

<p>Checks if <code>$path</code> exists in <code>$record</code>.</p>

### [head](https://idlephp.tech/#head)

```php
head($collecton)
```

<p>Gets the first element of <code>$collecton</code>.</p>

### [identity](https://idlephp.tech/#identity)

```php
identity($value)
```

<p>Returns the first argument it receives.</p>

### [ifElse](https://idlephp.tech/#ifElse)

```php
ifElse($predicate, $onTrue, $onFalse)
```

<p>Resulting function returns <code>$onTrue(...$args)</code> if <code>$predicate(...$args)</code> is truthy or <code>$onFalse(...$args)</code> otherwise.</p>

### [inc](https://idlephp.tech/#inc)

```php
inc($number)
```

<p>Returns <code>$number + 1</code></p>

### [includes](https://idlephp.tech/#includes)

```php
includes($value, $collection)
```

<p>Checks if <code>$value</code> is in iterable/string.</p>

### [includesFrom](https://idlephp.tech/#includesFrom)

```php
includesFrom($value, $fromIndex, $collection)
```

<p>Checks if <code>$value</code> is in iterable/string, starting from <code>$fromIndex</code>.</p>

### [indexBy](https://idlephp.tech/#indexBy)

```php
indexBy($iteratee, $collection)
```

<p>Creates a record composed of keys generated from the results of running each element of $collection through $iteratee.</p>

### [indexOf](https://idlephp.tech/#indexOf)

```php
indexOf($item, $collection)
```

<p>Returns the index of the first occurrence of the item in an iterable or string, else <code>-1</code>.</p>

### [indexOfFrom](https://idlephp.tech/#indexOfFrom)

```php
indexOfFrom($item, $fromIndex, $collection)
```

<p>Returns the index of the first occurrence of the item in an iterable or string, starting from <code>$fromIndex</code>, else <code>-1</code>.</p>

### [intersection](https://idlephp.tech/#intersection)

```php
intersection($array1, $array2)
```

<p>Returns unique values that are included in both arrays.</p>

### [intersectionBy](https://idlephp.tech/#intersectionBy)

```php
intersectionBy($iteratee, $array1, $array2)
```

<p>Like intersection but invokes <code>$iteratee</code> for each element before comparison.</p>

### [intersectionWith](https://idlephp.tech/#intersectionWith)

```php
intersectionWith($comparator, $array1, $array2)
```

<p>Like <code>intersection</code> but invokes <code>$comparator</code> to compare elements.</p>

### [invert](https://idlephp.tech/#invert)

```php
invert($collection)
```

<p>Replaces keys with values. Duplicate keys are overwritten.</p>

### [isEmpty](https://idlephp.tech/#isEmpty)

```php
isEmpty($value)
```

<p>Returns result of <code>empty($value)</code>.</p>

### [isNotEmpty](https://idlephp.tech/#isNotEmpty)

```php
isNotEmpty($value)
```

<p>Returns result of <code>!empty($value)</code>.</p>

### [iterate](https://idlephp.tech/#iterate)

```php
iterate($fn, $value)
```

<p>Returns a generator of <code>$value</code>, <code>$f($value)</code>, <code>$f($f($value))</code> etc.</p>

### [join](https://idlephp.tech/#join)

```php
join($separator, $collection)
```

<p>Joins iterable elements separated by <code>$separator</code>.</p>

### [just](https://idlephp.tech/#just)

```php
just($value)
```

<p>Returns an Optional with the specified non-null value</p>

### [juxt](https://idlephp.tech/#juxt)

```php
juxt($iteratees)
```

<p>Applies a list of functions to a list of values.</p>

### [keys](https://idlephp.tech/#keys)

```php
keys($record)
```

<p>Returns an indexed iterable of keys in <code>$record</code>.</p>

### [last](https://idlephp.tech/#last)

```php
last($collecton)
```

<p>Gets the last element of iterable.</p>

### [lastIndexOf](https://idlephp.tech/#lastIndexOf)

```php
lastIndexOf($item, $collection)
```

<p>Returns the index of the last occurrence of <code>$value</code> in iterable or string, else <code>-1</code>.</p>

### [length](https://idlephp.tech/#length)

```php
length($value)
```

<p>Returns size of a countable, number of parameters of a function, lenght of string or number of properties of an object.</p>

### [lt](https://idlephp.tech/#lt)

```php
lt($a, $b)
```

<p>$a &lt; $b</p>

### [lte](https://idlephp.tech/#lte)

```php
lte($a, $b)
```

<p>$a &lt;= $b</p>

### [map](https://idlephp.tech/#map)

```php
map($iteratee, $collection)
```

<p>Run each element in <code>$collection</code> through <code>$iteratee</code>.</p>

### [memoize](https://idlephp.tech/#memoize)

```php
memoize($fn)
```

<p>Creates a function that memoizes the result of <code>$fn</code>.</p>

### [memoizeWith](https://idlephp.tech/#memoizeWith)

```php
memoizeWith($resolver, $fn)
```

<p>Creates a function that memoizes the result of <code>$fn</code>. <code>$resolver</code> returns map cache key (args[0] by default).</p>

### [merge](https://idlephp.tech/#merge)

```php
merge($left, $right)
```

<p>Merges properties, numeric keys are <strong>replaced</strong>.</p>

### [mergeAll](https://idlephp.tech/#mergeAll)

```php
mergeAll($iterables)
```

<p>Merges properties, numeric keys are <strong>replaced</strong>.</p>

### [mergeDeep](https://idlephp.tech/#mergeDeep)

```php
mergeDeep($left, $right)
```

<p>Merges properties recursively, numeric keys are <strong>replaced</strong>.</p>

### [mergeWith](https://idlephp.tech/#mergeWith)

```php
mergeWith($customizer, $left, $right)
```

<p>Like <code>merge</code> but if a key exists in both records, <code>$customizer</code> is called to the values associated with the key.</p>

### [modifyPath](https://idlephp.tech/#modifyPath)

```php
modifyPath($path, $updater, $record)
```

<p>Creates new record by applying an <code>$updater</code> function to the value at the given <code>$path</code>.</p>

### [modulo](https://idlephp.tech/#modulo)

```php
modulo($a, $b)
```

<p>$a % $b</p>

### [multiply](https://idlephp.tech/#multiply)

```php
multiply($a, $b)
```

<p>$a * $b</p>

### [negate](https://idlephp.tech/#negate)

```php
negate($predicate)
```

<p>Creates a function that negates the result of the <code>$predicate</code> function.</p>

### [not](https://idlephp.tech/#not)

```php
not($a)
```

<p>returns !$a</p>

### [nothing](https://idlephp.tech/#nothing)

```php
nothing()
```

<p>Returns an empty <code>Optional</code>.</p>

### [now](https://idlephp.tech/#now)

```php
now()
```

<p>Returns the timestamp of the number of seconds</p>

### [nth](https://idlephp.tech/#nth)

```php
nth($offset, $collection)
```

<p>Returns the <code>$offset</code> element. If <code>$offset</code> is negative the element at index length + <code>$offset</code> is returned.</p>

### [nthArg](https://idlephp.tech/#nthArg)

```php
nthArg($n)
```

<p>Returns a function which returns its <code>$nth</code> argument.</p>

### [objOf](https://idlephp.tech/#objOf)

```php
objOf($key, $value)
```

<p>Creates an array containing a single <code>key =&gt; value</code> pair.</p>

### [omit](https://idlephp.tech/#omit)

```php
omit($keys, $collection)
```

<p>The opposite of <code>pick</code>. Returns record without <code>$keys</code>.</p>

### [omitBy](https://idlephp.tech/#omitBy)

```php
omitBy($predicate, $collection)
```

<p>The opposite of <code>pickBy</code>. Returns properties of <code>$record</code> that $predicate returns <code>falsey</code> for.</p>

### [once](https://idlephp.tech/#once)

```php
once($fn)
```

<p><code>$fn</code> is only called once, the first value is returned in subsequent invocations.</p>

### [Optional](https://idlephp.tech/#Optional)

```php
interface Optional
{
    /**
     * @return bool true if not empty
     */
    public function isPresent(): bool;
    /**
     * @return bool true if empty
     */
    public function isEmpty(): bool;
    /**
     * Returns value, throw exception if empty
     */
    public function get(): mixed;
    /**
     * Returns the contained value if the optional is nonempty or `$default`
     */
    public function orElse(mixed $default): mixed;
    /**
     * Returns the contained value, if present, otherwise throw an exception
     */
    public function orElseThrow(\Exception $e = new \Exception('No value on None')): mixed;
    /**
     * If a value is present, apply the `$fn` to it, and if the result is non-null, return an Optional describing the result
     */
    public function map(callable $fn): Optional;
    /**
     * Use instead of map if $f returns Optional
     */
    public function flatMap(callable $fn): Optional;
    /**
     * If a value is present and matches the `$predicate`, return an Optional with the value, otherwise an empty Optional.
     */
    public function filter(callable $predicate): Optional;
}

```

<p>Maybe/Option monad (container) which may or may not contain a non-null value.</p>

### [orderBy](https://idlephp.tech/#orderBy)

```php
orderBy($iteratees, $orders, $collection)
```

<p>Like <code>sortBy</code> but allows specifying the sort orders.</p>

### [partial](https://idlephp.tech/#partial)

```php
partial($fn, $partials)
```

<p>Creates a function that invokes <code>$fn</code> with <code>$partials</code> prepended to the arguments. <code>\Idles\_</code> const may be used as a placeholder.</p>

### [partialRight](https://idlephp.tech/#partialRight)

```php
partialRight($fn, $partials)
```

<p>Like partial but <code>$partials</code> are <strong>appended</strong>.</p>

### [partition](https://idlephp.tech/#partition)

```php
partition($predicate, $collection)
```

<p>Split <code>$collection</code> into two groups, the first of which contains elements <code>$predicate</code> returns truthy for, the second of which contains elements <code>$predicate</code> returns falsey for.</p>

### [path](https://idlephp.tech/#path)

```php
path($path, $collection)
```

<p>Retrieve the value at a given path.</p>

### [pathOr](https://idlephp.tech/#pathOr)

```php
pathOr($default, $path, $collection)
```

<p>Retrieve the value at a given path. If path is not found, the <code>$default</code> is returned.</p>

### [paths](https://idlephp.tech/#paths)

```php
paths($paths, $collection)
```

<p>Keys in, values out. Order is preserved.</p>

### [pick](https://idlephp.tech/#pick)

```php
pick($keys, $collection)
```

<p>Returns record containing only <code>$keys</code>.</p>

### [pickBy](https://idlephp.tech/#pickBy)

```php
pickBy($predicate, $collection)
```

<p>Returns record containing only keys $predicate returns truthy for.</p>

### [pipe](https://idlephp.tech/#pipe)

```php
pipe(...$fns)
```

<p>Left-to-right function composition. The first argument may have any arity; the remaining arguments must be unary.</p>

### [pluck](https://idlephp.tech/#pluck)

```php
pluck($key, $collection)
```

<p>Returns a new array by plucking the same named property off all records in the array supplied.</p>

### [project](https://idlephp.tech/#project)

```php
project($props, $collection)
```

<p>Like SQL <code>select</code> statement.</p>

### [prop](https://idlephp.tech/#prop)

```php
prop($key, $record)
```

<p>Return the specified property.</p>

### [propEq](https://idlephp.tech/#propEq)

```php
propEq($key, $value, $record)
```

<p>Returns $record[$key] == $value</p>

### [propOr](https://idlephp.tech/#propOr)

```php
propOr($default, $key, $record)
```

<p>Return the $key property or <code>$default</code>.</p>

### [rearg](https://idlephp.tech/#rearg)

```php
rearg($indexes, $fn)
```

<p>Returns a curried function that invokes <code>$fn</code> with arguments rearranged according to <code>$indexes</code>.</p>

### [reduce](https://idlephp.tech/#reduce)

```php
reduce($iteratee, $accumulator, $collection)
```

<p>Reduces <code>$collection</code> to a value which is the accumulated result of running each element in collection through <code>$iteratee</code>.</p>

### [remove](https://idlephp.tech/#remove)

```php
remove($start, $count, $iterable)
```

<p>Removes items from <code>$iterable</code> starting at $start and containing <code>$count</code> elements.</p>

### [resolve](https://idlephp.tech/#resolve)

```php
resolve($resolvers, $record)
```

<p>Adds new properties to <code>$record</code> using <code>$resolvers</code>.</p>

### [round](https://idlephp.tech/#round)

```php
round($precision, $number)
```

<p>Rounds $number to specified $precision</p>

### [setPath](https://idlephp.tech/#setPath)

```php
setPath($path, $value, $record)
```

<p>Return copy of <code>$record</code> with <code>$path</code> set with <code>$value</code>.</p>

### [slice](https://idlephp.tech/#slice)

```php
slice($start, $end, $collection)
```

<p>Returns a slice of iterable or string from <code>$start</code> up to, but not including <code>$end</code>.</p>

### [sort](https://idlephp.tech/#sort)

```php
sort($comparator, $collection)
```

<p>Sorts <code>$collection</code> using <code>$comparator</code> comparison (<code>$a &lt;=&gt; $b</code>) function.</p>

### [sortBy](https://idlephp.tech/#sortBy)

```php
sortBy($iteratees, $collection)
```

<p>Sorts <code>$collection</code> in ascending order according to <code>$comparators</code>.</p>

### [sortWith](https://idlephp.tech/#sortWith)

```php
sortWith($comparators, $collection)
```

<p>Sorts a <code>$collection</code> according to an array of comparison (<code>$a &lt;=&gt; $b</code>) functions.</p>

### [split](https://idlephp.tech/#split)

```php
split($separator, $s)
```

<p>Splits string by <code>$separator</code> regular expression.</p>

### [splitAt](https://idlephp.tech/#splitAt)

```php
splitAt($index, $arrayOrString)
```

<p>Splits a given array or string at a given index.</p>

### [splitEvery](https://idlephp.tech/#splitEvery)

```php
splitEvery($length, $arrayOrString)
```

<p>Splits an array or string into slices of the specified length.</p>

### [splitWhen](https://idlephp.tech/#splitWhen)

```php
splitWhen($predicate, $iterable)
```

<p>Splits an array by predicate.</p>

### [splitWhenever](https://idlephp.tech/#splitWhenever)

```php
splitWhenever($predicate, $iterable)
```

<p>Splits an array into slices on every occurrence of a value.</p>

### [startsWith](https://idlephp.tech/#startsWith)

```php
startsWith($target, $s)
```

<p>If string starts with <code>$target</code>.</p>

### [subtract](https://idlephp.tech/#subtract)

```php
subtract($a, $b)
```

<p>$a - $b</p>

### [sum](https://idlephp.tech/#sum)

```php
sum($collection)
```

<p>Sums elements in $collection</p>

### [sumBy](https://idlephp.tech/#sumBy)

```php
sumBy($iteratee, $collection)
```

<p>Sums elements, $iteratee is invoked for each element in $collection to generate the value to be summed.</p>

### [T](https://idlephp.tech/#T)

```php
T(...$args)
```

<p>Always returns <code>true</code></p>

### [take](https://idlephp.tech/#take)

```php
take($n, $collection)
```

<p>Takes <code>$n</code> first elements from iterable.</p>

### [takeLast](https://idlephp.tech/#takeLast)

```php
takeLast($n, $collection)
```

<p>Returns a slice of iterable with <code>$n</code> elements taken from the end.</p>

### [tap](https://idlephp.tech/#tap)

```php
tap($interceptor, $value)
```

<p>Calls <code>$interceptor($value)</code> then returns the original <code>$value</code>.</p>

### [times](https://idlephp.tech/#times)

```php
times($iteratee, $n)
```

<p>Calls the iteratee <code>$n</code> times, returning an array of the results of each invocation.</p>

### [toLower](https://idlephp.tech/#toLower)

```php
toLower($s)
```

<p>Converts string to lower case.</p>

### [toPairs](https://idlephp.tech/#toPairs)

```php
toPairs($record)
```

<p>Converts a record into an array of <code>[$key, $value]</code>.</p>

### [toUpper](https://idlephp.tech/#toUpper)

```php
toUpper($s)
```

<p>Converts string to upper case.</p>

### [trim](https://idlephp.tech/#trim)

```php
trim($characters, $string)
```

<p>Strip characters from the beginning and end of a string.</p>

### [trimEnd](https://idlephp.tech/#trimEnd)

```php
trimEnd($characters, $string)
```

<p>Strip characters from the end of a string.</p>

### [trimStart](https://idlephp.tech/#trimStart)

```php
trimStart($characters, $string)
```

<p>Strip characters from the beginning of a string.</p>

### [tryCatch](https://idlephp.tech/#tryCatch)

```php
tryCatch($tryer, $catcher, $value)
```

<p>Calls <code>$tryer</code>, if it throws, calls <code>$catcher</code>.</p>

### [unapply](https://idlephp.tech/#unapply)

```php
unapply($fn)
```

<p>Returns fn (...$args) =&gt; $fn($args)</p>

### [unary](https://idlephp.tech/#unary)

```php
unary($fn)
```

<p><code>ary(1, $fn)</code></p>

### [uniq](https://idlephp.tech/#uniq)

```php
uniq($collection)
```

<p>Removes duplicates using <code>===</code>.</p>

### [uniqBy](https://idlephp.tech/#uniqBy)

```php
uniqBy($iteratee, $collection)
```

<p>Like <code>uniq</code> but apply <code>$iteratee</code> fist.</p>

### [uniqWith](https://idlephp.tech/#uniqWith)

```php
uniqWith($predicate, $collection)
```

<p>Like <code>uniq</code> but uses <code>$predicate</code> to compare elements.</p>

### [unless](https://idlephp.tech/#unless)

```php
unless($predicate, $whenFalse, $value)
```

<p>Returns <code>$predicate($value) ? $value : $whenFalse($value)</code>.</p>

### [useWith](https://idlephp.tech/#useWith)

```php
useWith($fn, $transformers)
```

<p>Applies each transformer function to each argument. Returns a new curried functions.</p>

### [values](https://idlephp.tech/#values)

```php
values($collection)
```

<p>Returns an indexed iterable of values in <code>$collection</code>.</p>

### [when](https://idlephp.tech/#when)

```php
when($predicate, $whenTrue, $value)
```

<p>Returns <code>$predicate($value) ? $whenTrue($value) : $value</code>.</p>

### [where](https://idlephp.tech/#where)

```php
where($spec, $record)
```

<p>Checks if <code>$record</code> satisfies the spec by invoking the <code>$spec</code> properties with the corresponding properties of $record.</p>

### [whereAny](https://idlephp.tech/#whereAny)

```php
whereAny($spec, $record)
```

<p>Checks if <code>$record</code> satisfies the spec by invoking the $spec properties with the corresponding properties of <code>$record</code>. Returns true if at least one of the predicates returns true.</p>

### [whereEq](https://idlephp.tech/#whereEq)

```php
whereEq($spec, $test)
```

<p>Check if the <code>$test</code> satisfies the <code>$spec</code>.</p>

### [without](https://idlephp.tech/#without)

```php
without($values, $collection)
```

<p>Returns <code>$iterable</code> without <code>$values</code>.</p>

### [words](https://idlephp.tech/#words)

```php
words($pattern, $s)
```

<p>Splits string into an array of its words.</p>

### [zip](https://idlephp.tech/#zip)

```php
zip($a, $b)
```

<p>Creates a new iterable out of the two supplied by pairing up equally-positioned items from both iterables.</p>

### [zipAll](https://idlephp.tech/#zipAll)

```php
zipAll($iterables)
```

<p>Same as <code>zip</code> but for many iterables.</p>

### [zipWith](https://idlephp.tech/#zipWith)

```php
zipWith($iteratee, $a, $b)
```

<p>Like <code>zip</code> except that it accepts <code>$iteratee</code> to specify how grouped values should be combined.</p>

    