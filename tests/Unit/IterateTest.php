<?php

use function Idles\{iterate, inc, take, pipe, collect};

describe('iterate', function () {
    it('returns a lazy iterable of x, (f x), (f (f x)) etc', function() {
        expect(
          pipe(
            take(5),
            collect(...)
          )(iterate(inc(...), 1))
        )->toBe(
          [1, 2, 3, 4, 5]
        );
    });
});