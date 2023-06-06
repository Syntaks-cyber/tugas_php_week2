<<<<<<< HEAD
<?php declare(strict_types=1);
=======
<?php
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
namespace PHPUnit\TextUI;

use const PHP_EOL;
use function array_map;
use function array_reverse;
use function count;
use function floor;
use function implode;
use function in_array;
use function is_int;
use function max;
use function preg_split;
use function sprintf;
use function str_pad;
use function str_repeat;
use function strlen;
use function trim;
use function vsprintf;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\InvalidArgumentException;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestFailure;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestResult;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\Color;
use PHPUnit\Util\Printer;
use SebastianBergmann\Environment\Console;
use SebastianBergmann\Timer\Timer;
use Throwable;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class ResultPrinter extends Printer implements TestListener
{
    public const EVENT_TEST_START = 0;

    public const EVENT_TEST_END = 1;

    public const EVENT_TESTSUITE_START = 2;

    public const EVENT_TESTSUITE_END = 3;

    public const COLOR_NEVER = 'never';

    public const COLOR_AUTO = 'auto';

    public const COLOR_ALWAYS = 'always';

    public const COLOR_DEFAULT = self::COLOR_NEVER;

    private const AVAILABLE_COLORS = [self::COLOR_NEVER, self::COLOR_AUTO, self::COLOR_ALWAYS];
=======

use SebastianBergmann\Environment\Console;

/**
 * Prints the result of a TextUI TestRunner run.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_TextUI_ResultPrinter extends PHPUnit_Util_Printer implements PHPUnit_Framework_TestListener
{
    const EVENT_TEST_START      = 0;
    const EVENT_TEST_END        = 1;
    const EVENT_TESTSUITE_START = 2;
    const EVENT_TESTSUITE_END   = 3;

    const COLOR_NEVER   = 'never';
    const COLOR_AUTO    = 'auto';
    const COLOR_ALWAYS  = 'always';
    const COLOR_DEFAULT = self::COLOR_NEVER;

    /**
     * @var array
     */
    private static $ansiCodes = array(
      'bold'       => 1,
      'fg-black'   => 30,
      'fg-red'     => 31,
      'fg-green'   => 32,
      'fg-yellow'  => 33,
      'fg-blue'    => 34,
      'fg-magenta' => 35,
      'fg-cyan'    => 36,
      'fg-white'   => 37,
      'bg-black'   => 40,
      'bg-red'     => 41,
      'bg-green'   => 42,
      'bg-yellow'  => 43,
      'bg-blue'    => 44,
      'bg-magenta' => 45,
      'bg-cyan'    => 46,
      'bg-white'   => 47
    );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int
     */
    protected $column = 0;

    /**
     * @var int
     */
    protected $maxColumn;

    /**
     * @var bool
     */
    protected $lastTestFailed = false;

    /**
     * @var int
     */
    protected $numAssertions = 0;

    /**
     * @var int
     */
    protected $numTests = -1;

    /**
     * @var int
     */
    protected $numTestsRun = 0;

    /**
     * @var int
     */
    protected $numTestsWidth;

    /**
     * @var bool
     */
    protected $colors = false;

    /**
     * @var bool
     */
    protected $debug = false;

    /**
     * @var bool
     */
    protected $verbose = false;

    /**
     * @var int
     */
    private $numberOfColumns;

    /**
<<<<<<< HEAD
     * @var bool
     */
    private $reverse;

    /**
     * @var bool
     */
    private $defectListPrinted = false;

    /**
     * Constructor.
     *
     * @param null|resource|string $out
     * @param int|string           $numberOfColumns
     *
     * @throws Exception
     */
    public function __construct($out = null, bool $verbose = false, string $colors = self::COLOR_DEFAULT, bool $debug = false, $numberOfColumns = 80, bool $reverse = false)
    {
        parent::__construct($out);

        if (!in_array($colors, self::AVAILABLE_COLORS, true)) {
            throw InvalidArgumentException::create(
                3,
                vsprintf('value from "%s", "%s" or "%s"', self::AVAILABLE_COLORS)
            );
        }

        if (!is_int($numberOfColumns) && $numberOfColumns !== 'max') {
            throw InvalidArgumentException::create(5, 'integer or "max"');
=======
     * Constructor.
     *
     * @param mixed      $out
     * @param bool       $verbose
     * @param string     $colors
     * @param bool       $debug
     * @param int|string $numberOfColumns
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.0.0
     */
    public function __construct($out = null, $verbose = false, $colors = self::COLOR_DEFAULT, $debug = false, $numberOfColumns = 80)
    {
        parent::__construct($out);

        if (!is_bool($verbose)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'boolean');
        }

        $availableColors = array(self::COLOR_NEVER, self::COLOR_AUTO, self::COLOR_ALWAYS);

        if (!in_array($colors, $availableColors)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                3,
                vsprintf('value from "%s", "%s" or "%s"', $availableColors)
            );
        }

        if (!is_bool($debug)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(4, 'boolean');
        }

        if (!is_int($numberOfColumns) && $numberOfColumns != 'max') {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(5, 'integer or "max"');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $console            = new Console;
        $maxNumberOfColumns = $console->getNumberOfColumns();

<<<<<<< HEAD
        if ($numberOfColumns === 'max' || ($numberOfColumns !== 80 && $numberOfColumns > $maxNumberOfColumns)) {
=======
        if ($numberOfColumns == 'max' || $numberOfColumns > $maxNumberOfColumns) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $numberOfColumns = $maxNumberOfColumns;
        }

        $this->numberOfColumns = $numberOfColumns;
        $this->verbose         = $verbose;
        $this->debug           = $debug;
<<<<<<< HEAD
        $this->reverse         = $reverse;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if ($colors === self::COLOR_AUTO && $console->hasColorSupport()) {
            $this->colors = true;
        } else {
            $this->colors = (self::COLOR_ALWAYS === $colors);
        }
    }

    /**
<<<<<<< HEAD
     * @throws \SebastianBergmann\Timer\RuntimeException
     */
    public function printResult(TestResult $result): void
    {
        $this->printHeader($result);
        $this->printErrors($result);
        $this->printWarnings($result);
        $this->printFailures($result);
        $this->printRisky($result);

        if ($this->verbose) {
            $this->printIncompletes($result);
=======
     * @param PHPUnit_Framework_TestResult $result
     */
    public function printResult(PHPUnit_Framework_TestResult $result)
    {
        $this->printHeader();

        $this->printErrors($result);
        $printSeparator = $result->errorCount() > 0;

        if ($printSeparator && $result->failureCount() > 0) {
            $this->write("\n--\n\n");
        }

        $printSeparator = $printSeparator || $result->failureCount() > 0;
        $this->printFailures($result);

        if ($this->verbose) {
            if ($printSeparator && $result->riskyCount() > 0) {
                $this->write("\n--\n\n");
            }

            $printSeparator = $printSeparator ||
                              $result->riskyCount() > 0;

            $this->printRisky($result);

            if ($printSeparator && $result->notImplementedCount() > 0) {
                $this->write("\n--\n\n");
            }

            $printSeparator = $printSeparator ||
                              $result->notImplementedCount() > 0;

            $this->printIncompletes($result);

            if ($printSeparator && $result->skippedCount() > 0) {
                $this->write("\n--\n\n");
            }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->printSkipped($result);
        }

        $this->printFooter($result);
    }

    /**
<<<<<<< HEAD
     * An error occurred.
     */
    public function addError(Test $test, Throwable $t, float $time): void
    {
        $this->writeProgressWithColor('fg-red, bold', 'E');
        $this->lastTestFailed = true;
    }

    /**
     * A failure occurred.
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        $this->writeProgressWithColor('bg-red, fg-white', 'F');
        $this->lastTestFailed = true;
    }

    /**
     * A warning occurred.
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
        $this->writeProgressWithColor('fg-yellow, bold', 'W');
        $this->lastTestFailed = true;
    }

    /**
     * Incomplete test.
     */
    public function addIncompleteTest(Test $test, Throwable $t, float $time): void
    {
        $this->writeProgressWithColor('fg-yellow, bold', 'I');
        $this->lastTestFailed = true;
    }

    /**
     * Risky test.
     */
    public function addRiskyTest(Test $test, Throwable $t, float $time): void
    {
        $this->writeProgressWithColor('fg-yellow, bold', 'R');
        $this->lastTestFailed = true;
    }

    /**
     * Skipped test.
     */
    public function addSkippedTest(Test $test, Throwable $t, float $time): void
    {
        $this->writeProgressWithColor('fg-cyan, bold', 'S');
        $this->lastTestFailed = true;
    }

    /**
     * A testsuite started.
     */
    public function startTestSuite(TestSuite $suite): void
    {
        if ($this->numTests == -1) {
            $this->numTests      = count($suite);
            $this->numTestsWidth = strlen((string) $this->numTests);
            $this->maxColumn     = $this->numberOfColumns - strlen('  /  (XXX%)') - (2 * $this->numTestsWidth);
        }
    }

    /**
     * A testsuite ended.
     */
    public function endTestSuite(TestSuite $suite): void
    {
    }

    /**
     * A test started.
     */
    public function startTest(Test $test): void
    {
        if ($this->debug) {
            $this->write(
                sprintf(
                    "Test '%s' started\n",
                    \PHPUnit\Util\Test::describeAsString($test)
                )
            );
        }
    }

    /**
     * A test ended.
     */
    public function endTest(Test $test, float $time): void
    {
        if ($this->debug) {
            $this->write(
                sprintf(
                    "Test '%s' ended\n",
                    \PHPUnit\Util\Test::describeAsString($test)
                )
            );
        }

        if (!$this->lastTestFailed) {
            $this->writeProgress('.');
        }

        if ($test instanceof TestCase) {
            $this->numAssertions += $test->getNumAssertions();
        } elseif ($test instanceof PhptTestCase) {
            $this->numAssertions++;
        }

        $this->lastTestFailed = false;

        if ($test instanceof TestCase && !$test->hasExpectationOnOutput()) {
            $this->write($test->getActualOutput());
        }
    }

    protected function printDefects(array $defects, string $type): void
=======
     * @param array  $defects
     * @param string $type
     */
    protected function printDefects(array $defects, $type)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $count = count($defects);

        if ($count == 0) {
            return;
        }

<<<<<<< HEAD
        if ($this->defectListPrinted) {
            $this->write("\n--\n\n");
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->write(
            sprintf(
                "There %s %d %s%s:\n",
                ($count == 1) ? 'was' : 'were',
                $count,
                $type,
                ($count == 1) ? '' : 's'
            )
        );

        $i = 1;

<<<<<<< HEAD
        if ($this->reverse) {
            $defects = array_reverse($defects);
        }

        foreach ($defects as $defect) {
            $this->printDefect($defect, $i++);
        }

        $this->defectListPrinted = true;
    }

    protected function printDefect(TestFailure $defect, int $count): void
=======
        foreach ($defects as $defect) {
            $this->printDefect($defect, $i++);
        }
    }

    /**
     * @param PHPUnit_Framework_TestFailure $defect
     * @param int                           $count
     */
    protected function printDefect(PHPUnit_Framework_TestFailure $defect, $count)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->printDefectHeader($defect, $count);
        $this->printDefectTrace($defect);
    }

<<<<<<< HEAD
    protected function printDefectHeader(TestFailure $defect, int $count): void
=======
    /**
     * @param PHPUnit_Framework_TestFailure $defect
     * @param int                           $count
     */
    protected function printDefectHeader(PHPUnit_Framework_TestFailure $defect, $count)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->write(
            sprintf(
                "\n%d) %s\n",
                $count,
                $defect->getTestName()
            )
        );
    }

<<<<<<< HEAD
    protected function printDefectTrace(TestFailure $defect): void
=======
    /**
     * @param PHPUnit_Framework_TestFailure $defect
     */
    protected function printDefectTrace(PHPUnit_Framework_TestFailure $defect)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $e = $defect->thrownException();
        $this->write((string) $e);

        while ($e = $e->getPrevious()) {
<<<<<<< HEAD
            $this->write("\nCaused by\n" . trim((string) $e) . "\n");
        }
    }

    protected function printErrors(TestResult $result): void
