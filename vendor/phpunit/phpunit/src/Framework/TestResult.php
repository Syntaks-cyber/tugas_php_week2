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
namespace PHPUnit\Framework;

use const PHP_EOL;
use function class_exists;
use function count;
use function extension_loaded;
use function function_exists;
use function get_class;
use function sprintf;
use function xdebug_get_monitored_functions;
use function xdebug_is_debugger_active;
use function xdebug_start_function_monitor;
use function xdebug_stop_function_monitor;
use AssertionError;
use Countable;
use Error;
use PHPUnit\Framework\MockObject\Exception as MockObjectException;
use PHPUnit\Util\Blacklist;
use PHPUnit\Util\ErrorHandler;
use PHPUnit\Util\Printer;
use PHPUnit\Util\Test as TestUtil;
use ReflectionClass;
use ReflectionException;
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException as OriginalCoveredCodeNotExecutedException;
use SebastianBergmann\CodeCoverage\Exception as OriginalCodeCoverageException;
use SebastianBergmann\CodeCoverage\MissingCoversAnnotationException as OriginalMissingCoversAnnotationException;
use SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException;
use SebastianBergmann\Invoker\Invoker;
use SebastianBergmann\Invoker\TimeoutException;
use SebastianBergmann\ResourceOperations\ResourceOperations;
use SebastianBergmann\Timer\Timer;
use Throwable;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TestResult implements Countable
=======

/**
 * A TestResult collects the results of executing a test case.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Framework_TestResult implements Countable
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var array
     */
<<<<<<< HEAD
    private $passed = [];

    /**
     * @var TestFailure[]
     */
    private $errors = [];

    /**
     * @var TestFailure[]
     */
    private $failures = [];

    /**
     * @var TestFailure[]
     */
    private $warnings = [];

    /**
     * @var TestFailure[]
     */
    private $notImplemented = [];

    /**
     * @var TestFailure[]
     */
    private $risky = [];

    /**
     * @var TestFailure[]
     */
    private $skipped = [];

    /**
     * @deprecated Use the `TestHook` interfaces instead
     *
     * @var TestListener[]
     */
    private $listeners = [];
=======
    protected $passed = array();

    /**
     * @var array
     */
    protected $errors = array();

    /**
     * @var array
     */
    protected $failures = array();

    /**
     * @var array
     */
    protected $notImplemented = array();

    /**
     * @var array
     */
    protected $risky = array();

    /**
     * @var array
     */
    protected $skipped = array();

    /**
     * @var array
     */
    protected $listeners = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int
     */
<<<<<<< HEAD
    private $runTests = 0;
=======
    protected $runTests = 0;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var float
     */
<<<<<<< HEAD
    private $time = 0;

    /**
     * @var TestSuite
     */
    private $topTestSuite;
=======
    protected $time = 0;

    /**
     * @var PHPUnit_Framework_TestSuite
     */
    protected $topTestSuite = null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Code Coverage information.
     *
<<<<<<< HEAD
     * @var CodeCoverage
     */
    private $codeCoverage;
=======
     * @var PHP_CodeCoverage
     */
    protected $codeCoverage;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $convertDeprecationsToExceptions = false;
=======
    protected $convertErrorsToExceptions = true;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $convertErrorsToExceptions = true;
=======
    protected $stop = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $convertNoticesToExceptions = true;
=======
    protected $stopOnError = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $convertWarningsToExceptions = true;
=======
    protected $stopOnFailure = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $stop = false;
=======
    protected $beStrictAboutTestsThatDoNotTestAnything = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $stopOnError = false;
=======
    protected $beStrictAboutOutputDuringTests = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $stopOnFailure = false;
=======
    protected $beStrictAboutTestSize = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $stopOnWarning = false;
=======
    protected $beStrictAboutTodoAnnotatedTests = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $beStrictAboutTestsThatDoNotTestAnything = true;
=======
    protected $stopOnRisky = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $beStrictAboutOutputDuringTests = false;
=======
    protected $stopOnIncomplete = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $beStrictAboutTodoAnnotatedTests = false;
=======
    protected $stopOnSkipped = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $beStrictAboutResourceUsageDuringSmallTests = false;

    /**
     * @var bool
     */
    private $enforceTimeLimit = false;
=======
    protected $lastTestFailed = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int
     */
<<<<<<< HEAD
    private $timeoutForSmallTests = 1;
=======
    protected $timeoutForSmallTests = 1;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int
     */
<<<<<<< HEAD
    private $timeoutForMediumTests = 10;
=======
    protected $timeoutForMediumTests = 10;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int
     */
<<<<<<< HEAD
    private $timeoutForLargeTests = 60;

    /**
     * @var bool
     */
    private $stopOnRisky = false;

    /**
     * @var bool
     */
    private $stopOnIncomplete = false;

    /**
     * @var bool
     */
    private $stopOnSkipped = false;

    /**
     * @var bool
     */
    private $lastTestFailed = false;

    /**
     * @var int
     */
    private $defaultTimeLimit = 0;

    /**
     * @var bool
     */
    private $stopOnDefect = false;

    /**
     * @var bool
     */
    private $registerMockObjectsFromTestArgumentsRecursively = false;

    /**
     * @deprecated Use the `TestHook` interfaces instead
     *
     * @codeCoverageIgnore
     *
     * Registers a TestListener.
     */
    public function addListener(TestListener $listener): void
=======
    protected $timeoutForLargeTests = 60;

    /**
     * Registers a TestListener.
     *
     * @param  PHPUnit_Framework_TestListener
     */
    public function addListener(PHPUnit_Framework_TestListener $listener)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->listeners[] = $listener;
    }

    /**
<<<<<<< HEAD
     * @deprecated Use the `TestHook` interfaces instead
     *
     * @codeCoverageIgnore
     *
     * Unregisters a TestListener.
     */
    public function removeListener(TestListener $listener): void
