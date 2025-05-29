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
`PHP 7.4` or higher

## Installation
`composer require miroshnikov/idles`

## Roadmap
> [!NOTE]  
> Idles is currently under active development. 
> Roadmap is to add all methods from Lodash and Ramda libraries and some functional tools.

## Documentation

### Array
#### [concat](https://idlephp.tech/#concat)

```php
concat(?iterable $array, $value): iterable
```

Concatinates `$array` with additional iterables/values

#### [count](https://idlephp.tech/#count)

```php
count(callable $predicate, ?iterable $collection): int
```

Counts the number of items in `$collection` matching the `$predicate`

#### [countBy](https://idlephp.tech/#countBy)

```php
countBy(callable $iteratee, ?iterable $collection): array
```

Returns an array: [`$iteratee($value)` => number of times the `$iteratee($value)` was found in `$collection`]

#### [drop](https://idlephp.tech/#drop)

```php
drop(int $n, ?iterable $collection): iterable
```

Skips the first `$n` elemens and returns the rest of the iterable

#### [dropRight](https://idlephp.tech/#dropRight)

```php
dropRight(int $n, ?iterable $collection): iterable
```

Skips the last `$n` elements

#### [findIndex](https://idlephp.tech/#findIndex)

```php
findIndex(callable $predicate, ?iterable $collection): int
```

Like `find` but returns the index of the first element predicate returns truthy for, `-1` if not found

#### [findLastIndex](https://idlephp.tech/#findLastIndex)

```php
findLastIndex(callable $predicate, ?iterable $collection): int
```

Like `find` but returns the index of the last element predicate returns truthy for, `-1` if not found

#### [flatten](https://idlephp.tech/#flatten)

```php
flatten(?iterable $collection): iterable
```

Flattens iterable a single level deep.

#### [flattenDeep](https://idlephp.tech/#flattenDeep)

```php
flattenDeep(?iterable $collection): iterable
```

Recursively flattens iterable.

#### [flattenDepth](https://idlephp.tech/#flattenDepth)

```php
flattenDepth(int $depth, ?iterable $collection): iterable
```

Recursively flatten array up to depth times.

#### [fromPairs](https://idlephp.tech/#fromPairs)

```php
fromPairs(?iterable $collection): array
```

Creates a new record from a list key-value pairs. The inverse of `toPairs`.

#### [head](https://idlephp.tech/#head)

```php
head(?iterable $collecton)
```

Gets the first element of iterable

#### [indexOf](https://idlephp.tech/#indexOf)

```php
indexOf($value, ?iterable $collection): int
```

Returns the index of the first occurrence of `$value` in `$collection`, else -1.

#### [intersection](https://idlephp.tech/#intersection)

```php
intersection(?iterable $record1, ?iterable $record2): array
```

Returns unique values that are included in both records

#### [intersectionBy](https://idlephp.tech/#intersectionBy)

```php
intersectionBy(callable $iteratee, ?iterable $record1, ?iterable $record2): array
```

Like `intersection` but invokes `$iteratee` for each element before comparison.

#### [intersectionWith](https://idlephp.tech/#intersectionWith)

```php
intersectionWith(callable $comparator, ?iterable $record1, ?iterable $record2): array
```

Like `intersection` but invokes `$comparator` to compare elements.

#### [join](https://idlephp.tech/#join)

```php
join(string $separator, ?iterable $collection): string
```

Joins iterable elements separated by `$separator`

#### [last](https://idlephp.tech/#last)

```php
last(?iterable $collecton)
```

Gets the last element of iterable

#### [nth](https://idlephp.tech/#nth)

```php
nth(int $offset, ?iterable $collection)
```

Returns the `$offset` element. If `$offset` is negative the element at index length + `$offset` is returned.

#### [remove](https://idlephp.tech/#remove)

```php
remove(int $start, int $count, ?iterable $iterable): array
```

Removes items from `$iterable` starting at `$start` and containing `$count` elements.

#### [slice](https://idlephp.tech/#slice)

```php
slice(int $start, int ?$end, ?iterable $collection): iterable
```

Retruns a slice of `$iterable` from `$start` up to, but not including, `$end`.

#### [take](https://idlephp.tech/#take)