=======
            $this->write("\nCaused by\n" . $e);
        }
    }

    /**
     * @param PHPUnit_Framework_TestResult $result
     */
    protected function printErrors(PHPUnit_Framework_TestResult $result)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->printDefects($result->errors(), 'error');
    }

<<<<<<< HEAD
    protected function printFailures(TestResult $result): void
=======
    /**
     * @param PHPUnit_Framework_TestResult $result
     */
    protected function printFailures(PHPUnit_Framework_TestResult $result)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->printDefects($result->failures(), 'failure');
    }

<<<<<<< HEAD
    protected function printWarnings(TestResult $result): void
    {
        $this->printDefects($result->warnings(), 'warning');
    }

    protected function printIncompletes(TestResult $result): void
=======
    /**
     * @param PHPUnit_Framework_TestResult $result
     */
    protected function printIncompletes(PHPUnit_Framework_TestResult $result)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->printDefects($result->notImplemented(), 'incomplete test');
    }

<<<<<<< HEAD
    protected function printRisky(TestResult $result): void
=======
    /**
     * @param PHPUnit_Framework_TestResult $result
     *
     * @since  Method available since Release 4.0.0
     */
    protected function printRisky(PHPUnit_Framework_TestResult $result)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->printDefects($result->risky(), 'risky test');
    }

