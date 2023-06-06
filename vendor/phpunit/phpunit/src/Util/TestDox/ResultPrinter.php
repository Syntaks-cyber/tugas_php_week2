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
namespace PHPUnit\Util\TestDox;

use function get_class;
use function in_array;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Framework\WarningTestCase;
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Util\Printer;
use Throwable;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
abstract class ResultPrinter extends Printer implements TestListener
{
    /**
     * @var NamePrettifier
=======

/**
 * Base class for printers of TestDox documentation.
 *
 * @since Class available since Release 2.1.0
 */
abstract class PHPUnit_Util_TestDox_ResultPrinter extends PHPUnit_Util_Printer implements PHPUnit_Framework_TestListener
{
    /**
     * @var PHPUnit_Util_TestDox_NamePrettifier
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected $prettifier;

    /**
     * @var string
     */
    protected $testClass = '';

    /**
     * @var int
     */
<<<<<<< HEAD
    protected $testStatus;
=======
    protected $testStatus = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $tests = [];
=======
    protected $tests = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int
     */
    protected $successful = 0;

    /**
     * @var int
     */
<<<<<<< HEAD
    protected $warned = 0;

    /**
     * @var int
     */
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    protected $failed = 0;

    /**
     * @var int
     */
    protected $risky = 0;

    /**
     * @var int
     */
    protected $skipped = 0;

    /**
     * @var int
     */
    protected $incomplete = 0;

    /**
<<<<<<< HEAD
     * @var null|string
=======
     * @var string
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected $currentTestClassPrettified;

    /**
<<<<<<< HEAD
     * @var null|string
=======
     * @var string
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected $currentTestMethodPrettified;

    /**
<<<<<<< HEAD
     * @var array
     */
    private $groups;

    /**
     * @var array
     */
    private $excludeGroups;

    /**
     * @param resource $out
     *
     * @throws \PHPUnit\Framework\Exception
     */
    public function __construct($out = null, array $groups = [], array $excludeGroups = [])
    {
        parent::__construct($out);

        $this->groups        = $groups;
        $this->excludeGroups = $excludeGroups;

        $this->prettifier = new NamePrettifier;
=======
     * Constructor.
     *
     * @param resource $out
     */
    public function __construct($out = null)
    {
        parent::__construct($out);

        $this->prettifier = new PHPUnit_Util_TestDox_NamePrettifier;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->startRun();
    }

    /**
     * Flush buffer and close output.
     */
<<<<<<< HEAD
    public function flush(): void
=======
    public function flush()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->doEndClass();
        $this->endRun();

        parent::flush();
    }

    /**
     * An error occurred.
<<<<<<< HEAD
     */
    public function addError(Test $test, Throwable $t, float $time): void
=======
     *
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     */
    public function addError(PHPUnit_Framework_Test $test, Exception $e, $time)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $this->testStatus = BaseTestRunner::STATUS_ERROR;
=======
        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_ERROR;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->failed++;
    }

    /**
<<<<<<< HEAD
     * A warning occurred.
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

        $this->testStatus = BaseTestRunner::STATUS_WARNING;
        $this->warned++;
    }

    /**
     * A failure occurred.
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
=======
     * A failure occurred.
     *
     * @param PHPUnit_Framework_Test                 $test
     * @param PHPUnit_Framework_AssertionFailedError $e
     * @param float                                  $time
     */
    public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $this->testStatus = BaseTestRunner::STATUS_FAILURE;
=======
        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->failed++;
    }

    /**
     * Incomplete test.
<<<<<<< HEAD
     */
    public function addIncompleteTest(Test $test, Throwable $t, float $time): void
=======
     *
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     */
    public function addIncompleteTest(PHPUnit_Framework_Test $test, Exception $e, $time)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $this->testStatus = BaseTestRunner::STATUS_INCOMPLETE;
=======
        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_INCOMPLETE;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->incomplete++;
    }

    /**
     * Risky test.
<<<<<<< HEAD
     */
    public function addRiskyTest(Test $test, Throwable $t, float $time): void
=======
     *
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     *
     * @since  Method available since Release 4.0.0
     */
    public function addRiskyTest(PHPUnit_Framework_Test $test, Exception $e, $time)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $this->testStatus = BaseTestRunner::STATUS_RISKY;
=======
        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_RISKY;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->risky++;
    }

    /**
     * Skipped test.
<<<<<<< HEAD
     */
    public function addSkippedTest(Test $test, Throwable $t, float $time): void
=======
     *
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     *
     * @since  Method available since Release 3.0.0
     */
    public function addSkippedTest(PHPUnit_Framework_Test $test, Exception $e, $time)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $this->testStatus = BaseTestRunner::STATUS_SKIPPED;
=======
        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_SKIPPED;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->skipped++;
    }

    /**
     * A testsuite started.
<<<<<<< HEAD
     */
    public function startTestSuite(TestSuite $suite): void
=======
     *
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function startTestSuite(PHPUnit_Framework_TestSuite $suite)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
    }

    /**
     * A testsuite ended.
<<<<<<< HEAD
     */
    public function endTestSuite(TestSuite $suite): void