```php
take(int $n, ?iterable $collection): iterable
```

Takes n first elements from iterable

#### [takeRight](https://idlephp.tech/#takeRight)

```php
takeRight(int $n, ?iterable $collection): array
```

Returns a slice of iterable with n elements taken from the end.

#### [uniq](https://idlephp.tech/#uniq)

```php
uniq(?iterable $collection): array
```

Removes duplicates using `===`

#### [uniqueBy](https://idlephp.tech/#uniqueBy)

```php
uniqBy(callable $iteratee, ?iterable $collection): array
```

Like `uniq` but apply `$iteratee` fist

#### [uniqWith](https://idlephp.tech/#uniqWith)

```php
uniqWith(callable $predicate, ?iterable $collection): array
```

Like `uniq` but uses `$predicate` to compare elements

#### [without](https://idlephp.tech/#without)

```php
without(array $values, ?iterable $collection): iterable
```

Returns `$iterable` without `$values`

#### [zip](https://idlephp.tech/#zip)

```php
zip(iterable $a, iterable $b): iterable
```

Creates an iterable of grouped elements, the first of which contains the first elements of the given iterables, the second of which contains the second elements, and so on.

#### [zipWith](https://idlephp.tech/#zipWith)

```php
zipWith(callable $iteratee, iterable $a, iterable $b): iterable
```

Like `zip` except that it accepts `$iteratee` to specify how grouped values should be combined.

    
### Collection
#### [all](https://idlephp.tech/#all)

```php
all(?callable $predicate, ?iterable $collection): bool
```

Checks if `$predicate` returns `truthy` for all elements of `$collection`. Stop once it returns `falsey`

#### [any](https://idlephp.tech/#any)

```php
any(callable $predicate, ?iterable $collection): bool
```

Checks if `$predicate` returns truthy for any element of `$collection`. Stops on first found.

#### [each](https://idlephp.tech/#each)

```php
each(callable $iteratee, ?iterable $collection): iterable
```

Iterates over elements of `$collection`. Iteratee may exit iteration early by returning `false`.

#### [filter](https://idlephp.tech/#filter)

```php
filter(callable $predicate, ?iterable $collection): iterable
```

Returns elements `$predicate` returns truthy for.

#### [find](https://idlephp.tech/#find)

```php
find(?callable $predicate, ?iterable $collection)
```

Returns the first element `$predicate` returns truthy for.

#### [flatMap](https://idlephp.tech/#flatMap)

```php
flatMap(callable $iteratee, ?iterable $collection): iterable
```

Maps then flatten

#### [flatMapDeep](https://idlephp.tech/#flatMapDeep)

```php
flatMapDeep(callable $iteratee, ?iterable $collection): iterable
```

Like `flatMap` but recursively flattens the results.

#### [flatMapDepth](https://idlephp.tech/#flatMapDepth)

```php
flatMapDepth(callable $iteratee, int $depth, ?iterable $collection): iterable
```

Like `flatMap` but flattens the mapped results up to `$depth` times

#### [groupBy](https://idlephp.tech/#groupBy)

```php
groupBy(callable $iteratee, ?iterable $collection): array
```

Creates an array composed of keys generated from running each value through `$iteratee`.

#### [includes](https://idlephp.tech/#includes)

```php
includes($value, ?iterable $collection): bool
```

Checks if `$value` is in `$collection`.

#### [indexBy](https://idlephp.tech/#indexBy)

```php
indexBy(callable $iteratee, ?iterable $collection): iterable
```

Creates a record composed of keys generated from the results of running each element of `$collection` through `$iteratee`.

#### [map](https://idlephp.tech/#map)

```php
map(callable $iteratee, ?iterable $collection)
```

Run each element in `$collection` through `$iteratee`.

#### [orderBy](https://idlephp.tech/#orderBy)

```php
orderBy(array $iteratees, array $orders, ?iterable $collection)
```

Like `sortBy` but allows specifying the sort orders

#### [partition](https://idlephp.tech/#partition)

```php
partition(callable $predicate, ?iterable $collection): array
```

Split `$collection` into two groups, the first of which contains elements `$predicate` returns truthy for, the second of which contains elements `$predicate` returns falsey for.