<<<<<<< HEAD
    protected function printSkipped(TestResult $result): void
=======
    /**
     * @param PHPUnit_Framework_TestResult $result
     *
     * @since  Method available since Release 3.0.0
     */
    protected function printSkipped(PHPUnit_Framework_TestResult $result)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->printDefects($result->skipped(), 'skipped test');
    }

<<<<<<< HEAD
    /**
     * @throws \SebastianBergmann\Timer\RuntimeException
     */
    protected function printHeader(TestResult $result): void
    {
        if (count($result) > 0) {
            $this->write(PHP_EOL . PHP_EOL . Timer::resourceUsage() . PHP_EOL . PHP_EOL);
        }
    }

    protected function printFooter(TestResult $result): void
=======
    protected function printHeader()
    {
        $this->write("\n\n" . PHP_Timer::resourceUsage() . "\n\n");
    }

    /**
     * @param PHPUnit_Framework_TestResult $result
     */
    protected function printFooter(PHPUnit_Framework_TestResult $result)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (count($result) === 0) {
            $this->writeWithColor(
                'fg-black, bg-yellow',
                'No tests executed!'
            );
<<<<<<< HEAD

            return;
        }

        if ($result->wasSuccessfulAndNoTestIsRiskyOrSkippedOrIncomplete()) {
=======
        } elseif ($result->wasSuccessful() &&
                 $result->allHarmless() &&
                 $result->allCompletelyImplemented() &&
                 $result->noneSkipped()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->writeWithColor(
                'fg-black, bg-green',
                sprintf(
                    'OK (%d test%s, %d assertion%s)',
                    count($result),
                    (count($result) == 1) ? '' : 's',
                    $this->numAssertions,
                    ($this->numAssertions == 1) ? '' : 's'
                )
            );
<<<<<<< HEAD

            return;
        }

        $color = 'fg-black, bg-yellow';

        if ($result->wasSuccessful()) {
            if ($this->verbose || !$result->allHarmless()) {
                $this->write("\n");
            }

            $this->writeWithColor(
                $color,
                'OK, but incomplete, skipped, or risky tests!'
            );
        } else {
            $this->write("\n");

            if ($result->errorCount()) {
                $color = 'fg-white, bg-red';

                $this->writeWithColor(
                    $color,
                    'ERRORS!'
                );
            } elseif ($result->failureCount()) {
                $color = 'fg-white, bg-red';

                $this->writeWithColor(
                    $color,
                    'FAILURES!'
                );
            } elseif ($result->warningCount()) {
                $color = 'fg-black, bg-yellow';

                $this->writeWithColor(
                    $color,
                    'WARNINGS!'
                );
            }
        }

        $this->writeCountString(count($result), 'Tests', $color, true);
        $this->writeCountString($this->numAssertions, 'Assertions', $color, true);
        $this->writeCountString($result->errorCount(), 'Errors', $color);
        $this->writeCountString($result->failureCount(), 'Failures', $color);
        $this->writeCountString($result->warningCount(), 'Warnings', $color);
        $this->writeCountString($result->skippedCount(), 'Skipped', $color);
        $this->writeCountString($result->notImplementedCount(), 'Incomplete', $color);
        $this->writeCountString($result->riskyCount(), 'Risky', $color);
        $this->writeWithColor($color, '.');
    }

    protected function writeProgress(string $progress): void
    {
        if ($this->debug) {
            return;
        }

=======
        } else {
            if ($result->wasSuccessful()) {
                $color = 'fg-black, bg-yellow';

                if ($this->verbose) {
                    $this->write("\n");
                }

                $this->writeWithColor(
                    $color,
                    'OK, but incomplete, skipped, or risky tests!'
                );
            } else {
                $color = 'fg-white, bg-red';

                $this->write("\n");
                $this->writeWithColor($color, 'FAILURES!');
            }

            $this->writeCountString(count($result), 'Tests', $color, true);
            $this->writeCountString($this->numAssertions, 'Assertions', $color, true);
            $this->writeCountString($result->errorCount(), 'Errors', $color);
            $this->writeCountString($result->failureCount(), 'Failures', $color);
            $this->writeCountString($result->skippedCount(), 'Skipped', $color);
            $this->writeCountString($result->notImplementedCount(), 'Incomplete', $color);
            $this->writeCountString($result->riskyCount(), 'Risky', $color);
            $this->writeWithColor($color, '.', true);
        }
    }

    /**
     */
    public function printWaitPrompt()
    {
        $this->write("\n<RETURN> to continue\n");
    }

    /**
     * An error occurred.
     *
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     */
    public function addError(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        $this->writeProgressWithColor('fg-red, bold', 'E');
        $this->lastTestFailed = true;
    }

    /**
     * A failure occurred.
     *
     * @param PHPUnit_Framework_Test                 $test
     * @param PHPUnit_Framework_AssertionFailedError $e
     * @param float                                  $time
     */
    public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time)
    {
        $this->writeProgressWithColor('bg-red, fg-white', 'F');
        $this->lastTestFailed = true;
    }

    /**
     * Incomplete test.
     *
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     */
    public function addIncompleteTest(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        $this->writeProgressWithColor('fg-yellow, bold', 'I');
        $this->lastTestFailed = true;
    }

    /**
     * Risky test.
     *
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     *
     * @since  Method available since Release 4.0.0
     */
    public function addRiskyTest(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        $this->writeProgressWithColor('fg-yellow, bold', 'R');
        $this->lastTestFailed = true;
    }

    /**
     * Skipped test.
     *
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     *
     * @since  Method available since Release 3.0.0
     */
    public function addSkippedTest(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        $this->writeProgressWithColor('fg-cyan, bold', 'S');
        $this->lastTestFailed = true;
    }

    /**
     * A testsuite started.
     *
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function startTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
        if ($this->numTests == -1) {
            $this->numTests      = count($suite);
            $this->numTestsWidth = strlen((string) $this->numTests);
            $this->maxColumn     = $this->numberOfColumns - strlen('  /  (XXX%)') - (2 * $this->numTestsWidth);
        }
    }

    /**
     * A testsuite ended.
     *
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function endTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
    }

    /**
     * A test started.
     *
     * @param PHPUnit_Framework_Test $test
     */
    public function startTest(PHPUnit_Framework_Test $test)
    {
        if ($this->debug) {
            $this->write(
                sprintf(
                    "\nStarting test '%s'.\n",
                    PHPUnit_Util_Test::describe($test)
                )
            );
        }
    }

    /**
     * A test ended.
     *
     * @param PHPUnit_Framework_Test $test
     * @param float                  $time
     */
    public function endTest(PHPUnit_Framework_Test $test, $time)
    {
        if (!$this->lastTestFailed) {
            $this->writeProgress('.');
        }

        if ($test instanceof PHPUnit_Framework_TestCase) {
            $this->numAssertions += $test->getNumAssertions();
        } elseif ($test instanceof PHPUnit_Extensions_PhptTestCase) {
            $this->numAssertions++;
        }

        $this->lastTestFailed = false;

        if ($test instanceof PHPUnit_Framework_TestCase) {
            if (!$test->hasExpectationOnOutput()) {
                $this->write($test->getActualOutput());
            }
        }
    }

    /**
     * @param string $progress
     */
    protected function writeProgress($progress)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->write($progress);
        $this->column++;
        $this->numTestsRun++;

