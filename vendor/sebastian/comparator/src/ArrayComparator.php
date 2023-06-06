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
 * Compares arrays for equality.
 */
class ArrayComparator extends Comparator
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
        return \is_array($expected) && \is_array($actual);
=======
        return is_array($expected) && is_array($actual);
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
        if ($canonicalize) {
            \sort($expected);
            \sort($actual);
        }

        $remaining        = $actual;
        $actualAsString   = "Array (\n";
        $expectedAsString = "Array (\n";
        $equal            = true;
=======
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false, array &$processed = array())
    {
        if ($canonicalize) {
            sort($expected);
            sort($actual);
        }

        $remaining = $actual;
        $expString = $actString = "Array (\n";
        $equal     = true;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        foreach ($expected as $key => $value) {
            unset($remaining[$key]);

<<<<<<< HEAD
            if (!\array_key_exists($key, $actual)) {
                $expectedAsString .= \sprintf(
=======
            if (!array_key_exists($key, $actual)) {
                $expString .= sprintf(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $this->exporter->shortenedExport($value)
                );

                $equal = false;

                continue;
            }

            try {
                $comparator = $this->factory->getComparatorFor($value, $actual[$key]);
                $comparator->assertEquals($value, $actual[$key], $delta, $canonicalize, $ignoreCase, $processed);

<<<<<<< HEAD
                $expectedAsString .= \sprintf(
=======
                $expString .= sprintf(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $this->exporter->shortenedExport($value)
                );
<<<<<<< HEAD

                $actualAsString .= \sprintf(
=======
                $actString .= sprintf(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $this->exporter->shortenedExport($actual[$key])
                );
            } catch (ComparisonFailure $e) {
<<<<<<< HEAD
                $expectedAsString .= \sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $e->getExpectedAsString() ? $this->indent($e->getExpectedAsString()) : $this->exporter->shortenedExport($e->getExpected())
                );

                $actualAsString .= \sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $e->getActualAsString() ? $this->indent($e->getActualAsString()) : $this->exporter->shortenedExport($e->getActual())
=======
                $expString .= sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $e->getExpectedAsString()
                    ? $this->indent($e->getExpectedAsString())
                    : $this->exporter->shortenedExport($e->getExpected())
                );

                $actString .= sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($key),
                    $e->getActualAsString()
                    ? $this->indent($e->getActualAsString())
                    : $this->exporter->shortenedExport($e->getActual())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                );

                $equal = false;
            }
        }

        foreach ($remaining as $key => $value) {
<<<<<<< HEAD
            $actualAsString .= \sprintf(
=======
            $actString .= sprintf(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                "    %s => %s\n",
                $this->exporter->export($key),
                $this->exporter->shortenedExport($value)
            );

            $equal = false;
        }

<<<<<<< HEAD
        $expectedAsString .= ')';
        $actualAsString .= ')';
=======
        $expString .= ')';
        $actString .= ')';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if (!$equal) {
            throw new ComparisonFailure(
                $expected,
                $actual,
<<<<<<< HEAD
                $expectedAsString,
                $actualAsString,
=======
                $expString,
                $actString,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                false,
                'Failed asserting that two arrays are equal.'
            );
        }
    }

    protected function indent($lines)
    {
<<<<<<< HEAD
        return \trim(\str_replace("\n", "\n    ", $lines));
=======
        return trim(str_replace("\n", "\n    ", $lines));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