#### [reduce](https://idlephp.tech/#reduce)

```php
reduce(callable $iteratee, $accumulator, ?iterable $collection)
```

Reduces `$collection` to a value which is the accumulated result of running each element in collection through `$iteratee`

#### [resolve](https://idlephp.tech/#resolve)

```php
resolve(array $resolvers, array $record): array
```

Adds new properties to `$record` using `$resolvers`.

#### [sort](https://idlephp.tech/#sort)

```php
sort(array $comparator, ?iterable $collection): array
```

Sorts `$collection` using `$comparator` comparison (`$a <=> $b`) function

#### [sortBy](https://idlephp.tech/#sortBy)

```php
sortBy(array $comparators, ?iterable $collection): array
```

Sorts `$collection` in ascending order according to `$comparators`.

#### [sortWith](https://idlephp.tech/#sortWith)

```php
sortWith(array $comparators, ?iterable $collection): array
```

Sorts a `$collection` according to an array of comparison (`$a <=> $b`) functions

#### [values](https://idlephp.tech/#values)

```php
values(?iterable $collection): iterable
```

Returns an indexed iterable of values in `$collection`.

    
### Function
#### [always](https://idlephp.tech/#always)

```php
always($value)
```

Returns a function that always returns the given value.

#### [applyTo](https://idlephp.tech/#applyTo)

```php
applyTo($value, callable $interceptor)
```

Returns `$interceptor($value)`.

#### [ary](https://idlephp.tech/#ary)

```php
ary(int $n, callable $fn): callable
```

Creates a function that invokes `$fn`, with up to `$n` arguments, ignoring any additional arguments.

#### [ascend](https://idlephp.tech/#ascend)

```php
ascend(callable $func, $a, $b): callable
```

Makes an ascending comparator function out of a function that returns a value that can be compared with `<=>`

#### [attempt](https://idlephp.tech/#attempt)

```php
attempt(callable $fn)
```

Calls `$fn`, returning either the result or the caught exception.

#### [compose](https://idlephp.tech/#compose)

```php
compose(callable ...$funcs): callable
```

Like `pipe` but invokes the functions from right to left.

#### [curry](https://idlephp.tech/#curry)

```php
curry(callable $f): callable
```

`\Idles\_` const may be used as a placeholder.

#### [curryRight](https://idlephp.tech/#curryRight)

```php
curryRight(callable $f): callable
```

Like `curry` but arguments are prepended.

#### [descend](https://idlephp.tech/#descend)

```php
descend(callable $func, $a, $b): callable
```

Makes an descending comparator function out of a function that returns a value that can be compared with `<=>`

#### [flip](https://idlephp.tech/#flip)

```php
flip(callable $fn): callable
```

Returns a new curried function with the first two arguments reversed

#### [juxt](https://idlephp.tech/#juxt)

```php
juxt(array $funcs): callable
```

Applies a list of functions to a list of values.

#### [memoize](https://idlephp.tech/#memoize)

```php
memoize(callable $func): callable
```

Creates a function that memoizes the result of `$func`. `$resolver` returns map cache key, args[0] by default.

#### [negate](https://idlephp.tech/#negate)

```php
negate(callable $predicate): callable
```

Creates a function that negates the result of the `$predicate` function.

#### [once](https://idlephp.tech/#once)

```php
once(callable $fn): callable
```

`$fn` is only called once, the first value is returned in subsequent invocations.

#### [partial](https://idlephp.tech/#partial)

```php
partial(callable $fn, array $partials): callable
```

Creates a function that invokes `$fn` with `$partials` prepended to the arguments. `\Idles\_` const may be used as a placeholder.

#### [partialRight](https://idlephp.tech/#partialRight)

```php
partialRight(callable $fn, array $partials): callable
```

Like `partial` but `$partials` are appended.

#### [pipe](https://idlephp.tech/#pipe)

```php
pipe(callable ...$funcs): callable
```

Left-to-right function composition. The first argument may have any arity; the remaining arguments must be unary.

#### [tap](https://idlephp.tech/#tap)

```php
tap(callable $interceptor, $value)
```

Calls `$interceptor($value)` then returns the original `$value`

#### [times](https://idlephp.tech/#times)

