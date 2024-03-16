<?php

use function Idles\{iterate, inc, take, pipe, collect};

describe('iterate', function () {
    it('calculates the sum of two numbers', function() {
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