=======
     * Unregisters a TestListener.
     *
     * @param PHPUnit_Framework_TestListener $listener
     */
    public function removeListener(PHPUnit_Framework_TestListener $listener)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        foreach ($this->listeners as $key => $_listener) {
            if ($listener === $_listener) {
                unset($this->listeners[$key]);
            }
        }
    }

    /**
<<<<<<< HEAD
     * @deprecated Use the `TestHook` interfaces instead
     *
     * @codeCoverageIgnore
     *
     * Flushes all flushable TestListeners.
     */
    public function flushListeners(): void
    {
        foreach ($this->listeners as $listener) {
            if ($listener instanceof Printer) {
=======
     * Flushes all flushable TestListeners.
     *
     * @since  Method available since Release 3.0.0
     */
    public function flushListeners()
    {
        foreach ($this->listeners as $listener) {
            if ($listener instanceof PHPUnit_Util_Printer) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $listener->flush();
            }
        }
    }

    /**
     * Adds an error to the list of errors.
<<<<<<< HEAD
     */
    public function addError(Test $test, Throwable $t, float $time): void
    {
        if ($t instanceof RiskyTestError) {
            $this->risky[] = new TestFailure($test, $t);
            $notifyMethod  = 'addRiskyTest';

            if ($test instanceof TestCase) {
                $test->markAsRisky();
            }

            if ($this->stopOnRisky || $this->stopOnDefect) {
                $this->stop();
            }
        } elseif ($t instanceof IncompleteTest) {
            $this->notImplemented[] = new TestFailure($test, $t);
=======
     *
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     */
    public function addError(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        if ($e instanceof PHPUnit_Framework_RiskyTest) {
            $this->risky[] = new PHPUnit_Framework_TestFailure($test, $e);
            $notifyMethod  = 'addRiskyTest';

            if ($this->stopOnRisky) {
                $this->stop();
            }
        } elseif ($e instanceof PHPUnit_Framework_IncompleteTest) {
            $this->notImplemented[] = new PHPUnit_Framework_TestFailure($test, $e);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $notifyMethod           = 'addIncompleteTest';

            if ($this->stopOnIncomplete) {
                $this->stop();
            }
<<<<<<< HEAD
        } elseif ($t instanceof SkippedTest) {
            $this->skipped[] = new TestFailure($test, $t);
=======
        } elseif ($e instanceof PHPUnit_Framework_SkippedTest) {
            $this->skipped[] = new PHPUnit_Framework_TestFailure($test, $e);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $notifyMethod    = 'addSkippedTest';

            if ($this->stopOnSkipped) {
                $this->stop();
            }
        } else {
<<<<<<< HEAD
            $this->errors[] = new TestFailure($test, $t);
=======
            $this->errors[] = new PHPUnit_Framework_TestFailure($test, $e);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $notifyMethod   = 'addError';

            if ($this->stopOnError || $this->stopOnFailure) {
                $this->stop();
            }
        }

<<<<<<< HEAD
        // @see https://github.com/sebastianbergmann/phpunit/issues/1953
        if ($t instanceof Error) {
            $t = new ExceptionWrapper($t);
        }

        foreach ($this->listeners as $listener) {
            $listener->{$notifyMethod}($test, $t, $time);
        }

        $this->lastTestFailed = true;
        $this->time += $time;
    }

    /**
     * Adds a warning to the list of warnings.
     * The passed in exception caused the warning.
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
        if ($this->stopOnWarning || $this->stopOnDefect) {
            $this->stop();
        }

        $this->warnings[] = new TestFailure($test, $e);

        foreach ($this->listeners as $listener) {
            $listener->addWarning($test, $e, $time);
        }

        $this->time += $time;
=======
        foreach ($this->listeners as $listener) {
            $listener->$notifyMethod($test, $e, $time);
        }

        $this->lastTestFailed = true;
        $this->time          += $time;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Adds a failure to the list of failures.
     * The passed in exception caused the failure.
<<<<<<< HEAD
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        if ($e instanceof RiskyTestError || $e instanceof OutputError) {
            $this->risky[] = new TestFailure($test, $e);
            $notifyMethod  = 'addRiskyTest';

            if ($test instanceof TestCase) {
                $test->markAsRisky();
            }

            if ($this->stopOnRisky || $this->stopOnDefect) {
                $this->stop();
            }
        } elseif ($e instanceof IncompleteTest) {
            $this->notImplemented[] = new TestFailure($test, $e);
=======
     *
     * @param PHPUnit_Framework_Test                 $test
     * @param PHPUnit_Framework_AssertionFailedError $e
     * @param float                                  $time
     */
    public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time)
    {
        if ($e instanceof PHPUnit_Framework_RiskyTest ||
            $e instanceof PHPUnit_Framework_OutputError) {
            $this->risky[] = new PHPUnit_Framework_TestFailure($test, $e);
            $notifyMethod  = 'addRiskyTest';

            if ($this->stopOnRisky) {
                $this->stop();
            }
        } elseif ($e instanceof PHPUnit_Framework_IncompleteTest) {
            $this->notImplemented[] = new PHPUnit_Framework_TestFailure($test, $e);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $notifyMethod           = 'addIncompleteTest';

            if ($this->stopOnIncomplete) {
                $this->stop();
            }
<<<<<<< HEAD
        } elseif ($e instanceof SkippedTest) {
            $this->skipped[] = new TestFailure($test, $e);
=======
        } elseif ($e instanceof PHPUnit_Framework_SkippedTest) {
            $this->skipped[] = new PHPUnit_Framework_TestFailure($test, $e);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $notifyMethod    = 'addSkippedTest';

            if ($this->stopOnSkipped) {
                $this->stop();
            }
        } else {
<<<<<<< HEAD
            $this->failures[] = new TestFailure($test, $e);
            $notifyMethod     = 'addFailure';

            if ($this->stopOnFailure || $this->stopOnDefect) {
=======
            $this->failures[] = new PHPUnit_Framework_TestFailure($test, $e);
            $notifyMethod     = 'addFailure';

            if ($this->stopOnFailure) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $this->stop();
            }
        }

        foreach ($this->listeners as $listener) {
<<<<<<< HEAD
            $listener->{$notifyMethod}($test, $e, $time);
        }

        $this->lastTestFailed = true;
        $this->time += $time;
    }

    /**
     * Informs the result that a test suite will be started.
     */
    public function startTestSuite(TestSuite $suite): void
=======
            $listener->$notifyMethod($test, $e, $time);
        }

        $this->lastTestFailed = true;
        $this->time          += $time;
    }

    /**
     * Informs the result that a testsuite will be started.
     *
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function startTestSuite(PHPUnit_Framework_TestSuite $suite)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($this->topTestSuite === null) {
            $this->topTestSuite = $suite;
        }

        foreach ($this->listeners as $listener) {
            $listener->startTestSuite($suite);
        }
    }

    /**
<<<<<<< HEAD
     * Informs the result that a test suite was completed.
     */
    public function endTestSuite(TestSuite $suite): void
=======
     * Informs the result that a testsuite was completed.
     *
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function endTestSuite(PHPUnit_Framework_TestSuite $suite)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        foreach ($this->listeners as $listener) {
            $listener->endTestSuite($suite);
        }
    }

    /**
     * Informs the result that a test will be started.
<<<<<<< HEAD
     */
    public function startTest(Test $test): void
    {
        $this->lastTestFailed = false;
        $this->runTests += count($test);
=======
     *
     * @param PHPUnit_Framework_Test $test
     */
    public function startTest(PHPUnit_Framework_Test $test)
    {
        $this->lastTestFailed = false;
        $this->runTests      += count($test);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        foreach ($this->listeners as $listener) {
            $listener->startTest($test);
        }
    }

    /**
     * Informs the result that a test was completed.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function endTest(Test $test, float $time): void
=======
     * @param PHPUnit_Framework_Test $test
     * @param float                  $time
     */
    public function endTest(PHPUnit_Framework_Test $test, $time)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        foreach ($this->listeners as $listener) {
            $listener->endTest($test, $time);
        }

<<<<<<< HEAD
        if (!$this->lastTestFailed && $test instanceof TestCase) {
            $class = get_class($test);
            $key   = $class . '::' . $test->getName();

            $this->passed[$key] = [
                'result' => $test->getResult(),
                'size'   => TestUtil::getSize(
                    $class,
                    $test->getName(false)
                ),
            ];
=======
        if (!$this->lastTestFailed && $test instanceof PHPUnit_Framework_TestCase) {
            $class  = get_class($test);
            $key    = $class . '::' . $test->getName();

            $this->passed[$key] = array(
                'result' => $test->getResult(),
                'size'   => PHPUnit_Util_Test::getSize(
                    $class,
                    $test->getName(false)
                )
            );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            $this->time += $time;
        }
    }

    /**
     * Returns true if no risky test occurred.
<<<<<<< HEAD
     */
    public function allHarmless(): bool
=======
     *
     * @return bool
     *
     * @since  Method available since Release 4.0.0
     */
    public function allHarmless()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->riskyCount() == 0;
    }

    /**
     * Gets the number of risky tests.
<<<<<<< HEAD
     */
    public function riskyCount(): int