```php
times(callable $iteratee, int $n): array
```

Calls the iteratee `$n` times, returning an array of the results of each invocation.

#### [tryCatch](https://idlephp.tech/#tryCatch)

```php
tryCatch(callable $tryer, callable $catcher, $value)
```

Calls `$tryer`, if it throws, calls `$catcher`

#### [unary](https://idlephp.tech/#unary)

```php
unary(callable $fn): callable
```

`ary(1, $fn)`

    
### Logic
#### [allPass](https://idlephp.tech/#allPass)

```php
allPass(array $predicates): callable
```

Returns a function that checks if its arguments pass all `$predicates`.

#### [anyPass](https://idlephp.tech/#anyPass)

```php
anyPass(array $predicates): callable
```

Returns a function that checks if its arguments pass any of the `$predicates`.

#### [both](https://idlephp.tech/#both)

```php
both(callable $func1, callable $func2): callable
```

Resulting function returns `$func1(...$args)` if it is falsy or `$func2(...$args)` otherwise, short-circuited

#### [cond](https://idlephp.tech/#cond)

```php
cond(array $pairs): callable
```

Iterates over `$pairs` and invokes the corresponding function of the first predicate to return truthy.

#### [defaultTo](https://idlephp.tech/#defaultTo)

```php
defaultTo($default)($value)
```

Returns `$value` ?? `$default`

#### [either](https://idlephp.tech/#either)

```php
either(callable $func1, callable $func2): callable
```

Resulting function returns `$func1(...$args)` if it is truthy or `$func2(...$args)` otherwise, short-circuited.

#### [ifElse](https://idlephp.tech/#ifElse)

```php
ifElse(callable $predicate, callable $onTrue, callable $onFalse): callable
```

Resulting function returns `$onTrue(...$args)` if `$predicate(...$args)` is truthy or `$onFalse(...$args)` otherwise.

#### [not](https://idlephp.tech/#not)

```php
not($a): bool
```

returns `!$a`

#### [unless](https://idlephp.tech/#unless)

```php
unless(callable $predicate, callable $whenFalse, mixed $value)
```

Returns `$predicate($value) ? $value : $whenFalse($value)`

#### [when](https://idlephp.tech/#when)

```php
when(callable $predicate, callable $whenTrue, mixed $value)
```

Returns `$predicate($value) ? $whenTrue($value) : $value`

    
### Math
#### [add](https://idlephp.tech/#add)

```php
add(int|float $a, int|float $b): int|float
```

$a + $b

#### [dec](https://idlephp.tech/#dec)

```php
dec(int $number): int
```

Returns $number - 1

#### [divide](https://idlephp.tech/#divide)

```php
divide(int|float $a, int|float $b): int|float
```

$a / $b

#### [gt](https://idlephp.tech/#gt)

```php
gt($a, $b): bool
```

$a > $b

#### [gte](https://idlephp.tech/#gte)

```php
gte($a, $b): bool
```

$a >= $b

#### [inc](https://idlephp.tech/#inc)

```php
inc(int $number): int
```

Returns $number + 1

#### [lt](https://idlephp.tech/#lt)

```php
lt($a, $b): bool
```

$a < $b

#### [lte](https://idlephp.tech/#lte)

```php
lte($a, $b): bool
```

$a <= $b

#### [modulo](https://idlephp.tech/#modulo)

```php
modulo(int|float $a, int|float $b): int
```

$a % $b

#### [multiply](https://idlephp.tech/#multiply)

```php
multiply(int|float $a, int|float $b): int|float
```

$a * $b

#### [round](https://idlephp.tech/#round)

```php
round(int $precision, int|float $number): float
```

Rounds `$number`to specified `$precision`

#### [subtract](https://idlephp.tech/#subtract)

```php
subtract(int|float $a, int|float $b): int|float
```

$a - $b

#### [sum](https://idlephp.tech/#sum)

```php
sum(?iterable $collection): int|float
```

Sums elements in iterable

#### [sumBy](https://idlephp.tech/#sumBy)

```php
sumBy(?callable $iteratee, ?iterable $collection): int|float
```

Like `sum` but `$iteratee` is invoked for each element in iterable to generate the value to be summed.

    
### Record
#### [assignDeep](https://idlephp.tech/#assignDeep)

