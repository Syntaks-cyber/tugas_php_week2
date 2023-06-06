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
 * Compares objects for equality.
 */
class ObjectComparator extends ArrayComparator
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
        return \is_object($expected) && \is_object($actual);
=======
        return is_object($expected) && is_object($actual);
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
     * @param array $processed    List of already processed elements (used to prevent infinite recursion)
     *
     * @throws ComparisonFailure
     */
<<<<<<< HEAD
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false, array &$processed = [])
    {
        if (\get_class($actual) !== \get_class($expected)) {
=======
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false, array &$processed = array())
    {
        if (get_class($actual) !== get_class($expected)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            throw new ComparisonFailure(
                $expected,
                $actual,
                $this->exporter->export($expected),
                $this->exporter->export($actual),
                false,
<<<<<<< HEAD
                \sprintf(
                    '%s is not instance of expected class "%s".',
                    $this->exporter->export($actual),
                    \get_class($expected)
=======
                sprintf(
                    '%s is not instance of expected class "%s".',
                    $this->exporter->export($actual),
                    get_class($expected)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                )
            );
        }

        // don't compare twice to allow for cyclic dependencies
<<<<<<< HEAD
        if (\in_array([$actual, $expected], $processed, true) ||
            \in_array([$expected, $actual], $processed, true)) {
            return;
        }

        $processed[] = [$actual, $expected];
=======
        if (in_array(array($actual, $expected), $processed, true) ||
            in_array(array($expected, $actual), $processed, true)) {
            return;
        }

        $processed[] = array($actual, $expected);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        // don't compare objects if they are identical
        // this helps to avoid the error "maximum function nesting level reached"
        // CAUTION: this conditional clause is not tested
        if ($actual !== $expected) {
            try {
                parent::assertEquals(
                    $this->toArray($expected),
                    $this->toArray($actual),
                    $delta,
                    $canonicalize,
                    $ignoreCase,
                    $processed
                );
            } catch (ComparisonFailure $e) {
                throw new ComparisonFailure(
                    $expected,
                    $actual,
                    // replace "Array" with "MyClass object"
<<<<<<< HEAD
                    \substr_replace($e->getExpectedAsString(), \get_class($expected) . ' Object', 0, 5),
                    \substr_replace($e->getActualAsString(), \get_class($actual) . ' Object', 0, 5),
=======
                    substr_replace($e->getExpectedAsString(), get_class($expected) . ' Object', 0, 5),
                    substr_replace($e->getActualAsString(), get_class($actual) . ' Object', 0, 5),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    false,
                    'Failed asserting that two objects are equal.'
                );
            }
        }
    }

    /**
     * Converts an object to an array containing all of its private, protected
     * and public properties.
     *
<<<<<<< HEAD
     * @param object $object
     *
=======
     * @param  object $object
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return array
     */
    protected function toArray($object)
    {
        return $this->exporter->toArray($object);
    }
}