=======
     *
     * @return int
     *
     * @since  Method available since Release 4.0.0
     */
    public function riskyCount()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return count($this->risky);
    }

    /**
     * Returns true if no incomplete test occurred.
<<<<<<< HEAD
     */
    public function allCompletelyImplemented(): bool
=======
     *
     * @return bool
     */
    public function allCompletelyImplemented()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->notImplementedCount() == 0;
    }

    /**
     * Gets the number of incomplete tests.
<<<<<<< HEAD
     */
    public function notImplementedCount(): int
=======
     *
     * @return int
     */
    public function notImplementedCount()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return count($this->notImplemented);
    }

    /**
<<<<<<< HEAD
     * Returns an array of TestFailure objects for the risky tests.
     *
     * @return TestFailure[]
     */
    public function risky(): array
=======
     * Returns an Enumeration for the risky tests.
     *
     * @return array
     *
     * @since  Method available since Release 4.0.0
     */
    public function risky()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->risky;
    }

    /**
<<<<<<< HEAD
     * Returns an array of TestFailure objects for the incomplete tests.
     *
     * @return TestFailure[]
     */
    public function notImplemented(): array
=======
     * Returns an Enumeration for the incomplete tests.
     *
     * @return array
     */
    public function notImplemented()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->notImplemented;
    }

    /**
     * Returns true if no test has been skipped.
<<<<<<< HEAD
     */
    public function noneSkipped(): bool
=======
     *
     * @return bool
     *
     * @since  Method available since Release 3.0.0
     */
    public function noneSkipped()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->skippedCount() == 0;
    }

    /**
     * Gets the number of skipped tests.
<<<<<<< HEAD
     */
    public function skippedCount(): int