```php
assignDeep(array $iterables): array
```

Merges properties recursively, numeric keys are overwritten.

#### [defaults](https://idlephp.tech/#defaults)

```php
defaults(?iterable $record1, ?iterable $record2): array
```

Merges properties from right to left, numeric keys are overwritten.

#### [evolve](https://idlephp.tech/#evolve)

```php
evolve(array $transformations, ?iterable $record): array
```

Creates a new record by recursively calling transformation functions with `$record` properties.

#### [extend](https://idlephp.tech/#extend)

```php
extend(?iterable $source1, ?iterable $source2): array
```

Merges properties, numeric keys are overwritten.

#### [has](https://idlephp.tech/#has)

```php
has(string|int $key, ?iterable $record): bool
```

Checks if `$record` has `$key`

#### [hasPath](https://idlephp.tech/#hasPath)

```php
hasPath(string|int|array $path, ?iterable $record): bool
```

Checks if `$path` exists in `$record`

#### [invert](https://idlephp.tech/#invert)

```php
invert(?iterable $collection): array
```

Replaces keys with values. Duplicate keys are overwritten.

#### [keys](https://idlephp.tech/#keys)

```php
keys(?iterable $record): iterable
```

Returns an indexed iterable of keys in `$record`.

#### [merge](https://idlephp.tech/#merge)

```php
merge(?iterable $source1, ?iterable $source2): array
```

Merges properties, numeric keys are appended.

#### [mergeDeep](https://idlephp.tech/#mergeDeep)

```php
mergeDeep(array $iterables): array
```

Merges properties recursively, numeric keys are appended.

#### [mergeLeft](https://idlephp.tech/#mergeLeft)

```php
mergeLeft(?iterable $left, ?iterable $right): array
```

calls `merge($right, $left)`

#### [mergeWith](https://idlephp.tech/#mergeWith)

```php
mergeWith(callable $customizer, ?iterable $left, ?iterable $right): array
```

Like `merge` but if a key exists in both records, `$customizer` is called to the values associated with the key

#### [modifyPath](https://idlephp.tech/#modifyPath)

```php
modifyPath(array|string|int $path, callable $updater, ?iterable $record)
```

Creates new record by applying an `$updater` function to the value at the given `$path`.

#### [objOf](https://idlephp.tech/#objOf)

```php
objOf(string $key, $value): array
```

Creates an `array` containing a single key => value pair.

#### [omit](https://idlephp.tech/#omit)

```php
omit(array $keys, ?iterable $collection): iterable
```

The opposite of `pick`. Returns record without `$keys`.

#### [omitBy](https://idlephp.tech/#omitBy)

```php
omitBy(callable $predicate, ?iterable $record): iterable
```

The opposite of `pickBy`. Returns properties of `$record` that `$predicate` returns falsey for.

#### [path](https://idlephp.tech/#path)

```php
path(array|string $path, ?iterable $collection)
```

Retrieve the value at a given path.

#### [paths](https://idlephp.tech/#paths)

```php
paths(array $paths, ?iterable $collection): array
```

Keys in, values out. Order is preserved.

#### [pick](https://idlephp.tech/#pick)

```php
pick(array $keys, ?iterable $collection): iterable
```

Returns record containing only `$keys`

#### [pickBy](https://idlephp.tech/#pickBy)

```php
pickBy(callable $predicate, ?iterable $record): iterable
```

Returns record containing only keys `$predicate` returns truthy for.

#### [pluck](https://idlephp.tech/#pluck)

```php
pluck(string|int $key, ?iterable $collection)
```

Returns a new array by plucking the same named property off all records in the array supplied.

#### [project](https://idlephp.tech/#project)

```php
project(array $props, ?iterable $collection)
```

Like SQL `select` statement.

#### [prop](https://idlephp.tech/#prop)

```php
prop(string|int $key, ?iterable $record)
```

Return the specified property.

#### [propEq](https://idlephp.tech/#propEq)

```php
propEq(string|int $key, $value, ?iterable $record): bool
```

Returns $record[$key] == $value

#### [setPath](https://idlephp.tech/#setPath)

```php
setPath($path, $value, ?iterable $record)
```

