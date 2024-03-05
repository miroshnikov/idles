<?php

use function Idles\add;

describe('add', function () {
    it('calculates the sum of two numbers', function() {
        expect(add(3,5))->toBe(8);
    });
});
