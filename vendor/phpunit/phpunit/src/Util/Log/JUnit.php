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
namespace PHPUnit\Util\Log;

use function class_exists;
use function get_class;
use function method_exists;
use function sprintf;
use function str_replace;
use DOMDocument;
use DOMElement;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExceptionWrapper;
use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestFailure;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Util\Exception;
use PHPUnit\Util\Filter;
use PHPUnit\Util\Printer;
use PHPUnit\Util\Xml;
use ReflectionClass;
use ReflectionException;
use Throwable;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class JUnit extends Printer implements TestListener
=======

/**
 * A TestListener that generates a logfile of the test execution in XML markup.
 *
 * The XML markup used is the same as the one that is used by the JUnit Ant task.
 *
 * @since Class available since Release 2.1.0
 */
class PHPUnit_Util_Log_JUnit extends PHPUnit_Util_Printer implements PHPUnit_Framework_TestListener
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var DOMDocument
     */
<<<<<<< HEAD
    private $document;
=======
    protected $document;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var DOMElement
     */
<<<<<<< HEAD
    private $root;
=======
    protected $root;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $reportRiskyTests = false;
=======
    protected $logIncompleteSkipped = false;

    /**
     * @var bool
     */
    protected $writeDocument = true;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var DOMElement[]
     */
<<<<<<< HEAD
    private $testSuites = [];
=======
    protected $testSuites = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int[]
     */
<<<<<<< HEAD
    private $testSuiteTests = [0];
=======
    protected $testSuiteTests = array(0);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int[]
     */
<<<<<<< HEAD
    private $testSuiteAssertions = [0];
=======
    protected $testSuiteAssertions = array(0);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int[]
     */
<<<<<<< HEAD
    private $testSuiteErrors = [0];
=======
    protected $testSuiteErrors = array(0);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int[]
     */
<<<<<<< HEAD
    private $testSuiteWarnings = [0];
=======
    protected $testSuiteFailures = array(0);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int[]
     */
<<<<<<< HEAD
    private $testSuiteFailures = [0];

    /**
     * @var int[]
     */
    private $testSuiteSkipped = [0];

    /**
     * @var int[]
     */
    private $testSuiteTimes = [0];
=======
    protected $testSuiteTimes = array(0);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int
     */
<<<<<<< HEAD
    private $testSuiteLevel = 0;
=======
    protected $testSuiteLevel = 0;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var DOMElement
     */
<<<<<<< HEAD
    private $currentTestCase;

    /**
     * @param null|mixed $out
     */
    public function __construct($out = null, bool $reportRiskyTests = false)
=======
    protected $currentTestCase = null;

    /**
     * @var bool
     */
    protected $attachCurrentTestCase = true;

    /**
     * Constructor.
     *
     * @param mixed $out
     * @param bool  $logIncompleteSkipped
     */
    public function __construct($out = null, $logIncompleteSkipped = false)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->document               = new DOMDocument('1.0', 'UTF-8');
        $this->document->formatOutput = true;

        $this->root = $this->document->createElement('testsuites');
        $this->document->appendChild($this->root);

        parent::__construct($out);

<<<<<<< HEAD
        $this->reportRiskyTests = $reportRiskyTests;
=======
        $this->logIncompleteSkipped = $logIncompleteSkipped;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Flush buffer and close output.
     */
