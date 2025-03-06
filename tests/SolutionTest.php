<?php

require_once __DIR__ . '/../src/Solution.php';

use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    private Solution $solution;

    protected function setUp(): void {
        $this->solution = new Solution();
    }

    /**
     * @dataProvider provider
     */
    public function testGeneric(array $input, array $expected): void {
        $this->assertSame($expected, $this->solution->findUniqueSingle($input));
    }

    public static function provider(): array {
        return [
            [[1, 2, 3, 4, 1, 2, 3], [4]],
            [[11, 21, 33.4, 18, 21, 33.39999, 33.4], [11, 18, 33.39999]],

            [[], []], //totally empty
            [[6], [6]], //only one value
            [[-1, -2, -1, 0], [-2, 0]], //negative
            [[PHP_INT_MIN, PHP_INT_MAX], [PHP_INT_MIN, PHP_INT_MAX]], //min and max int
            [[1.0000001, 1.0000002], [1.0000001, 1.0000002]], //floats
            [[1,2,3,4,5], [1,2,3,4,5]], //every value is unique
            [[null, false, "", 0, null, false], [0]], //everything changes to empty string, except 0
            [[INF, -INF, NAN, NAN, INF, -INF], []], //infinity and NaN

            /**
             * `(string)2` → `"2"`
             * `(string)"2"` → `"2"`
             * `(string)2.0` → `"2"`
             * `(string)"2.0"` → `"2.0"`

             * This is why the only unique value is `"2.0"`.
             */
            [[2, "2", 2.0, "2.0"], ["2.0"]], //different types
        ];
    }
}