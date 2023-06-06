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
 * Compares DateTimeInterface instances for equality.
 */
class DateTimeComparator extends ObjectComparator
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
        return ($expected instanceof \DateTime || $expected instanceof \DateTimeInterface) &&
<<<<<<< HEAD
               ($actual instanceof \DateTime || $actual instanceof \DateTimeInterface);
=======
            ($actual instanceof \DateTime || $actual instanceof \DateTimeInterface);
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
<<<<<<< HEAD
     * @throws \Exception
     * @throws ComparisonFailure
     */
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false, array &$processed = [])
    {
        /** @var \DateTimeInterface $expected */
        /** @var \DateTimeInterface $actual */
        $absDelta = \abs($delta);
        $delta    = new \DateInterval(\sprintf('PT%dS', $absDelta));
        $delta->f = $absDelta - \floor($absDelta);

        $actualClone = (clone $actual)
            ->setTimezone(new \DateTimeZone('UTC'));

        $expectedLower = (clone $expected)
            ->setTimezone(new \DateTimeZone('UTC'))
            ->sub($delta);

        $expectedUpper = (clone $expected)
            ->setTimezone(new \DateTimeZone('UTC'))
            ->add($delta);

        if ($actualClone < $expectedLower || $actualClone > $expectedUpper) {
=======
     * @throws ComparisonFailure
     */
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false, array &$processed = array())
    {
        $delta = new \DateInterval(sprintf('PT%sS', abs($delta)));

        $expectedLower = clone $expected;
        $expectedUpper = clone $expected;

        if ($actual < $expectedLower->sub($delta) ||
            $actual > $expectedUpper->add($delta)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            throw new ComparisonFailure(
                $expected,
                $actual,
                $this->dateTimeToString($expected),
                $this->dateTimeToString($actual),
                false,
                'Failed asserting that two DateTime objects are equal.'
            );
        }
    }

    /**
     * Returns an ISO 8601 formatted string representation of a datetime or
     * 'Invalid DateTimeInterface object' if the provided DateTimeInterface was not properly
     * initialized.
<<<<<<< HEAD
     */
    private function dateTimeToString(\DateTimeInterface $datetime): string
    {
        $string = $datetime->format('Y-m-d\TH:i:s.uO');

        return $string ?: 'Invalid DateTimeInterface object';
=======
     *
     * @param  \DateTimeInterface $datetime
     * @return string
     */
    private function dateTimeToString($datetime)
    {
        $string = $datetime->format('Y-m-d\TH:i:s.uO');

        return $string ? $string : 'Invalid DateTimeInterface object';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