Return copy `$record` with `$path` set  with `$value`

#### [toPairs](https://idlephp.tech/#toPairs)

```php
toPairs(?iterable $record): iterable
```

Converts a record into an array of `[$key, $value]`

#### [where](https://idlephp.tech/#where)

```php
where(array $spec, ?iterable $record): bool
```

Checks if `$record` satisfies the spec by invoking the `$spec` properties with the corresponding properties of `$record`.

#### [whereAny](https://idlephp.tech/#whereAny)

```php
whereAny(array $spec, ?iterable $record): bool
```

Checks if `$record` satisfies the spec by invoking the `$spec` properties with the corresponding properties of `$record`. Returns `true` if at least one of the predicates returns `true`.

#### [whereEq](https://idlephp.tech/#whereEq)

```php
whereEq(array $spec, ?iterable $test): bool
```

Check if the `$test` satisfies the `$spec`

    
### String
#### [escape](https://idlephp.tech/#escape)

```php
escape(string $s): string
```

Converts the characters "&", "<", ">", '"', and "'" to their corresponding HTML entities.

#### [escapeRegExp](https://idlephp.tech/#escapeRegExp)

```php
escapeRegExp(string $regexp): string
```

Escapes regular expression

#### [split](https://idlephp.tech/#split)

```php
split(string $separator, string $s): array
```

Splits string by `$separator`.

#### [startsWith](https://idlephp.tech/#startsWith)

```php
startsWith(string $target, string $s): bool
```

If string starts with `$target`.

#### [toLower](https://idlephp.tech/#toLower)

```php
toLower(string $s): string
```

Converts string to lower case

#### [toUpper](https://idlephp.tech/#toUpper)

```php
toUpper(string $s): string
```

Converts string to upper case

#### [words](https://idlephp.tech/#words)

```php
words(string $pattern, string $string): array
```

Splits string into an array of its words.

    
### Util
#### [collect](https://idlephp.tech/#collect)

```php
collect(?iterable $iterable): array
```

Collects any iterable into `array`

#### [eq](https://idlephp.tech/#eq)

```php
eq($a, $b): bool
```

`$a` == `$b`

#### [equals](https://idlephp.tech/#equals)

```php
equals($a, $b): bool
```

`$a` === `$b`

#### [F](https://idlephp.tech/#F)

```php
F(...$args): bool
```

Always returns `false`

#### [identity](https://idlephp.tech/#identity)

```php
identity($value)
```

Returns the first argument it receives.

#### [iterate](https://idlephp.tech/#iterate)

```php
iterate(callable $f, $value): iterable
```

Returns a generator of `$value`, `$f($value)`, `$f($f($value))` etc.

#### [just](https://idlephp.tech/#just)

```php
just($value): Optional
```

Returns an Optional with the specified non-null value

#### [nothing](https://idlephp.tech/#nothing)

```php
nothing(): Optional
```

Returns an empty Optional

#### [now](https://idlephp.tech/#now)

```php
now(): int
```

Returns the timestamp of the number of seconds

#### [Optional](https://idlephp.tech/#Optional)

```php
just(mixed $value): Optional
```

Maybe/Option monad (container) which may or may not contain a non-null value. Has methods:

`isPresent(): bool` - `true` if not empty              
`isEmpty(): bool` - `true` if empty        
`get(): mixed` - returns value, throw exception if empty         
`orElse(mixed $default): mixed` - returns the contained value if the optional is nonempty or `$default`        
`orElseThrow(Exception $e)` - returns the contained value, if present, otherwise throw an exception        
`map(callable $f): Optional` - If a value is present, apply the `$f` to it, and if the result is non-null, return an Optional describing the result       
`flatMap(callable $f): Optional` - use instead of `map` if `$f` returns Optional          
`filter(callable $predicate): Optional` - if a value is present and matches the `$predicate`, return an Optional with the value, otherwise an empty Optional.  

#### [size](https://idlephp.tech/#size)

```php
size(array|Countable|object|string|callable $value): int
```

Returns size of a countable, number of parameters of a function, lenght of string or number of properties of an object

#### [T](https://idlephp.tech/#T)

```php
T(...$args): bool
```

Always returns `true`

    