=======
     *
     * @return int
     *
     * @since  Method available since Release 3.0.0
     */
    public function skippedCount()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return count($this->skipped);
    }

    /**
<<<<<<< HEAD
     * Returns an array of TestFailure objects for the skipped tests.
     *
     * @return TestFailure[]
     */
    public function skipped(): array
=======
     * Returns an Enumeration for the skipped tests.
     *
     * @return array
     *
     * @since  Method available since Release 3.0.0
     */
    public function skipped()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->skipped;
    }

    /**
     * Gets the number of detected errors.
<<<<<<< HEAD
     */
    public function errorCount(): int
=======
     *
     * @return int
     */
    public function errorCount()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return count($this->errors);
    }

    /**
<<<<<<< HEAD
     * Returns an array of TestFailure objects for the errors.
     *
     * @return TestFailure[]
     */
    public function errors(): array
=======
     * Returns an Enumeration for the errors.
     *
     * @return array
     */
    public function errors()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->errors;
    }

    /**
     * Gets the number of detected failures.
<<<<<<< HEAD
     */
    public function failureCount(): int
=======
     *
     * @return int
     */
    public function failureCount()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return count($this->failures);
    }

    /**
<<<<<<< HEAD
     * Returns an array of TestFailure objects for the failures.
     *
     * @return TestFailure[]
     */
    public function failures(): array
=======
     * Returns an Enumeration for the failures.
     *
     * @return array
     */
    public function failures()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->failures;
    }

    /**
<<<<<<< HEAD
     * Gets the number of detected warnings.
     */
    public function warningCount(): int
    {
        return count($this->warnings);
    }

    /**
     * Returns an array of TestFailure objects for the warnings.
     *
     * @return TestFailure[]
     */
    public function warnings(): array
    {
        return $this->warnings;
    }

    /**
     * Returns the names of the tests that have passed.
     */
    public function passed(): array
=======
     * Returns the names of the tests that have passed.
     *
     * @return array
     *
     * @since  Method available since Release 3.4.0
     */
    public function passed()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->passed;
    }

    /**
     * Returns the (top) test suite.
<<<<<<< HEAD
     */
    public function topTestSuite(): TestSuite
=======
     *
     * @return PHPUnit_Framework_TestSuite
     *
     * @since  Method available since Release 3.0.0
     */
    public function topTestSuite()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->topTestSuite;
    }

    /**
     * Returns whether code coverage information should be collected.
<<<<<<< HEAD
     */
    public function getCollectCodeCoverageInformation(): bool