<<<<<<< HEAD
        if ($this->column == $this->maxColumn || $this->numTestsRun == $this->numTests) {
            if ($this->numTestsRun == $this->numTests) {
                $this->write(str_repeat(' ', $this->maxColumn - $this->column));
            }

=======
        if ($this->column == $this->maxColumn) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->write(
                sprintf(
                    ' %' . $this->numTestsWidth . 'd / %' .
                    $this->numTestsWidth . 'd (%3s%%)',
                    $this->numTestsRun,
                    $this->numTests,
                    floor(($this->numTestsRun / $this->numTests) * 100)
                )
            );

<<<<<<< HEAD
            if ($this->column == $this->maxColumn) {
                $this->writeNewLine();
            }
        }
    }

    protected function writeNewLine(): void
=======
            $this->writeNewLine();
        }
    }

    protected function writeNewLine()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->column = 0;
        $this->write("\n");
    }

    /**
     * Formats a buffer with a specified ANSI color sequence if colors are
     * enabled.
<<<<<<< HEAD
     */
    protected function colorizeTextBox(string $color, string $buffer): string
=======
     *
     * @param string $color
     * @param string $buffer
     *
     * @return string
     *
     * @since  Method available since Release 4.0.0
     */
    protected function formatWithColor($color, $buffer)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->colors) {
            return $buffer;
        }

