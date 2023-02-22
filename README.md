# IDLES
A PHP functional utility library, port of javascript Lodash/Ramda libraries to PHP with lazy (idle) evaluation.

Go to __[https://idlephp.tech/](https://idlephp.tech/)__ for more details.

## Array
### [concat](https://idlephp.tech/#concat)

```php
concat(?iterable $array, $value): iterable
```

Concatinates `$array` with additional iterables/values

### [drop](https://idlephp.tech/#drop)

```php
drop(int $n, ?iterable $collection): iterable
```

Skips the first `$n` elemens and returns the rest of the iterable

### [dropRight](https://idlephp.tech/#dropRight)

```php
dropRight(int $n, ?iterable $collection): iterable
```

Skips the last `$n` elements

### [findIndex](https://idlephp.tech/#findIndex)

```php
findIndex(callable $predicate, ?iterable $collection): int
```

Like `find` but returns the index of the first element predicate returns truthy for, `-1` if not found

### [findLastIndex](https://idlephp.tech/#findLastIndex)

```php
findLastIndex(callable $predicate, ?iterable $collection): int
```

Like `find` but returns the index of the last element predicate returns truthy for, `-1` if not found

### [flatten](https://idlephp.tech/#flatten)

```php
flatten(?iterable $collection): iterable
```

Flattens iterable a single level deep.

### [flattenDeep](https://idlephp.tech/#flattenDeep)

```php
flattenDeep(?iterable $collection): iterable
```

Recursively flattens iterable.

### [flattenDepth](https://idlephp.tech/#flattenDepth)

```php
flattenDepth(int $depth, ?iterable $collection): iterable
```

Recursively flatten array up to depth times.

### [fromPairs](https://idlephp.tech/#fromPairs)

```php
fromPairs(?iterable $collection): array
```

Creates a new record from a list key-value pairs. The inverse of `toPairs`.

### [head](https://idlephp.tech/#head)

```php
head(?iterable $collecton)
```

Gets the first element of iterable

### [indexOf](https://idlephp.tech/#indexOf)

```php
indexOf($value, ?iterable $collection): int
```

Returns the index of the first occurrence of `$value` in `$collection`, else -1.

### [intersection](https://idlephp.tech/#intersection)

```php
intersection(?iterable $record1, ?iterable $record2): array
```

Returns unique values that are included in both records

### [intersectionBy](https://idlephp.tech/#intersectionBy)

```php
intersectionBy(callable $iteratee, ?iterable $record1, ?iterable $record2): array
```

Like `intersection` but invokes `$iteratee` for each element before comparison.

### [intersectionWith](https://idlephp.tech/#intersectionWith)

```php
intersectionWith(callable $comparator, ?iterable $record1, ?iterable $record2): array
```

Like `intersection` but invokes `$comparator` to compare elements.

### [join](https://idlephp.tech/#join)

```php
join(string $separator, ?iterable $collection): string
```

Joins iterable elements separated by `$separator`

### [last](https://idlephp.tech/#last)

```php
last(?iterable $collecton)
```

Gets the last element of iterable

### [nth](https://idlephp.tech/#nth)

```php
nth(int $offset, ?iterable $collection)
```

Returns the `$offset` element. If `$offset` is negative the element at index length + `$offset` is returned.

### [remove](https://idlephp.tech/#remove)

```php
remove(int $start, int $count, ?iterable $iterable): array
```

Removes items from `$iterable` starting at `$start` and containing `$count` elements.

### [slice](https://idlephp.tech/#slice)

```php
slice(int $start, int ?$end, ?iterable $collection): iterable
```

Retruns a slice of `$iterable` from `$start` up to, but not including, `$end`.

### [take](https://idlephp.tech/#take)

```php
take(int $n, ?iterable $collection): iterable
```

Takes n first elements from iterable

### [takeRight](https://idlephp.tech/#takeRight)

```php
takeRight(int $n, ?iterable $collection): array
```

Returns a slice of iterable with n elements taken from the end.

### [uniq](https://idlephp.tech/#uniq)

```php
uniq(?iterable $collection): array
```

Removes duplicates using `===`

### [without](https://idlephp.tech/#without)

```php
without(array $values, ?iterable $collection): iterable
```

Returns `$iterable` without `$values`

### [zip](https://idlephp.tech/#zip)

```php
zip(iterable $a, iterable $b): iterable
```

Creates an iterable of grouped elements, the first of which contains the first elements of the given iterables, the second of which contains the second elements, and so on.

### [zipWith](https://idlephp.tech/#zipWith)

```php
zipWith(callable $iteratee, iterable $a, iterable $b): iterable
```

Like `zip` except that it accepts `$iteratee` to specify how grouped values should be combined.

    
## Collection
### [all](https://idlephp.tech/#all)

```php
all(?callable $predicate, ?iterable $collection): bool
```

Checks if `$predicate` returns `truthy` for all elements of `$collection`. Stop once it returns `falsey`

### [any](https://idlephp.tech/#any)

```php
any(callable $predicate, ?iterable $collection): bool
```

Checks if `$predicate` returns truthy for any element of `$collection`. Stops on first found.

### [each](https://idlephp.tech/#each)

```php
each(callable $iteratee, ?iterable $collection): iterable
```

Iterates over elements of `$collection`. Iteratee may exit iteration early by returning `false`.

### [filter](https://idlephp.tech/#filter)

```php
filter(callable $predicate, ?iterable $collection): iterable
```

Returns elements `$predicate` returns truthy for.

### [find](https://idlephp.tech/#find)

```php
find(?callable $predicate, ?iterable $collection)
```

Returns the first element `$predicate` returns truthy for.

### [flatMap](https://idlephp.tech/#flatMap)

```php
flatMap(callable $iteratee, ?iterable $collection): iterable
```

Maps then flatten

### [flatMapDeep](https://idlephp.tech/#flatMapDeep)

```php
flatMapDeep(callable $iteratee, ?iterable $collection): iterable
```

Like `flatMap` but recursively flattens the results.

### [flatMapDepth](https://idlephp.tech/#flatMapDepth)

```php
flatMapDepth(callable $iteratee, int $depth, ?iterable $collection): iterable
```

Like `flatMap` but flattens the mapped results up to `$depth` times

### [groupBy](https://idlephp.tech/#groupBy)

```php
groupBy(callable $iteratee, ?iterable $collection): array
```

Creates an array composed of keys generated from running each value through `$iteratee`.

### [includes](https://idlephp.tech/#includes)

```php
includes($value, ?iterable $collection): bool
```

Checks if `$value` is in `$collection`.

### [indexBy](https://idlephp.tech/#indexBy)

```php
indexBy(callable $iteratee, ?iterable $collection): iterable
```

Creates a record composed of keys generated from the results of running each element of `$collection` through `$iteratee`.

### [map](https://idlephp.tech/#map)

```php
map(callable $iteratee, ?iterable $collection)
```

Run each element in `$collection` through `$iteratee`.

### [orderBy](https://idlephp.tech/#orderBy)

```php
orderBy(array $iteratees, array $orders, ?iterable $collection)
```

Like `sortBy` but allows specifying the sort orders

### [partition](https://idlephp.tech/#partition)

```php
partition(callable $predicate, ?iterable $collection): array
```

Split `$collection` into two groups, the first of which contains elements `$predicate` returns truthy for, the second of which contains elements `$predicate` returns falsey for.

### [reduce](https://idlephp.tech/#reduce)

```php
reduce(callable $iteratee, $accumulator, ?iterable $collection)
```

Reduces `$collection` to a value which is the accumulated result of running each element in collection through `$iteratee`

### [resolve](https://idlephp.tech/#resolve)

```php
resolve(array $resolvers, array $record): array
```

Adds new properties to `$record` using `$resolvers`.

### [sortBy](https://idlephp.tech/#sortBy)

```php
sortBy(array $iteratees, ?iterable $collection): array
```

Sorts `$collection` in ascending order according to `$iteratees`.

### [values](https://idlephp.tech/#values)

```php
values(?iterable $collection): iterable
```

Returns an indexed iterable of values in `$collection`.

    
## Function
### [always](https://idlephp.tech/#always)

```php
always($value)
```

Returns a function that always returns the given value.

### [applyTo](https://idlephp.tech/#applyTo)

```php
applyTo ($value, callable $interceptor)
```

Returns `$interceptor($value)`.

### [ary](https://idlephp.tech/#ary)

```php
ary(int $n, callable $fn): callable
```

Creates a function that invokes `$fn`, with up to `$n` arguments, ignoring any additional arguments.

### [attempt](https://idlephp.tech/#attempt)

```php
attempt(callable $fn)
```

Calls `$fn`, returning either the result or the caught exception.

### [compose](https://idlephp.tech/#compose)

```php
compose(callable ...$funcs): callable
```

Like `pipe` but invokes the functions from right to left.

### [curry](https://idlephp.tech/#curry)

```php
curry(callable $f): callable
```

`\Idles\_` const may be used as a placeholder.

### [curryRight](https://idlephp.tech/#curryRight)

```php
curryRight(callable $f): callable
```

Like `curry` but arguments are prepended.

### [juxt](https://idlephp.tech/#juxt)

```php
juxt(array $funcs): callable
```

applies a list of functions to a list of values.

### [memoize](https://idlephp.tech/#memoize)

```php
memoize(callable $func): callable
```

Creates a function that memoizes the result of `$func`. `$resolver` returns map cache key, args[0] by default.

### [negate](https://idlephp.tech/#negate)

```php
negate(callable $predicate): callable
```

Creates a function that negates the result of the `$predicate` function.

### [partial](https://idlephp.tech/#partial)

```php
partial(callable $fn, array $partials): callable
```

Creates a function that invokes `$fn` with `$partials` prepended to the arguments. `\Idles\_` const may be used as a placeholder.

### [partialRight](https://idlephp.tech/#partialRight)

```php
partialRight(callable $fn, array $partials): callable
```

Like `partial` but `$partials` are appended.

### [pipe](https://idlephp.tech/#pipe)

```php
pipe(callable ...$funcs): callable
```

Left-to-right function composition. The first argument may have any arity; the remaining arguments must be unary.

### [tap](https://idlephp.tech/#tap)

```php
tap(callable $interceptor, $value)
```

Calls `$interceptor($value)` then returns the original `$value`

### [times](https://idlephp.tech/#times)

```php
times(int $n, callable $iteratee): array
```

Calls the iteratee `$n` times, returning an array of the results of each invocation.

### [tryCatch](https://idlephp.tech/#tryCatch)

```php
tryCatch(callable $tryer, callable $catcher, $value)
```

Calls `$tryer`, if it throws, calls `$catcher`

### [unary](https://idlephp.tech/#unary)

```php
unary(callable $fn): callable
```

`ary(1, $fn)`

    
## Logic
### [allPass](https://idlephp.tech/#allPass)

```php
allPass(array $predicates): callable
```

Returns a function that checks if its arguments pass all `$predicates`.

### [anyPass](https://idlephp.tech/#anyPass)

```php
anyPass(array $predicates): callable
```

Returns a function that checks if its arguments pass any of the `$predicates`.

### [cond](https://idlephp.tech/#cond)

```php
cond(array $pairs): callable
```

Iterates over `$pairs` and invokes the corresponding function of the first predicate to return truthy.

### [defaultTo](https://idlephp.tech/#defaultTo)

```php
defaultTo($default)($value)
```

Returns `$value` ?? `$default`

    
## Math
### [add](https://idlephp.tech/#add)

```php
add(int|float $a, int|float $b): int|float
```

$a + $b

### [divide](https://idlephp.tech/#divide)

```php
divide(int|float $a, int|float $b): int|float
```

$a / $b

### [modulo](https://idlephp.tech/#modulo)

```php
modulo(int|float $a, int|float $b): int
```

$a % $b

### [multiply](https://idlephp.tech/#multiply)

```php
multiply(int|float $a, int|float $b): int|float
```

$a * $b

### [round](https://idlephp.tech/#round)

```php
round(int $precision, int|float $number): float
```

Rounds `$number`to specified `$precision`

### [subtract](https://idlephp.tech/#subtract)

```php
subtract(int|float $a, int|float $b): int|float
```

$a - $b

### [sum](https://idlephp.tech/#sum)

```php
sum(?iterable $collection)
```

Sums elements in iterable

### [sumBy](https://idlephp.tech/#sumBy)

```php
sumBy(?callable $iteratee, ?iterable $collection)
```

Like `sum` but `$iteratee` is invoked for each element in iterable to generate the value to be summed.

    
## Record
### [assignDeep](https://idlephp.tech/#assignDeep)

```php
assignDeep(array $iterables): array
```

Merges properties recursively, numeric keys are overwritten.

### [defaults](https://idlephp.tech/#defaults)

```php
defaults(?iterable $record1, ?iterable $record2): array
```

Merges properties from right to left, numeric keys are overwritten.

### [evolve](https://idlephp.tech/#evolve)

```php
evolve(array $transformations, ?iterable $record): array
```

Creates a new record by recursively calling transformation functions with `$record` properties.

### [extend](https://idlephp.tech/#extend)

```php
extend(?iterable $source1, ?iterable $source2): array
```

Merges properties, numeric keys are overwritten.

### [has](https://idlephp.tech/#has)

```php
has(string|int $key, ?iterable $record): bool
```

Checks if `$record` has `$key`

### [hasPath](https://idlephp.tech/#hasPath)

```php
hasPath(string|int|array $path, ?iterable $record): bool
```

Checks if `$path` exists in `$record`

### [invert](https://idlephp.tech/#invert)

```php
invert(?iterable $collection): array
```

Replaces keys with values. Duplicate keys are overwritten.

### [keys](https://idlephp.tech/#keys)

```php
keys(?iterable $record): iterable
```

Returns an indexed iterable of keys in `$record`.

### [matches](https://idlephp.tech/#matches)

```php
matches(array $spec, ?iterable $test): bool
```

Check if the `$test` satisfies the `$spec`

### [merge](https://idlephp.tech/#merge)

```php
merge(?iterable $source1, ?iterable $source2): array
```

Merges properties, numeric keys are appended.

### [mergeDeep](https://idlephp.tech/#mergeDeep)

```php
mergeDeep(array $iterables): array
```

Merges properties recursively, numeric keys are appended.

### [mergeLeft](https://idlephp.tech/#mergeLeft)

```php
mergeLeft(?iterable $left, ?iterable $right): array
```

calls `merge($right, $left)`

### [mergeWith](https://idlephp.tech/#mergeWith)

```php
mergeWith(callable $customizer, ?iterable $left, ?iterable $right): array
```

Like `merge` but if a key exists in both records, `$customizer` is called to the values associated with the key

### [modifyPath](https://idlephp.tech/#modifyPath)

```php
modifyPath(array|string|int $path, callable $updater, ?iterable $record)
```

Creates new record by applying an `$updater` function to the value at the given `$path`.

### [omit](https://idlephp.tech/#omit)

```php
omit(array $keys, ?iterable $collection): iterable
```

The opposite of `pick`. Returns record without `$keys`.

### [omitBy](https://idlephp.tech/#omitBy)

```php
omitBy(callable $predicate, ?iterable $record): iterable
```

The opposite of `pickBy`. Returns properties of `$record` that `$predicate` returns falsey for.

### [path](https://idlephp.tech/#path)

```php
path(array|string $path, ?iterable $collection)
```

Retrieve the value at a given path.

### [pick](https://idlephp.tech/#pick)

```php
pick(array $keys, ?iterable $collection): iterable
```

Returns record containing only `$keys`

### [pickBy](https://idlephp.tech/#pickBy)

```php
pickBy(callable $predicate, ?iterable $record): iterable
```

Returns record containing only keys `$predicate` returns truthy for.

### [pluck](https://idlephp.tech/#pluck)

```php
pluck(string|int $key, ?iterable $collection)
```

Returns a new array by plucking the same named property off all records in the array supplied.

### [prop](https://idlephp.tech/#prop)

```php
prop(string|int $key, ?iterable $record)
```

Return the specified property.

### [propEq](https://idlephp.tech/#propEq)

```php
propEq(string|int $key, $value, ?iterable $record): bool
```

Returns $record[$key] == $value

### [props](https://idlephp.tech/#props)

```php
props(array $paths, ?iterable $collection): array
```

Keys in, values out. Order is preserved.

### [setPath](https://idlephp.tech/#setPath)

```php
setPath($path, $value, ?iterable $record)
```

Return copy `$record` with `$path` set  with `$value`

### [toPairs](https://idlephp.tech/#toPairs)

```php
toPairs(?iterable $record): iterable
```

Converts a record into an array of `[$key, $value]`

### [where](https://idlephp.tech/#where)

```php
where(array $spec, ?iterable $record): bool
```

Checks if `$record` satisfies the spec by invoking the `$spec` properties with the corresponding properties of `$record`.

    
## String
### [escape](https://idlephp.tech/#escape)

```php
escape(string $s): string
```

Converts the characters "&", "<", ">", '"', and "'" to their corresponding HTML entities.

### [escapeRegExp](https://idlephp.tech/#escapeRegExp)

```php
escapeRegExp(string $regexp): string
```

Escapes regular expression

### [split](https://idlephp.tech/#split)

```php
split(string $separator, string $s): array
```

Splits string by `$separator`.

### [startsWith](https://idlephp.tech/#startsWith)

```php
startsWith(string $target, string $s): bool
```

If string starts with `$target`.

### [toLower](https://idlephp.tech/#toLower)

```php
toLower(string $s): string
```

Converts string to lower case

### [toUpper](https://idlephp.tech/#toUpper)

```php
toUpper(string $s): string
```

Converts string to upper case

### [words](https://idlephp.tech/#words)

```php
words(string $pattern, string $string): array
```

Splits string into an array of its words.

    
## Util
### [collect](https://idlephp.tech/#collect)

```php
collect(?iterable $iterable): array
```

Collects any iterable into `array`

### [eq](https://idlephp.tech/#eq)

```php
eq($value, $other): bool
```

Returns `$value` == `$other`

### [F](https://idlephp.tech/#F)

```php
F(...$args): bool
```

Always returns `false`

### [identity](https://idlephp.tech/#identity)

```php
identity($value)
```

Returns the first argument it receives.

### [now](https://idlephp.tech/#now)

```php
now(): int
```

Returns the timestamp of the number of seconds

### [size](https://idlephp.tech/#size)

```php
size(array|Countable|object|string|callable $value): int
```

Returns size of a countable, number of parameters of a function, lenght of string and number of properties of an object

### [T](https://idlephp.tech/#T)

```php
T(...$args): bool
```

Always returns `true`

    