=======
     *
     * @return bool If code coverage should be collected
     *
     * @since  Method available since Release 3.2.0
     */
    public function getCollectCodeCoverageInformation()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->codeCoverage !== null;
    }

    /**
     * Runs a TestCase.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws \SebastianBergmann\CodeCoverage\RuntimeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws CodeCoverageException
     * @throws OriginalCoveredCodeNotExecutedException
     * @throws OriginalMissingCoversAnnotationException
     * @throws UnintentionallyCoveredCodeException
     */
    public function run(Test $test): void
    {
        Assert::resetCount();

        $size = TestUtil::UNKNOWN;

        if ($test instanceof TestCase) {
            $test->setRegisterMockObjectsFromTestArgumentsRecursively(
                $this->registerMockObjectsFromTestArgumentsRecursively
            );

            $isAnyCoverageRequired = TestUtil::requiresCodeCoverageDataCollection($test);
            $size                  = $test->getSize();
        }

        $error      = false;
        $failure    = false;
        $warning    = false;
=======
     * @param PHPUnit_Framework_Test $test
     */
    public function run(PHPUnit_Framework_Test $test)
    {
        PHPUnit_Framework_Assert::resetCount();

        $error      = false;
        $failure    = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $incomplete = false;
        $risky      = false;
        $skipped    = false;

        $this->startTest($test);

<<<<<<< HEAD
        if ($this->convertDeprecationsToExceptions || $this->convertErrorsToExceptions || $this->convertNoticesToExceptions || $this->convertWarningsToExceptions) {
            $errorHandler = new ErrorHandler(
                $this->convertDeprecationsToExceptions,
                $this->convertErrorsToExceptions,
                $this->convertNoticesToExceptions,
                $this->convertWarningsToExceptions
            );

            $errorHandler->register();
        }

        $collectCodeCoverage = $this->codeCoverage !== null &&
                               !$test instanceof WarningTestCase &&
                               $isAnyCoverageRequired;

        if ($collectCodeCoverage) {
            $this->codeCoverage->start($test);
        }

        $monitorFunctions = $this->beStrictAboutResourceUsageDuringSmallTests &&
            !$test instanceof WarningTestCase &&
            $size === TestUtil::SMALL &&
            function_exists('xdebug_start_function_monitor');

        if ($monitorFunctions) {
            /* @noinspection ForgottenDebugOutputInspection */
            xdebug_start_function_monitor(ResourceOperations::getFunctions());
        }

        Timer::start();

        try {
            if (!$test instanceof WarningTestCase &&
                $this->shouldTimeLimitBeEnforced($size)) {
                switch ($size) {
                    case TestUtil::SMALL:
                        $_timeout = $this->timeoutForSmallTests;

                        break;

                    case TestUtil::MEDIUM:
                        $_timeout = $this->timeoutForMediumTests;

                        break;

                    case TestUtil::LARGE:
                        $_timeout = $this->timeoutForLargeTests;

                        break;

                    default:
                        $_timeout = $this->defaultTimeLimit;
                }

                $invoker = new Invoker;
                $invoker->invoke([$test, 'runBare'], [], $_timeout);
            } else {
                $test->runBare();
            }
        } catch (TimeoutException $e) {
            $this->addFailure(
                $test,
                new RiskyTestError(
                    $e->getMessage()
                ),
                $_timeout
            );

            $risky = true;
        } catch (MockObjectException $e) {
            $e = new Warning(
                $e->getMessage()
            );

            $warning = true;
        } catch (AssertionFailedError $e) {
            $failure = true;

            if ($e instanceof RiskyTestError) {
                $risky = true;
            } elseif ($e instanceof IncompleteTestError) {
                $incomplete = true;
            } elseif ($e instanceof SkippedTestError) {
                $skipped = true;
            }
        } catch (AssertionError $e) {
            $test->addToAssertionCount(1);

            $failure = true;
            $frame   = $e->getTrace()[0];

            $e = new AssertionFailedError(
                sprintf(
                    '%s in %s:%s',
                    $e->getMessage(),
                    $frame['file'] ?? $e->getFile(),
                    $frame['line'] ?? $e->getLine()
                ),
                0,
                $e
            );
        } catch (Warning $e) {
            $warning = true;
        } catch (Exception $e) {
            $error = true;
        } catch (Throwable $e) {
            $e     = new ExceptionWrapper($e);
            $error = true;
        }

        $time = Timer::stop();
        $test->addToAssertionCount(Assert::getCount());

        if ($monitorFunctions) {
            $blacklist = new Blacklist;

            /** @noinspection ForgottenDebugOutputInspection */
            $functions = xdebug_get_monitored_functions();

            /* @noinspection ForgottenDebugOutputInspection */
            xdebug_stop_function_monitor();

            foreach ($functions as $function) {
                if (!$blacklist->isBlacklisted($function['filename'])) {
                    $this->addFailure(
                        $test,
                        new RiskyTestError(
                            sprintf(
                                '%s() used in %s:%s',
                                $function['function'],
                                $function['filename'],
                                $function['lineno']
                            )
                        ),
                        $time
                    );
                }
            }
        }

=======
        $errorHandlerSet = false;

        if ($this->convertErrorsToExceptions) {
            $oldErrorHandler = set_error_handler(
                array('PHPUnit_Util_ErrorHandler', 'handleError'),
                E_ALL | E_STRICT
            );

            if ($oldErrorHandler === null) {
                $errorHandlerSet = true;
            } else {
                restore_error_handler();
            }
        }

        $collectCodeCoverage = $this->codeCoverage !== null &&
                               !$test instanceof PHPUnit_Extensions_SeleniumTestCase &&
                               !$test instanceof PHPUnit_Framework_Warning;

        if ($collectCodeCoverage) {
            // We need to blacklist test source files when no whitelist is used.
            if (!$this->codeCoverage->filter()->hasWhitelist()) {
                $classes = $this->getHierarchy(get_class($test), true);

                foreach ($classes as $class) {
                    $this->codeCoverage->filter()->addFileToBlacklist(
                        $class->getFileName()
                    );
                }
            }

            $this->codeCoverage->start($test);
        }

        PHP_Timer::start();

        try {
            if (!$test instanceof PHPUnit_Framework_Warning &&
                $test->getSize() != PHPUnit_Util_Test::UNKNOWN &&
                $this->beStrictAboutTestSize &&
                extension_loaded('pcntl') && class_exists('PHP_Invoker')) {
                switch ($test->getSize()) {
                    case PHPUnit_Util_Test::SMALL:
                        $_timeout = $this->timeoutForSmallTests;
                        break;

                    case PHPUnit_Util_Test::MEDIUM:
                        $_timeout = $this->timeoutForMediumTests;
                        break;

                    case PHPUnit_Util_Test::LARGE:
                        $_timeout = $this->timeoutForLargeTests;
                        break;
                }

                $invoker = new PHP_Invoker;
                $invoker->invoke(array($test, 'runBare'), array(), $_timeout);
            } else {
                $test->runBare();
            }
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $failure = true;

            if ($e instanceof PHPUnit_Framework_RiskyTestError) {
                $risky = true;
            } elseif ($e instanceof PHPUnit_Framework_IncompleteTestError) {
                $incomplete = true;
            } elseif ($e instanceof PHPUnit_Framework_SkippedTestError) {
                $skipped = true;
            }
        } catch (PHPUnit_Framework_Exception $e) {
            $error = true;
        } catch (Throwable $e) {
            $e     = new PHPUnit_Framework_ExceptionWrapper($e);
            $error = true;
        } catch (Exception $e) {
            $e     = new PHPUnit_Framework_ExceptionWrapper($e);
            $error = true;
        }

        $time = PHP_Timer::stop();
        $test->addToAssertionCount(PHPUnit_Framework_Assert::getCount());

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if ($this->beStrictAboutTestsThatDoNotTestAnything &&
            $test->getNumAssertions() == 0) {
            $risky = true;
        }

        if ($collectCodeCoverage) {
            $append           = !$risky && !$incomplete && !$skipped;
<<<<<<< HEAD
            $linesToBeCovered = [];
            $linesToBeUsed    = [];

            if ($append && $test instanceof TestCase) {
                try {
                    $linesToBeCovered = TestUtil::getLinesToBeCovered(
                        get_class($test),
                        $test->getName(false)
                    );

                    $linesToBeUsed = TestUtil::getLinesToBeUsed(
                        get_class($test),
                        $test->getName(false)
                    );
                } catch (InvalidCoversTargetException $cce) {
                    $this->addWarning(
                        $test,
                        new Warning(
                            $cce->getMessage()
                        ),
                        $time
                    );
                }
=======
            $linesToBeCovered = array();
            $linesToBeUsed    = array();

            if ($append && $test instanceof PHPUnit_Framework_TestCase) {
                $linesToBeCovered = PHPUnit_Util_Test::getLinesToBeCovered(
                    get_class($test),
                    $test->getName(false)
                );

                $linesToBeUsed = PHPUnit_Util_Test::getLinesToBeUsed(
                    get_class($test),
                    $test->getName(false)
                );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }

            try {
                $this->codeCoverage->stop(
                    $append,
                    $linesToBeCovered,
                    $linesToBeUsed
                );
<<<<<<< HEAD
            } catch (UnintentionallyCoveredCodeException $cce) {
                $this->addFailure(
                    $test,
                    new UnintentionallyCoveredCodeError(
=======
            } catch (PHP_CodeCoverage_Exception_UnintentionallyCoveredCode $cce) {
                $this->addFailure(
                    $test,
                    new PHPUnit_Framework_UnintentionallyCoveredCodeError(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                        'This test executed code that is not listed as code to be covered or used:' .
                        PHP_EOL . $cce->getMessage()
                    ),
                    $time
                );
<<<<<<< HEAD
            } catch (OriginalCoveredCodeNotExecutedException $cce) {
                $this->addFailure(
                    $test,
                    new CoveredCodeNotExecutedException(
                        'This test did not execute all the code that is listed as code to be covered:' .
                        PHP_EOL . $cce->getMessage()
                    ),
                    $time
                );
            } catch (OriginalMissingCoversAnnotationException $cce) {
                if ($linesToBeCovered !== false) {
                    $this->addFailure(
                        $test,
                        new MissingCoversAnnotationException(
                            'This test does not have a @covers annotation but is expected to have one'
                        ),
                        $time
                    );
                }
            } catch (OriginalCodeCoverageException $cce) {
                $error = true;

                $e = $e ?? $cce;
            }
        }

        if (isset($errorHandler)) {
            $errorHandler->unregister();

            unset($errorHandler);
        }

        if ($error) {
            $this->addError($test, $e, $time);
        } elseif ($failure) {
            $this->addFailure($test, $e, $time);
        } elseif ($warning) {
            $this->addWarning($test, $e, $time);
        } elseif ($this->beStrictAboutTestsThatDoNotTestAnything &&
            !$test->doesNotPerformAssertions() &&
            $test->getNumAssertions() == 0) {
            try {
                $reflected = new ReflectionClass($test);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
                    $e
                );
            }
            // @codeCoverageIgnoreEnd

            $name = $test->getName(false);

            if ($name && $reflected->hasMethod($name)) {
                try {
                    $reflected = $reflected->getMethod($name);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd
            }

            $this->addFailure(
                $test,
                new RiskyTestError(
                    sprintf(
                        "This test did not perform any assertions\n\n%s:%d",
                        $reflected->getFileName(),
                        $reflected->getStartLine()
                    )
                ),
                $time
            );
        } elseif ($this->beStrictAboutTestsThatDoNotTestAnything &&
            $test->doesNotPerformAssertions() &&
            $test->getNumAssertions() > 0) {
            $this->addFailure(
                $test,
                new RiskyTestError(
                    sprintf(
                        'This test is annotated with "@doesNotPerformAssertions" but performed %d assertions',
                        $test->getNumAssertions()
                    )
=======
            } catch (PHPUnit_Framework_InvalidCoversTargetException $cce) {
                $this->addFailure(
                    $test,
                    new PHPUnit_Framework_InvalidCoversTargetError(
                        $cce->getMessage()
                    ),
                    $time
                );
            } catch (PHP_CodeCoverage_Exception $cce) {
                $error = true;

                if (!isset($e)) {
                    $e = $cce;
                }
            }
        }

        if ($errorHandlerSet === true) {
            restore_error_handler();
        }

        if ($error === true) {
            $this->addError($test, $e, $time);
        } elseif ($failure === true) {
            $this->addFailure($test, $e, $time);
        } elseif ($this->beStrictAboutTestsThatDoNotTestAnything &&
                 $test->getNumAssertions() == 0) {
            $this->addFailure(
                $test,
                new PHPUnit_Framework_RiskyTestError(
                    'This test did not perform any assertions'
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                ),
                $time
            );
        } elseif ($this->beStrictAboutOutputDuringTests && $test->hasOutput()) {
            $this->addFailure(
                $test,
<<<<<<< HEAD
                new OutputError(
=======
                new PHPUnit_Framework_OutputError(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    sprintf(
                        'This test printed output: %s',
                        $test->getActualOutput()
                    )
                ),
                $time
            );
<<<<<<< HEAD
        } elseif ($this->beStrictAboutTodoAnnotatedTests && $test instanceof TestCase) {
=======
        } elseif ($this->beStrictAboutTodoAnnotatedTests && $test instanceof PHPUnit_Framework_TestCase) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $annotations = $test->getAnnotations();

            if (isset($annotations['method']['todo'])) {
                $this->addFailure(
                    $test,
<<<<<<< HEAD
                    new RiskyTestError(
=======
                    new PHPUnit_Framework_RiskyTestError(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                        'Test method is annotated with @todo'
                    ),
                    $time
                );
            }
        }

        $this->endTest($test, $time);
    }

    /**
     * Gets the number of run tests.
<<<<<<< HEAD
     */
    public function count(): int
=======
     *
     * @return int
     */
    public function count()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->runTests;
    }

    /**
     * Checks whether the test run should stop.
<<<<<<< HEAD
     */
    public function shouldStop(): bool
=======
     *
     * @return bool
     */
    public function shouldStop()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->stop;
    }

    /**
     * Marks that the test run should stop.
     */
<<<<<<< HEAD
    public function stop(): void
=======
    public function stop()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->stop = true;
    }

    /**
<<<<<<< HEAD
     * Returns the code coverage object.
     */
    public function getCodeCoverage(): ?CodeCoverage
=======
     * Returns the PHP_CodeCoverage object.
     *
     * @return PHP_CodeCoverage
     *
     * @since  Method available since Release 3.5.0
     */
    public function getCodeCoverage()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->codeCoverage;
    }

    /**
<<<<<<< HEAD
     * Sets the code coverage object.
     */
    public function setCodeCoverage(CodeCoverage $codeCoverage): void
=======
     * Sets the PHP_CodeCoverage object.
     *
     * @param PHP_CodeCoverage $codeCoverage
     *
     * @since Method available since Release 3.6.0
     */
    public function setCodeCoverage(PHP_CodeCoverage $codeCoverage)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->codeCoverage = $codeCoverage;
    }

    /**
<<<<<<< HEAD
     * Enables or disables the deprecation-to-exception conversion.
     */
    public function convertDeprecationsToExceptions(bool $flag): void
    {
        $this->convertDeprecationsToExceptions = $flag;
    }

    /**
     * Returns the deprecation-to-exception conversion setting.
     */
    public function getConvertDeprecationsToExceptions(): bool
    {
        return $this->convertDeprecationsToExceptions;
    }

    /**
     * Enables or disables the error-to-exception conversion.
     */
    public function convertErrorsToExceptions(bool $flag): void
    {
=======
     * Enables or disables the error-to-exception conversion.
     *
     * @param bool $flag
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.2.14
     */
    public function convertErrorsToExceptions($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->convertErrorsToExceptions = $flag;
    }

    /**
     * Returns the error-to-exception conversion setting.
<<<<<<< HEAD
     */
    public function getConvertErrorsToExceptions(): bool
=======
     *
     * @return bool
     *
     * @since  Method available since Release 3.4.0
     */
    public function getConvertErrorsToExceptions()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->convertErrorsToExceptions;
    }

    /**
<<<<<<< HEAD
     * Enables or disables the notice-to-exception conversion.
     */
    public function convertNoticesToExceptions(bool $flag): void
    {
        $this->convertNoticesToExceptions = $flag;
    }

    /**
     * Returns the notice-to-exception conversion setting.
     */
    public function getConvertNoticesToExceptions(): bool
    {
        return $this->convertNoticesToExceptions;
    }

    /**
     * Enables or disables the warning-to-exception conversion.
     */
    public function convertWarningsToExceptions(bool $flag): void
    {
        $this->convertWarningsToExceptions = $flag;
    }

    /**
     * Returns the warning-to-exception conversion setting.
     */
    public function getConvertWarningsToExceptions(): bool
    {
        return $this->convertWarningsToExceptions;
    }

    /**
     * Enables or disables the stopping when an error occurs.
     */
    public function stopOnError(bool $flag): void
    {
=======
     * Enables or disables the stopping when an error occurs.
     *
     * @param bool $flag
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.5.0
     */
    public function stopOnError($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->stopOnError = $flag;
    }

    /**
     * Enables or disables the stopping when a failure occurs.
<<<<<<< HEAD
     */
    public function stopOnFailure(bool $flag): void
    {
=======
     *
     * @param bool $flag
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.1.0
     */
    public function stopOnFailure($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->stopOnFailure = $flag;
    }

    /**
<<<<<<< HEAD
     * Enables or disables the stopping when a warning occurs.
     */
    public function stopOnWarning(bool $flag): void
    {
        $this->stopOnWarning = $flag;
    }

    public function beStrictAboutTestsThatDoNotTestAnything(bool $flag): void
    {
        $this->beStrictAboutTestsThatDoNotTestAnything = $flag;
    }

    public function isStrictAboutTestsThatDoNotTestAnything(): bool
=======
     * @param bool $flag
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.0.0
     */
    public function beStrictAboutTestsThatDoNotTestAnything($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->beStrictAboutTestsThatDoNotTestAnything = $flag;
    }

    /**
     * @return bool
     *
     * @since  Method available since Release 4.0.0
     */
    public function isStrictAboutTestsThatDoNotTestAnything()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->beStrictAboutTestsThatDoNotTestAnything;
    }

<<<<<<< HEAD
    public function beStrictAboutOutputDuringTests(bool $flag): void
    {
        $this->beStrictAboutOutputDuringTests = $flag;
    }

    public function isStrictAboutOutputDuringTests(): bool
=======
    /**
     * @param bool $flag
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.0.0
     */
    public function beStrictAboutOutputDuringTests($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->beStrictAboutOutputDuringTests = $flag;
    }

    /**
     * @return bool
     *
     * @since  Method available since Release 4.0.0
     */
    public function isStrictAboutOutputDuringTests()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->beStrictAboutOutputDuringTests;
    }

<<<<<<< HEAD
    public function beStrictAboutResourceUsageDuringSmallTests(bool $flag): void
    {
        $this->beStrictAboutResourceUsageDuringSmallTests = $flag;
    }

    public function isStrictAboutResourceUsageDuringSmallTests(): bool
    {
        return $this->beStrictAboutResourceUsageDuringSmallTests;
    }

    public function enforceTimeLimit(bool $flag): void
    {
        $this->enforceTimeLimit = $flag;
    }

    public function enforcesTimeLimit(): bool
    {
        return $this->enforceTimeLimit;
    }

    public function beStrictAboutTodoAnnotatedTests(bool $flag): void
    {
        $this->beStrictAboutTodoAnnotatedTests = $flag;
    }

    public function isStrictAboutTodoAnnotatedTests(): bool
=======
    /**
     * @param bool $flag
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.0.0
     */
    public function beStrictAboutTestSize($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->beStrictAboutTestSize = $flag;
    }

    /**
     * @return bool
     *
     * @since  Method available since Release 4.0.0
     */
    public function isStrictAboutTestSize()
    {
        return $this->beStrictAboutTestSize;
    }

    /**
     * @param bool $flag
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.2.0
     */
    public function beStrictAboutTodoAnnotatedTests($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->beStrictAboutTodoAnnotatedTests = $flag;
    }

    /**
     * @return bool
     *
     * @since  Method available since Release 4.2.0
     */
    public function isStrictAboutTodoAnnotatedTests()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->beStrictAboutTodoAnnotatedTests;
    }

    /**
     * Enables or disables the stopping for risky tests.
<<<<<<< HEAD
     */
    public function stopOnRisky(bool $flag): void
    {
=======
     *
     * @param bool $flag
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.0.0
     */
    public function stopOnRisky($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->stopOnRisky = $flag;
    }

    /**
     * Enables or disables the stopping for incomplete tests.
<<<<<<< HEAD
     */
    public function stopOnIncomplete(bool $flag): void
    {
=======
     *
     * @param bool $flag
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.5.0
     */
    public function stopOnIncomplete($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->stopOnIncomplete = $flag;
    }

    /**
     * Enables or disables the stopping for skipped tests.
<<<<<<< HEAD
     */
    public function stopOnSkipped(bool $flag): void
    {
=======
     *
     * @param bool $flag
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.1.0
     */
    public function stopOnSkipped($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->stopOnSkipped = $flag;
    }

    /**
<<<<<<< HEAD
     * Enables or disables the stopping for defects: error, failure, warning.
     */
    public function stopOnDefect(bool $flag): void
    {
        $this->stopOnDefect = $flag;
    }

    /**
     * Returns the time spent running the tests.
     */
    public function time(): float
=======
     * Returns the time spent running the tests.
     *
     * @return float
     */
    public function time()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->time;
    }

    /**
     * Returns whether the entire test was successful or not.
<<<<<<< HEAD
     */
    public function wasSuccessful(): bool
    {
        return $this->wasSuccessfulIgnoringWarnings() && empty($this->warnings);
    }

    public function wasSuccessfulIgnoringWarnings(): bool
=======
     *
     * @return bool
     */
    public function wasSuccessful()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return empty($this->errors) && empty($this->failures);
    }

<<<<<<< HEAD
    public function wasSuccessfulAndNoTestIsRiskyOrSkippedOrIncomplete(): bool
    {
        return $this->wasSuccessful() && $this->allHarmless() && $this->allCompletelyImplemented() && $this->noneSkipped();
    }

    /**
     * Sets the default timeout for tests.
     */
    public function setDefaultTimeLimit(int $timeout): void
    {
        $this->defaultTimeLimit = $timeout;
    }

    /**
     * Sets the timeout for small tests.
     */
    public function setTimeoutForSmallTests(int $timeout): void
    {
=======
    /**
     * Sets the timeout for small tests.
     *
     * @param int $timeout
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.6.0
     */
    public function setTimeoutForSmallTests($timeout)
    {
        if (!is_integer($timeout)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->timeoutForSmallTests = $timeout;
    }

    /**
     * Sets the timeout for medium tests.
<<<<<<< HEAD
     */
    public function setTimeoutForMediumTests(int $timeout): void
    {
=======
     *
     * @param int $timeout
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.6.0
     */
    public function setTimeoutForMediumTests($timeout)
    {
        if (!is_integer($timeout)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->timeoutForMediumTests = $timeout;
    }

    /**
     * Sets the timeout for large tests.
<<<<<<< HEAD
     */
    public function setTimeoutForLargeTests(int $timeout): void
    {
=======
     *
     * @param int $timeout
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.6.0
     */
    public function setTimeoutForLargeTests($timeout)
    {
        if (!is_integer($timeout)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->timeoutForLargeTests = $timeout;
    }

    /**
<<<<<<< HEAD
     * Returns the set timeout for large tests.
     */
    public function getTimeoutForLargeTests(): int
    {
        return $this->timeoutForLargeTests;
    }

    public function setRegisterMockObjectsFromTestArgumentsRecursively(bool $flag): void
    {
        $this->registerMockObjectsFromTestArgumentsRecursively = $flag;
    }

    private function shouldTimeLimitBeEnforced(int $size): bool
    {
        if (!$this->enforceTimeLimit) {
            return false;
        }

        if (!(($this->defaultTimeLimit || $size !== TestUtil::UNKNOWN))) {
            return false;
        }

        if (!extension_loaded('pcntl')) {
            return false;
        }

        if (!class_exists(Invoker::class)) {
            return false;
        }

        if (extension_loaded('xdebug') && xdebug_is_debugger_active()) {
            return false;
        }

        return true;
=======
     * Returns the class hierarchy for a given class.
     *
     * @param string $className
     * @param bool   $asReflectionObjects
     *
     * @return array
     */
    protected function getHierarchy($className, $asReflectionObjects = false)
    {
        if ($asReflectionObjects) {
            $classes = array(new ReflectionClass($className));
        } else {
            $classes = array($className);
        }

        $done = false;

        while (!$done) {
            if ($asReflectionObjects) {
                $class = new ReflectionClass(
                    $classes[count($classes) - 1]->getName()
                );
            } else {
                $class = new ReflectionClass($classes[count($classes) - 1]);
            }

            $parent = $class->getParentClass();

            if ($parent !== false) {
                if ($asReflectionObjects) {
                    $classes[] = $parent;
                } else {
                    $classes[] = $parent->getName();
                }
            } else {
                $done = true;
            }
        }

        return $classes;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