<<<<<<< HEAD
    public function flush(): void
    {
        $this->write($this->getXML());
=======
    public function flush()
    {
        if ($this->writeDocument === true) {
            $this->write($this->getXML());
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        parent::flush();
    }

    /**
     * An error occurred.
<<<<<<< HEAD
     */
    public function addError(Test $test, Throwable $t, float $time): void
    {
        $this->doAddFault($test, $t, $time, 'error');
        $this->testSuiteErrors[$this->testSuiteLevel]++;
    }

    /**
     * A warning occurred.
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
        $this->doAddFault($test, $e, $time, 'warning');
        $this->testSuiteWarnings[$this->testSuiteLevel]++;
    }

    /**
     * A failure occurred.
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        $this->doAddFault($test, $e, $time, 'failure');
        $this->testSuiteFailures[$this->testSuiteLevel]++;
    }

    /**
     * Incomplete test.
     */
    public function addIncompleteTest(Test $test, Throwable $t, float $time): void
    {
        $this->doAddSkipped();
    }

    /**
     * Risky test.
     */
    public function addRiskyTest(Test $test, Throwable $t, float $time): void
    {
        if (!$this->reportRiskyTests || $this->currentTestCase === null) {
            return;
        }

        $error = $this->document->createElement(
            'error',
            Xml::prepareString(
                "Risky Test\n" .
                Filter::getFilteredStacktrace($t)
            )
        );

        $error->setAttribute('type', get_class($t));
=======
     *
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     */
    public function addError(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        if ($this->currentTestCase === null) {
            return;
        }

        if ($test instanceof PHPUnit_Framework_SelfDescribing) {
            $buffer = $test->toString() . PHP_EOL;
        } else {
            $buffer = '';
        }

        if ($e instanceof PHPUnit_Framework_ExceptionWrapper) {
            $type    = $e->getClassname();
            $buffer .= (string) $e;
        } else {
            $type    = get_class($e);
            $buffer .= PHPUnit_Framework_TestFailure::exceptionToString($e) . PHP_EOL .
                       PHPUnit_Util_Filter::getFilteredStacktrace($e);
        }

        $error = $this->document->createElement(
            'error',
            PHPUnit_Util_XML::prepareString($buffer)
        );

        $error->setAttribute('type', $type);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $this->currentTestCase->appendChild($error);

        $this->testSuiteErrors[$this->testSuiteLevel]++;
    }

    /**
<<<<<<< HEAD
     * Skipped test.
     */
    public function addSkippedTest(Test $test, Throwable $t, float $time): void
    {
        $this->doAddSkipped();
=======
     * A failure occurred.
     *
     * @param PHPUnit_Framework_Test                 $test
     * @param PHPUnit_Framework_AssertionFailedError $e
     * @param float                                  $time
     */
    public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time)
    {
        if ($this->currentTestCase === null) {
            return;
        }

        if ($test instanceof PHPUnit_Framework_SelfDescribing) {
            $buffer = $test->toString() . "\n";
        } else {
            $buffer = '';
        }

        $buffer .= PHPUnit_Framework_TestFailure::exceptionToString($e) .
                   "\n" .
                   PHPUnit_Util_Filter::getFilteredStacktrace($e);

        $failure = $this->document->createElement(
            'failure',
            PHPUnit_Util_XML::prepareString($buffer)
        );

        $failure->setAttribute('type', get_class($e));

        $this->currentTestCase->appendChild($failure);

        $this->testSuiteFailures[$this->testSuiteLevel]++;
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
        if ($this->logIncompleteSkipped && $this->currentTestCase !== null) {
            $error = $this->document->createElement(
                'error',
                PHPUnit_Util_XML::prepareString(
                    "Incomplete Test\n" .
                    PHPUnit_Util_Filter::getFilteredStacktrace($e)
                )
            );

            $error->setAttribute('type', get_class($e));

            $this->currentTestCase->appendChild($error);

            $this->testSuiteErrors[$this->testSuiteLevel]++;
        } else {
            $this->attachCurrentTestCase = false;
        }
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
        if ($this->logIncompleteSkipped && $this->currentTestCase !== null) {
            $error = $this->document->createElement(
                'error',
                PHPUnit_Util_XML::prepareString(
                    "Risky Test\n" .
                    PHPUnit_Util_Filter::getFilteredStacktrace($e)
                )
            );

            $error->setAttribute('type', get_class($e));

            $this->currentTestCase->appendChild($error);

            $this->testSuiteErrors[$this->testSuiteLevel]++;
        } else {
            $this->attachCurrentTestCase = false;
        }
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
        if ($this->logIncompleteSkipped && $this->currentTestCase !== null) {
            $error = $this->document->createElement(
                'error',
                PHPUnit_Util_XML::prepareString(
                    "Skipped Test\n" .
                    PHPUnit_Util_Filter::getFilteredStacktrace($e)
                )
            );

            $error->setAttribute('type', get_class($e));

            $this->currentTestCase->appendChild($error);

            $this->testSuiteErrors[$this->testSuiteLevel]++;
        } else {
            $this->attachCurrentTestCase = false;
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
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
        $testSuite = $this->document->createElement('testsuite');
        $testSuite->setAttribute('name', $suite->getName());

        if (class_exists($suite->getName(), false)) {
            try {
                $class = new ReflectionClass($suite->getName());

                $testSuite->setAttribute('file', $class->getFileName());
            } catch (ReflectionException $e) {
            }
        }

        if ($this->testSuiteLevel > 0) {
            $this->testSuites[$this->testSuiteLevel]->appendChild($testSuite);
        } else {
            $this->root->appendChild($testSuite);
        }

        $this->testSuiteLevel++;
        $this->testSuites[$this->testSuiteLevel]          = $testSuite;
        $this->testSuiteTests[$this->testSuiteLevel]      = 0;
        $this->testSuiteAssertions[$this->testSuiteLevel] = 0;
        $this->testSuiteErrors[$this->testSuiteLevel]     = 0;
<<<<<<< HEAD
        $this->testSuiteWarnings[$this->testSuiteLevel]   = 0;
        $this->testSuiteFailures[$this->testSuiteLevel]   = 0;
        $this->testSuiteSkipped[$this->testSuiteLevel]    = 0;
=======
        $this->testSuiteFailures[$this->testSuiteLevel]   = 0;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->testSuiteTimes[$this->testSuiteLevel]      = 0;
    }

    /**
     * A testsuite ended.
<<<<<<< HEAD
     */
    public function endTestSuite(TestSuite $suite): void
    {
        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'tests',
            (string) $this->testSuiteTests[$this->testSuiteLevel]
=======
     *
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function endTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'tests',
            $this->testSuiteTests[$this->testSuiteLevel]
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'assertions',
<<<<<<< HEAD
            (string) $this->testSuiteAssertions[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'errors',
            (string) $this->testSuiteErrors[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'warnings',
            (string) $this->testSuiteWarnings[$this->testSuiteLevel]
=======
            $this->testSuiteAssertions[$this->testSuiteLevel]
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'failures',
<<<<<<< HEAD
            (string) $this->testSuiteFailures[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'skipped',
            (string) $this->testSuiteSkipped[$this->testSuiteLevel]
=======
            $this->testSuiteFailures[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'errors',
            $this->testSuiteErrors[$this->testSuiteLevel]
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'time',
            sprintf('%F', $this->testSuiteTimes[$this->testSuiteLevel])
        );

        if ($this->testSuiteLevel > 1) {
<<<<<<< HEAD
            $this->testSuiteTests[$this->testSuiteLevel - 1] += $this->testSuiteTests[$this->testSuiteLevel];
            $this->testSuiteAssertions[$this->testSuiteLevel - 1] += $this->testSuiteAssertions[$this->testSuiteLevel];
            $this->testSuiteErrors[$this->testSuiteLevel - 1] += $this->testSuiteErrors[$this->testSuiteLevel];
            $this->testSuiteWarnings[$this->testSuiteLevel - 1] += $this->testSuiteWarnings[$this->testSuiteLevel];
            $this->testSuiteFailures[$this->testSuiteLevel - 1] += $this->testSuiteFailures[$this->testSuiteLevel];
            $this->testSuiteSkipped[$this->testSuiteLevel - 1] += $this->testSuiteSkipped[$this->testSuiteLevel];
            $this->testSuiteTimes[$this->testSuiteLevel - 1] += $this->testSuiteTimes[$this->testSuiteLevel];
=======
            $this->testSuiteTests[$this->testSuiteLevel - 1]      += $this->testSuiteTests[$this->testSuiteLevel];
            $this->testSuiteAssertions[$this->testSuiteLevel - 1] += $this->testSuiteAssertions[$this->testSuiteLevel];
            $this->testSuiteErrors[$this->testSuiteLevel - 1]     += $this->testSuiteErrors[$this->testSuiteLevel];
            $this->testSuiteFailures[$this->testSuiteLevel - 1]   += $this->testSuiteFailures[$this->testSuiteLevel];
            $this->testSuiteTimes[$this->testSuiteLevel - 1]      += $this->testSuiteTimes[$this->testSuiteLevel];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $this->testSuiteLevel--;
    }

    /**
     * A test started.
<<<<<<< HEAD
     */
    public function startTest(Test $test): void
    {
        $usesDataprovider = false;

        if (method_exists($test, 'usesDataProvider')) {
            $usesDataprovider = $test->usesDataProvider();
        }

        $testCase = $this->document->createElement('testcase');
        $testCase->setAttribute('name', $test->getName());

        try {
            $class = new ReflectionClass($test);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
        // @codeCoverageIgnoreEnd

        $methodName = $test->getName(!$usesDataprovider);

        if ($class->hasMethod($methodName)) {
            try {
                $method = $class->getMethod($methodName);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
                    $e
                );
            }
            // @codeCoverageIgnoreEnd

            $testCase->setAttribute('class', $class->getName());
            $testCase->setAttribute('classname', str_replace('\\', '.', $class->getName()));
            $testCase->setAttribute('file', $class->getFileName());
            $testCase->setAttribute('line', (string) $method->getStartLine());
=======
     *
     * @param PHPUnit_Framework_Test $test
     */
    public function startTest(PHPUnit_Framework_Test $test)
    {
        $testCase = $this->document->createElement('testcase');
        $testCase->setAttribute('name', $test->getName());

        if ($test instanceof PHPUnit_Framework_TestCase) {
            $class      = new ReflectionClass($test);
            $methodName = $test->getName();

            if ($class->hasMethod($methodName)) {
                $method = $class->getMethod($test->getName());

                $testCase->setAttribute('class', $class->getName());
                $testCase->setAttribute('file', $class->getFileName());
                $testCase->setAttribute('line', $method->getStartLine());
            }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $this->currentTestCase = $testCase;
    }

    /**
     * A test ended.
<<<<<<< HEAD
     */
    public function endTest(Test $test, float $time): void
    {
        $numAssertions = 0;

        if (method_exists($test, 'getNumAssertions')) {
            $numAssertions = $test->getNumAssertions();
        }

        $this->testSuiteAssertions[$this->testSuiteLevel] += $numAssertions;

        $this->currentTestCase->setAttribute(
            'assertions',
            (string) $numAssertions
        );

        $this->currentTestCase->setAttribute(
            'time',
            sprintf('%F', $time)
        );

        $this->testSuites[$this->testSuiteLevel]->appendChild(
            $this->currentTestCase
        );

        $this->testSuiteTests[$this->testSuiteLevel]++;
        $this->testSuiteTimes[$this->testSuiteLevel] += $time;

        $testOutput = '';

        if (method_exists($test, 'hasOutput') && method_exists($test, 'getActualOutput')) {
            $testOutput = $test->hasOutput() ? $test->getActualOutput() : '';
        }

        if (!empty($testOutput)) {
            $systemOut = $this->document->createElement(
                'system-out',
                Xml::prepareString($testOutput)
            );

            $this->currentTestCase->appendChild($systemOut);
        }

        $this->currentTestCase = null;
=======
     *
     * @param PHPUnit_Framework_Test $test
     * @param float                  $time
     */
    public function endTest(PHPUnit_Framework_Test $test, $time)
    {
        if ($this->attachCurrentTestCase) {
            if ($test instanceof PHPUnit_Framework_TestCase) {
                $numAssertions = $test->getNumAssertions();
                $this->testSuiteAssertions[$this->testSuiteLevel] += $numAssertions;

                $this->currentTestCase->setAttribute(
                    'assertions',
                    $numAssertions
                );
            }

            $this->currentTestCase->setAttribute(
                'time',
                sprintf('%F', $time)
            );

            $this->testSuites[$this->testSuiteLevel]->appendChild(
                $this->currentTestCase
            );

            $this->testSuiteTests[$this->testSuiteLevel]++;
            $this->testSuiteTimes[$this->testSuiteLevel] += $time;

            if (method_exists($test, 'hasOutput') && $test->hasOutput()) {
                $systemOut = $this->document->createElement('system-out');
                $systemOut->appendChild(
                    $this->document->createTextNode($test->getActualOutput())
                );
                $this->currentTestCase->appendChild($systemOut);
            }
        }

        $this->attachCurrentTestCase = true;
        $this->currentTestCase       = null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the XML as a string.
<<<<<<< HEAD
     */
    public function getXML(): string
=======
     *
     * @return string
     *
     * @since  Method available since Release 2.2.0
     */
    public function getXML()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->document->saveXML();
    }

<<<<<<< HEAD
    private function doAddFault(Test $test, Throwable $t, float $time, $type): void
    {
        if ($this->currentTestCase === null) {
            return;
        }

        if ($test instanceof SelfDescribing) {
            $buffer = $test->toString() . "\n";
        } else {
            $buffer = '';
        }

        $buffer .= TestFailure::exceptionToString($t) . "\n" .
                   Filter::getFilteredStacktrace($t);

        $fault = $this->document->createElement(
            $type,
            Xml::prepareString($buffer)
        );

        if ($t instanceof ExceptionWrapper) {
            $fault->setAttribute('type', $t->getClassName());
        } else {
            $fault->setAttribute('type', get_class($t));
        }

        $this->currentTestCase->appendChild($fault);
    }

    private function doAddSkipped(): void
    {
        if ($this->currentTestCase === null) {
            return;
        }

        $skipped = $this->document->createElement('skipped');

        $this->currentTestCase->appendChild($skipped);

        $this->testSuiteSkipped[$this->testSuiteLevel]++;
=======
    /**
     * Enables or disables the writing of the document
     * in flush().
     *
     * This is a "hack" needed for the integration of
     * PHPUnit with Phing.
     *
     * @return string
     *
     * @since  Method available since Release 2.2.0
     */
    public function setWriteDocument($flag)
    {
        if (is_bool($flag)) {
            $this->writeDocument = $flag;
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
