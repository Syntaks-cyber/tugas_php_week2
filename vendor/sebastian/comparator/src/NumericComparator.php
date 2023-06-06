<?php
/*
<<<<<<< HEAD
 * This file is part of sebastian/comparator.
=======
 * This file is part of the Comparator package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
=======

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
namespace SebastianBergmann\Comparator;

/**
 * Compares numerical values for equality.
 */
class NumericComparator extends ScalarComparator
{
    /**
     * Returns whether the comparator can compare two values.
     *
<<<<<<< HEAD
     * @param mixed $expected The first value to compare
     * @param mixed $actual   The second value to compare
     *
=======
     * @param  mixed $expected The first value to compare
     * @param  mixed $actual   The second value to compare
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return bool
     */
    public function accepts($expected, $actual)
    {
<<<<<<< HEAD
        // all numerical values, but not if both of them are strings
        return \is_numeric($expected) && \is_numeric($actual) &&
               !(\is_string($expected) && \is_string($actual));
=======
        // all numerical values, but not if one of them is a double
        // or both of them are strings
        return is_numeric($expected) && is_numeric($actual) &&
               !(is_double($expected) || is_double($actual)) &&
               !(is_string($expected) && is_string($actual));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that two values are equal.
     *
     * @param mixed $expected     First value to compare
     * @param mixed $actual       Second value to compare
     * @param float $delta        Allowed numerical distance between two values to consider them equal
     * @param bool  $canonicalize Arrays are sorted before comparison when set to true
     * @param bool  $ignoreCase   Case is ignored when set to true
     *
     * @throws ComparisonFailure
     */
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false)
    {
<<<<<<< HEAD
        if (\is_infinite($actual) && \is_infinite($expected)) {
            return; // @codeCoverageIgnore
        }

        if ((\is_infinite($actual) xor \is_infinite($expected)) ||
            (\is_nan($actual) || \is_nan($expected)) ||
            \abs($actual - $expected) > $delta) {
=======
        if (is_infinite($actual) && is_infinite($expected)) {
            return;
        }

        if ((is_infinite($actual) xor is_infinite($expected)) ||
            (is_nan($actual) or is_nan($expected)) ||
            abs($actual - $expected) > $delta) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            throw new ComparisonFailure(
                $expected,
                $actual,
                '',
                '',
                false,
<<<<<<< HEAD
                \sprintf(
=======
                sprintf(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    'Failed asserting that %s matches expected %s.',
                    $this->exporter->export($actual),
                    $this->exporter->export($expected)
                )
            );
        }
    }
}
