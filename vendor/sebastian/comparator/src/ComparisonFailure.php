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
namespace SebastianBergmann\Comparator;

use SebastianBergmann\Diff\Differ;
use SebastianBergmann\Diff\Output\UnifiedDiffOutputBuilder;
=======

namespace SebastianBergmann\Comparator;

use SebastianBergmann\Diff\Differ;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Thrown when an assertion for string equality failed.
 */
class ComparisonFailure extends \RuntimeException
{
    /**
     * Expected value of the retrieval which does not match $actual.
<<<<<<< HEAD
     *
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @var mixed
     */
    protected $expected;

    /**
     * Actually retrieved value which does not match $expected.
<<<<<<< HEAD
     *
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @var mixed
     */
    protected $actual;

    /**
     * The string representation of the expected value
<<<<<<< HEAD
     *
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @var string
     */
    protected $expectedAsString;

    /**
     * The string representation of the actual value
<<<<<<< HEAD
     *
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @var string
     */
    protected $actualAsString;

    /**
     * @var bool
     */
    protected $identical;

    /**
     * Optional message which is placed in front of the first line
     * returned by toString().
<<<<<<< HEAD
     *
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @var string
     */
    protected $message;

    /**
     * Initialises with the expected value and the actual value.
     *
<<<<<<< HEAD
     * @param mixed  $expected         expected value retrieved
     * @param mixed  $actual           actual value retrieved
     * @param string $expectedAsString
     * @param string $actualAsString
     * @param bool   $identical
     * @param string $message          a string which is prefixed on all returned lines
     *                                 in the difference output
=======
     * @param mixed  $expected         Expected value retrieved.
     * @param mixed  $actual           Actual value retrieved.
     * @param string $expectedAsString
     * @param string $actualAsString
     * @param bool   $identical
     * @param string $message          A string which is prefixed on all returned lines
     *                                 in the difference output.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function __construct($expected, $actual, $expectedAsString, $actualAsString, $identical = false, $message = '')
    {
        $this->expected         = $expected;
        $this->actual           = $actual;
        $this->expectedAsString = $expectedAsString;
        $this->actualAsString   = $actualAsString;
        $this->message          = $message;
    }

<<<<<<< HEAD
=======
    /**
     * @return mixed
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function getActual()
    {
        return $this->actual;
    }

<<<<<<< HEAD
=======
    /**
     * @return mixed
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function getExpected()
    {
        return $this->expected;
    }

    /**
     * @return string
     */
    public function getActualAsString()
    {
        return $this->actualAsString;
    }

    /**
     * @return string
     */
    public function getExpectedAsString()
    {
        return $this->expectedAsString;
    }

    /**
     * @return string
     */
    public function getDiff()
    {
        if (!$this->actualAsString && !$this->expectedAsString) {
            return '';
        }

<<<<<<< HEAD
        $differ = new Differ(new UnifiedDiffOutputBuilder("\n--- Expected\n+++ Actual\n"));
=======
        $differ = new Differ("\n--- Expected\n+++ Actual\n");
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $differ->diff($this->expectedAsString, $this->actualAsString);
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->message . $this->getDiff();
    }
}