=======
     *
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function endTestSuite(PHPUnit_Framework_TestSuite $suite)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
    }

    /**
     * A test started.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function startTest(Test $test): void
=======
     * @param PHPUnit_Framework_Test $test
     */
    public function startTest(PHPUnit_Framework_Test $test)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

        $class = get_class($test);

<<<<<<< HEAD
        if ($this->testClass !== $class) {
            if ($this->testClass !== '') {
=======
        if ($this->testClass != $class) {
            if ($this->testClass != '') {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $this->doEndClass();
            }

            $this->currentTestClassPrettified = $this->prettifier->prettifyTestClass($class);
<<<<<<< HEAD
            $this->testClass                  = $class;
            $this->tests                      = [];

            $this->startClass($class);
        }

        if ($test instanceof TestCase) {
            $this->currentTestMethodPrettified = $this->prettifier->prettifyTestCase($test);
        }

        $this->testStatus = BaseTestRunner::STATUS_PASSED;
=======
            $this->startClass($class);

            $this->testClass = $class;
            $this->tests     = array();
        }

        $prettified = false;

        $annotations = $test->getAnnotations();

        if (isset($annotations['method']['testdox'][0])) {
            $this->currentTestMethodPrettified = $annotations['method']['testdox'][0];
            $prettified                        = true;
        }

        if (!$prettified) {
            $this->currentTestMethodPrettified = $this->prettifier->prettifyTestMethod($test->getName(false));
        }

        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_PASSED;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * A test ended.
<<<<<<< HEAD
     */
    public function endTest(Test $test, float $time): void
=======
     *
     * @param PHPUnit_Framework_Test $test
     * @param float                  $time
     */
    public function endTest(PHPUnit_Framework_Test $test, $time)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $this->tests[] = [$this->currentTestMethodPrettified, $this->testStatus];
=======
        if (!isset($this->tests[$this->currentTestMethodPrettified])) {
            if ($this->testStatus == PHPUnit_Runner_BaseTestRunner::STATUS_PASSED) {
                $this->tests[$this->currentTestMethodPrettified]['success'] = 1;
                $this->tests[$this->currentTestMethodPrettified]['failure'] = 0;
            } else {
                $this->tests[$this->currentTestMethodPrettified]['success'] = 0;
                $this->tests[$this->currentTestMethodPrettified]['failure'] = 1;
            }
        } else {
            if ($this->testStatus == PHPUnit_Runner_BaseTestRunner::STATUS_PASSED) {
                $this->tests[$this->currentTestMethodPrettified]['success']++;
            } else {
                $this->tests[$this->currentTestMethodPrettified]['failure']++;
            }
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $this->currentTestClassPrettified  = null;
        $this->currentTestMethodPrettified = null;
    }

<<<<<<< HEAD
    protected function doEndClass(): void
    {
        foreach ($this->tests as $test) {
            $this->onTest($test[0], $test[1] === BaseTestRunner::STATUS_PASSED);
=======
    /**
     * @since  Method available since Release 2.3.0
     */
    protected function doEndClass()
    {
        foreach ($this->tests as $name => $data) {
            $this->onTest($name, $data['failure'] == 0);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $this->endClass($this->testClass);
    }

    /**
     * Handler for 'start run' event.
     */
<<<<<<< HEAD
    protected function startRun(): void
=======
    protected function startRun()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
    }

    /**
     * Handler for 'start class' event.
<<<<<<< HEAD
     */
    protected function startClass(string $name): void
=======
     *
     * @param string $name
     */
    protected function startClass($name)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
    }

    /**
     * Handler for 'on test' event.
<<<<<<< HEAD
     */
    protected function onTest($name, bool $success = true): void
=======
     *
     * @param string $name
     * @param bool   $success
     */
    protected function onTest($name, $success = true)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
    }

    /**
     * Handler for 'end class' event.
<<<<<<< HEAD
     */
    protected function endClass(string $name): void
=======
     *
     * @param string $name
     */
    protected function endClass($name)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
    }

    /**
     * Handler for 'end run' event.
     */
<<<<<<< HEAD
    protected function endRun(): void
    {
    }

    private function isOfInterest(Test $test): bool
    {
        if (!$test instanceof TestCase) {
            return false;
        }

        if ($test instanceof WarningTestCase) {
            return false;
        }

        if (!empty($this->groups)) {
            foreach ($test->getGroups() as $group) {
                if (in_array($group, $this->groups, true)) {
                    return true;
                }
            }

            return false;
        }

        if (!empty($this->excludeGroups)) {
            foreach ($test->getGroups() as $group) {
                if (in_array($group, $this->excludeGroups, true)) {
                    return false;
                }
            }

            return true;
        }

        return true;
=======
    protected function endRun()
    {
    }

    private function isOfInterest(PHPUnit_Framework_Test $test)
    {
        return $test instanceof PHPUnit_Framework_TestCase && get_class($test) != 'PHPUnit_Framework_Warning';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