<<<<<<< HEAD
        $lines   = preg_split('/\r\n|\r|\n/', $buffer);
        $padding = max(array_map('\strlen', $lines));

        $styledLines = [];

        foreach ($lines as $line) {
            $styledLines[] = Color::colorize($color, str_pad($line, $padding));
        }

        return implode(PHP_EOL, $styledLines);
=======
        $codes   = array_map('trim', explode(',', $color));
        $lines   = explode("\n", $buffer);
        $padding = max(array_map('strlen', $lines));
        $styles  = array();

        foreach ($codes as $code) {
            $styles[] = self::$ansiCodes[$code];
        }

        $style = sprintf("\x1b[%sm", implode(';', $styles));

        $styledLines = array();

        foreach ($lines as $line) {
            $styledLines[] = $style . str_pad($line, $padding) . "\x1b[0m";
        }

        return implode("\n", $styledLines);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Writes a buffer out with a color sequence if colors are enabled.
<<<<<<< HEAD
     */
    protected function writeWithColor(string $color, string $buffer, bool $lf = true): void
    {
        $this->write($this->colorizeTextBox($color, $buffer));

        if ($lf) {
            $this->write(PHP_EOL);
=======
     *
     * @param string $color
     * @param string $buffer
     * @param bool   $lf
     *
     * @since  Method available since Release 4.0.0
     */
    protected function writeWithColor($color, $buffer, $lf = true)
    {
        $this->write($this->formatWithColor($color, $buffer));

        if ($lf) {
            $this->write("\n");
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * Writes progress with a color sequence if colors are enabled.
<<<<<<< HEAD
     */
    protected function writeProgressWithColor(string $color, string $buffer): void
    {
        $buffer = $this->colorizeTextBox($color, $buffer);
        $this->writeProgress($buffer);
    }

    private function writeCountString(int $count, string $name, string $color, bool $always = false): void
=======
     *
     * @param string $color
     * @param string $buffer
     *
     * @since  Method available since Release 4.0.0
     */
    protected function writeProgressWithColor($color, $buffer)
    {
        $buffer = $this->formatWithColor($color, $buffer);
        $this->writeProgress($buffer);
    }

    /**
     * @param int    $count
     * @param string $name
     * @param string $color
     * @param bool   $always
     *
     * @since  Method available since Release 4.6.5
     */
    private function writeCountString($count, $name, $color, $always = false)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        static $first = true;

        if ($always || $count > 0) {
            $this->writeWithColor(
                $color,
                sprintf(
                    '%s%s: %d',
                    !$first ? ', ' : '',
                    $name,
                    $count
                ),
                false
            );

            $first = false;
        }
    }
}
