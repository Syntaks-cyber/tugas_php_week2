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
 * Compares doubles for equality.
<<<<<<< HEAD
 *
 * @deprecated since v3.0.5 and v4.0.8
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class DoubleComparator extends NumericComparator
{
    /**
     * Smallest value available in PHP.
     *
     * @var float
     */
    const EPSILON = 0.0000000001;

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
        return (\is_float($expected) || \is_float($actual)) && \is_numeric($expected) && \is_numeric($actual);
=======
        return (is_double($expected) || is_double($actual)) && is_numeric($expected) && is_numeric($actual);
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
        if ($delta == 0) {
            $delta = self::EPSILON;
        }

        parent::assertEquals($expected, $actual, $delta, $canonicalize, $ignoreCase);
    }
}
