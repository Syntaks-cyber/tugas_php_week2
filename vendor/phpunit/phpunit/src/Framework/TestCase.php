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

use const LC_ALL;
use const LC_COLLATE;
use const LC_CTYPE;
use const LC_MESSAGES;
use const LC_MONETARY;
use const LC_NUMERIC;
use const LC_TIME;
use const PATHINFO_FILENAME;
use const PHP_EOL;
use const PHP_URL_PATH;
use function array_filter;
use function array_flip;
use function array_keys;
use function array_merge;
use function array_unique;
use function array_values;
use function assert;
use function basename;
use function call_user_func;
use function chdir;
use function class_exists;
use function clearstatcache;
use function count;
use function defined;
use function explode;
use function get_class;
use function get_include_path;
use function getcwd;
use function implode;
use function in_array;
use function ini_set;
use function is_array;
use function is_int;
use function is_object;
use function is_string;
use function libxml_clear_errors;
use function method_exists;
use function ob_end_clean;
use function ob_get_contents;
use function ob_get_level;
use function ob_start;
use function parse_url;
use function pathinfo;
use function preg_replace;
use function serialize;
use function setlocale;
use function sprintf;
use function strlen;
use function strpos;
use function substr;
use function trim;
use function var_export;
use DeepCopy\DeepCopy;
use PHPUnit\Framework\Constraint\Exception as ExceptionConstraint;
use PHPUnit\Framework\Constraint\ExceptionCode;
use PHPUnit\Framework\Constraint\ExceptionMessage;
use PHPUnit\Framework\Constraint\ExceptionMessageRegularExpression;
use PHPUnit\Framework\Constraint\LogicalOr;
use PHPUnit\Framework\Error\Deprecated;
use PHPUnit\Framework\Error\Error;
use PHPUnit\Framework\Error\Notice;
use PHPUnit\Framework\Error\Warning as WarningError;
use PHPUnit\Framework\MockObject\Generator as MockGenerator;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\MockObject\Rule\AnyInvokedCount as AnyInvokedCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtIndex as InvokedAtIndexMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastCount as InvokedAtLeastCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastOnce as InvokedAtLeastOnceMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtMostCount as InvokedAtMostCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedCount as InvokedCountMatcher;
use PHPUnit\Framework\MockObject\Stub;
use PHPUnit\Framework\MockObject\Stub\ConsecutiveCalls as ConsecutiveCallsStub;
use PHPUnit\Framework\MockObject\Stub\Exception as ExceptionStub;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument as ReturnArgumentStub;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback as ReturnCallbackStub;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf as ReturnSelfStub;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;
use PHPUnit\Framework\MockObject\Stub\ReturnValueMap as ReturnValueMapStub;
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\Exception as UtilException;
use PHPUnit\Util\GlobalState;
use PHPUnit\Util\PHP\AbstractPhpProcess;
use PHPUnit\Util\Test as TestUtil;
use PHPUnit\Util\Type;
use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophet;
use ReflectionClass;
use ReflectionException;
use SebastianBergmann\Comparator\Comparator;
use SebastianBergmann\Comparator\Factory as ComparatorFactory;
use SebastianBergmann\Diff\Differ;
use SebastianBergmann\Exporter\Exporter;
use SebastianBergmann\GlobalState\Blacklist;
use SebastianBergmann\GlobalState\Restorer;
use SebastianBergmann\GlobalState\Snapshot;
use SebastianBergmann\ObjectEnumerator\Enumerator;
use Text_Template;
use Throwable;

abstract class TestCase extends Assert implements SelfDescribing, Test
{
    private const LOCALE_CATEGORIES = [LC_ALL, LC_COLLATE, LC_CTYPE, LC_MONETARY, LC_NUMERIC, LC_TIME];

    /**
     * @var ?bool
     */
    protected $backupGlobals;

    /**
     * @var string[]
     */
    protected $backupGlobalsBlacklist = [];

    /**
     * @var bool
     */
    protected $backupStaticAttributes;

    /**
     * @var array<string,array<int,string>>
     */
    protected $backupStaticAttributesBlacklist = [];

    /**
     * @var bool
     */
    protected $runTestInSeparateProcess;

    /**
=======

use SebastianBergmann\GlobalState\Snapshot;
use SebastianBergmann\GlobalState\Restorer;
use SebastianBergmann\GlobalState\Blacklist;
use SebastianBergmann\Diff\Differ;
use SebastianBergmann\Exporter\Exporter;
use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophet;

/**
 * A TestCase defines the fixture to run multiple tests.
 *
 * To define a TestCase
 *
 *   1) Implement a subclass of PHPUnit_Framework_TestCase.
 *   2) Define instance variables that store the state of the fixture.
 *   3) Initialize the fixture state by overriding setUp().
 *   4) Clean-up after a test by overriding tearDown().
 *
 * Each test runs in its own fixture so there can be no side effects
 * among test runs.
 *
 * Here is an example:
 *
 * <code>
 * <?php
 * class MathTest extends PHPUnit_Framework_TestCase
 * {
 *     public $value1;
 *     public $value2;
 *
 *     protected function setUp()
 *     {
 *         $this->value1 = 2;
 *         $this->value2 = 3;
 *     }
 * }
 * ?>
 * </code>
 *
 * For each test implement a method which interacts with the fixture.
 * Verify the expected results with assertions specified by calling
 * assert with a boolean.
 *
 * <code>
 * <?php
 * public function testPass()
 * {
 *     $this->assertTrue($this->value1 + $this->value2 == 5);
 * }
 * ?>
 * </code>
 *
 * @since Class available since Release 2.0.0
 */
abstract class PHPUnit_Framework_TestCase extends PHPUnit_Framework_Assert implements PHPUnit_Framework_Test, PHPUnit_Framework_SelfDescribing
{
    /**
     * Enable or disable the backup and restoration of the $GLOBALS array.
     * Overwrite this attribute in a child class of TestCase.
     * Setting this attribute in setUp() has no effect!
     *
     * @var bool
     */
    protected $backupGlobals = null;

    /**
     * @var array
     */
    protected $backupGlobalsBlacklist = array();

    /**
     * Enable or disable the backup and restoration of static attributes.
     * Overwrite this attribute in a child class of TestCase.
     * Setting this attribute in setUp() has no effect!
     *
     * @var bool
     */
    protected $backupStaticAttributes = null;

    /**
     * @var array
     */
    protected $backupStaticAttributesBlacklist = array();

    /**
     * Whether or not this test is to be run in a separate PHP process.
     *
     * @var bool
     */
    protected $runTestInSeparateProcess = null;

    /**
     * Whether or not this test should preserve the global state when
     * running in a separate PHP process.
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @var bool
     */
    protected $preserveGlobalState = true;

    /**
<<<<<<< HEAD
     * @var bool
     */
    private $runClassInSeparateProcess;

    /**
=======
     * Whether or not this test is running in a separate PHP process.
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @var bool
     */
    private $inIsolation = false;

    /**
     * @var array
     */
<<<<<<< HEAD
    private $data;
=======
    private $data = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var string
     */
<<<<<<< HEAD
    private $dataName;

    /**
     * @var null|string
     */
    private $expectedException;

    /**
     * @var null|string
     */
    private $expectedExceptionMessage;

    /**
     * @var null|string
     */
    private $expectedExceptionMessageRegExp;

    /**
     * @var null|int|string
=======
    private $dataName = '';

    /**
     * @var bool
     */
    private $useErrorHandler = null;

    /**
     * The name of the expected Exception.
     *
     * @var mixed
     */
    private $expectedException = null;

    /**
     * The message of the expected Exception.
     *
     * @var string
     */
    private $expectedExceptionMessage = '';

    /**
     * The regex pattern to validate the expected Exception message.
     *
     * @var string
     */
    private $expectedExceptionMessageRegExp = '';

    /**
     * The code of the expected Exception.
     *
     * @var int
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private $expectedExceptionCode;

    /**
<<<<<<< HEAD
     * @var string
     */
    private $name = '';

    /**
     * @var string[]
     */
    private $dependencies = [];
=======
     * The name of the test case.
     *
     * @var string
     */
    private $name = null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $dependencyInput = [];

    /**
     * @var array<string,string>
     */
    private $iniSettings = [];
=======
    private $dependencies = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $locale = [];

    /**
     * @var MockObject[]
     */
    private $mockObjects = [];

    /**
     * @var MockGenerator
     */
    private $mockObjectGenerator;
=======
    private $dependencyInput = array();

    /**
     * @var array
     */
    private $iniSettings = array();

    /**
     * @var array
     */
    private $locale = array();

    /**
     * @var array
     */
    private $mockObjects = array();

    /**
     * @var array
     */
    private $mockObjectGenerator = null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int
     */
<<<<<<< HEAD
    private $status = BaseTestRunner::STATUS_UNKNOWN;
=======
    private $status;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var string
     */
    private $statusMessage = '';

    /**
     * @var int
     */
    private $numAssertions = 0;

    /**
<<<<<<< HEAD
     * @var TestResult
=======
     * @var PHPUnit_Framework_TestResult
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private $result;

    /**
     * @var mixed
     */
    private $testResult;

    /**
     * @var string
     */
    private $output = '';

    /**
     * @var string
     */
<<<<<<< HEAD
    private $outputExpectedRegex;
=======
    private $outputExpectedRegex = null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var string
     */
<<<<<<< HEAD
    private $outputExpectedString;
=======
    private $outputExpectedString = null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var mixed
     */
    private $outputCallback = false;

    /**
     * @var bool
     */
    private $outputBufferingActive = false;

    /**
     * @var int
     */
    private $outputBufferingLevel;

    /**
<<<<<<< HEAD
     * @var bool
     */
    private $outputRetrievedForAssertion = false;

    /**
     * @var Snapshot
=======
     * @var SebastianBergmann\GlobalState\Snapshot
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private $snapshot;

    /**
<<<<<<< HEAD
     * @var \Prophecy\Prophet
=======
     * @var Prophecy\Prophet
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private $prophet;

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $beStrictAboutChangesToGlobalState = false;

    /**
     * @var bool
     */
    private $registerMockObjectsFromTestArgumentsRecursively = false;

    /**
     * @var string[]
     */
    private $warnings = [];

    /**
     * @var string[]
     */
    private $groups = [];

    /**
     * @var bool
     */
    private $doesNotPerformAssertions = false;

    /**
     * @var Comparator[]
     */
    private $customComparators = [];

    /**
     * @var string[]
     */
    private $doubledTypes = [];

    /**
     * @var bool
     */
    private $deprecatedExpectExceptionMessageRegExpUsed = false;

    /**
     * Returns a matcher that matches when the method is executed
     * zero or more times.
     */
    public static function any(): AnyInvokedCountMatcher
    {
        return new AnyInvokedCountMatcher;
    }

    /**
     * Returns a matcher that matches when the method is never executed.
     */
    public static function never(): InvokedCountMatcher
    {
        return new InvokedCountMatcher(0);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at least N times.
     */
    public static function atLeast(int $requiredInvocations): InvokedAtLeastCountMatcher
    {
        return new InvokedAtLeastCountMatcher(
            $requiredInvocations
        );
    }

    /**
     * Returns a matcher that matches when the method is executed at least once.
     */
    public static function atLeastOnce(): InvokedAtLeastOnceMatcher
    {
        return new InvokedAtLeastOnceMatcher;
    }

    /**
     * Returns a matcher that matches when the method is executed exactly once.
     */
    public static function once(): InvokedCountMatcher
    {
        return new InvokedCountMatcher(1);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * exactly $count times.
     */
    public static function exactly(int $count): InvokedCountMatcher
    {
        return new InvokedCountMatcher($count);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at most N times.
     */
    public static function atMost(int $allowedInvocations): InvokedAtMostCountMatcher
    {
        return new InvokedAtMostCountMatcher($allowedInvocations);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at the given index.
     */
    public static function at(int $index): InvokedAtIndexMatcher
    {
        return new InvokedAtIndexMatcher($index);
    }

    public static function returnValue($value): ReturnStub
    {
        return new ReturnStub($value);
    }

    public static function returnValueMap(array $valueMap): ReturnValueMapStub
    {
        return new ReturnValueMapStub($valueMap);
    }

    public static function returnArgument(int $argumentIndex): ReturnArgumentStub
    {
        return new ReturnArgumentStub($argumentIndex);
    }

    public static function returnCallback($callback): ReturnCallbackStub
    {
        return new ReturnCallbackStub($callback);
    }

    /**
     * Returns the current object.
     *
     * This method is useful when mocking a fluent interface.
     */
    public static function returnSelf(): ReturnSelfStub
    {
        return new ReturnSelfStub;
    }

    public static function throwException(Throwable $exception): ExceptionStub
    {
        return new ExceptionStub($exception);
    }

    public static function onConsecutiveCalls(...$args): ConsecutiveCallsStub
    {
        return new ConsecutiveCallsStub($args);
    }

    /**
     * @param string $name
     * @param string $dataName
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function __construct($name = null, array $data = [], $dataName = '')
=======
    private $disallowChangesToGlobalState = false;

    /**
     * Constructs a test case with the given name.
     *
     * @param string $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = array(), $dataName = '')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($name !== null) {
            $this->setName($name);
        }

<<<<<<< HEAD
        $this->data     = $data;
        $this->dataName = $dataName;
    }

    /**
     * This method is called before the first test of this test class is run.
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * This method is called after the last test of this test class is run.
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between setUp() and test.
     */
    protected function assertPreConditions(): void
    {
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between test and tearDown().
     */
    protected function assertPostConditions(): void
    {
    }

    /**
     * This method is called after each test.
     */
    protected function tearDown(): void
    {
=======
        $this->data                = $data;
        $this->dataName            = $dataName;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns a string representation of the test case.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     */
    public function toString(): string
    {
        try {
            $class = new ReflectionClass($this);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
        // @codeCoverageIgnoreEnd
=======
     * @return string
     */
    public function toString()
    {
        $class = new ReflectionClass($this);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $buffer = sprintf(
            '%s::%s',
            $class->name,
            $this->getName(false)
        );

        return $buffer . $this->getDataSetAsString();
    }

<<<<<<< HEAD
    public function count(): int
=======
    /**
     * Counts the number of test cases executed by run(TestResult result).
     *
     * @return int
     */
    public function count()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 1;
    }

<<<<<<< HEAD
    public function getActualOutputForAssertion(): string
    {
        $this->outputRetrievedForAssertion = true;

        return $this->getActualOutput();
    }

    public function expectOutputRegex(string $expectedRegex): void
    {
        $this->outputExpectedRegex = $expectedRegex;
    }

    public function expectOutputString(string $expectedString): void
    {
        $this->outputExpectedString = $expectedString;
    }

    /**
     * @psalm-param class-string<\Throwable> $exception
     */
    public function expectException(string $exception): void
    {
        $this->expectedException = $exception;
    }

    /**
     * @param int|string $code
     */
    public function expectExceptionCode($code): void
    {
        $this->expectedExceptionCode = $code;
    }

    public function expectExceptionMessage(string $message): void
    {
        $this->expectedExceptionMessage = $message;
    }

    public function expectExceptionMessageMatches(string $regularExpression): void
    {
        $this->expectedExceptionMessageRegExp = $regularExpression;
    }

    /**
     * @deprecated Use expectExceptionMessageMatches() instead
     */
    public function expectExceptionMessageRegExp(string $regularExpression): void
    {
        $this->deprecatedExpectExceptionMessageRegExpUsed = true;

        $this->expectExceptionMessageMatches($regularExpression);
    }

    /**
     * Sets up an expectation for an exception to be raised by the code under test.
     * Information for expected exception class, expected exception message, and
     * expected exception code are retrieved from a given Exception object.
     */
    public function expectExceptionObject(\Exception $exception): void
    {
        $this->expectException(get_class($exception));
        $this->expectExceptionMessage($exception->getMessage());
        $this->expectExceptionCode($exception->getCode());
    }

    public function expectNotToPerformAssertions(): void
    {
        $this->doesNotPerformAssertions = true;
    }

    public function expectDeprecation(): void
    {
        $this->expectException(Deprecated::class);
    }

    public function expectDeprecationMessage(string $message): void
    {
        $this->expectExceptionMessage($message);
    }

    public function expectDeprecationMessageMatches(string $regularExpression): void
    {
        $this->expectExceptionMessageMatches($regularExpression);
    }

    public function expectNotice(): void
    {
        $this->expectException(Notice::class);
    }

    public function expectNoticeMessage(string $message): void
    {
        $this->expectExceptionMessage($message);
    }

    public function expectNoticeMessageMatches(string $regularExpression): void
    {
        $this->expectExceptionMessageMatches($regularExpression);
    }

    public function expectWarning(): void
    {
        $this->expectException(WarningError::class);
    }

    public function expectWarningMessage(string $message): void
    {
        $this->expectExceptionMessage($message);
    }

    public function expectWarningMessageMatches(string $regularExpression): void
    {
        $this->expectExceptionMessageMatches($regularExpression);
    }

    public function expectError(): void
    {
        $this->expectException(Error::class);
    }

    public function expectErrorMessage(string $message): void
    {
        $this->expectExceptionMessage($message);
    }

    public function expectErrorMessageMatches(string $regularExpression): void
    {
        $this->expectExceptionMessageMatches($regularExpression);
    }

    public function getStatus(): int
=======
    /**
     * Returns the annotations for this test.
     *
     * @return array
     *
     * @since Method available since Release 3.4.0
     */
    public function getAnnotations()
    {
        return PHPUnit_Util_Test::parseTestMethodAnnotations(
            get_class($this),
            $this->name
        );
    }

    /**
     * Gets the name of a TestCase.
     *
     * @param bool $withDataSet
     *
     * @return string
     */
    public function getName($withDataSet = true)
    {
        if ($withDataSet) {
            return $this->name . $this->getDataSetAsString(false);
        } else {
            return $this->name;
        }
    }

    /**
     * Returns the size of the test.
     *
     * @return int
     *
     * @since  Method available since Release 3.6.0
     */
    public function getSize()
    {
        return PHPUnit_Util_Test::getSize(
            get_class($this),
            $this->getName(false)
        );
    }

    /**
     * @return string
     *
     * @since  Method available since Release 3.6.0
     */
    public function getActualOutput()
    {
        if (!$this->outputBufferingActive) {
            return $this->output;
        } else {
            return ob_get_contents();
        }
    }

    /**
     * @return bool
     *
     * @since  Method available since Release 3.6.0
     */
    public function hasOutput()
    {
        if (strlen($this->output) === 0) {
            return false;
        }

        if ($this->hasExpectationOnOutput()) {
            return false;
        }

        return true;
    }

    /**
     * @param string $expectedRegex
     *
     * @since Method available since Release 3.6.0
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function expectOutputRegex($expectedRegex)
    {
        if ($this->outputExpectedString !== null) {
            throw new PHPUnit_Framework_Exception;
        }

        if (is_string($expectedRegex) || is_null($expectedRegex)) {
            $this->outputExpectedRegex = $expectedRegex;
        }
    }

    /**
     * @param string $expectedString
     *
     * @since Method available since Release 3.6.0
     */
    public function expectOutputString($expectedString)
    {
        if ($this->outputExpectedRegex !== null) {
            throw new PHPUnit_Framework_Exception;
        }

        if (is_string($expectedString) || is_null($expectedString)) {
            $this->outputExpectedString = $expectedString;
        }
    }

    /**
     * @return bool
     *
     * @since Method available since Release 3.6.5
     * @deprecated
     */
    public function hasPerformedExpectationsOnOutput()
    {
        return $this->hasExpectationOnOutput();
    }

    /**
     * @return bool
     *
     * @since Method available since Release 4.3.3
     */
    public function hasExpectationOnOutput()
    {
        return is_string($this->outputExpectedString) || is_string($this->outputExpectedRegex);
    }

    /**
     * @return string
     *
     * @since  Method available since Release 3.2.0
     */
    public function getExpectedException()
    {
        return $this->expectedException;
    }

    /**
     * @param mixed  $exceptionName
     * @param string $exceptionMessage
     * @param int    $exceptionCode
     *
     * @since  Method available since Release 3.2.0
     */
    public function setExpectedException($exceptionName, $exceptionMessage = '', $exceptionCode = null)
    {
        $this->expectedException        = $exceptionName;
        $this->expectedExceptionMessage = $exceptionMessage;
        $this->expectedExceptionCode    = $exceptionCode;
    }

    /**
     * @param mixed  $exceptionName
     * @param string $exceptionMessageRegExp
     * @param int    $exceptionCode
     *
     * @since Method available since Release 4.3.0
     */
    public function setExpectedExceptionRegExp($exceptionName, $exceptionMessageRegExp = '', $exceptionCode = null)
    {
        $this->expectedException              = $exceptionName;
        $this->expectedExceptionMessageRegExp = $exceptionMessageRegExp;
        $this->expectedExceptionCode          = $exceptionCode;
    }

    /**
     * @since  Method available since Release 3.4.0
     */
    protected function setExpectedExceptionFromAnnotation()
    {
        try {
            $expectedException = PHPUnit_Util_Test::getExpectedException(
                get_class($this),
                $this->name
            );

            if ($expectedException !== false) {
                $this->setExpectedException(
                    $expectedException['class'],
                    $expectedException['message'],
                    $expectedException['code']
                );

                if (!empty($expectedException['message_regex'])) {
                    $this->setExpectedExceptionRegExp(
                        $expectedException['class'],
                        $expectedException['message_regex'],
                        $expectedException['code']
                    );
                }
            }
        } catch (ReflectionException $e) {
        }
    }

    /**
     * @param bool $useErrorHandler
     *
     * @since Method available since Release 3.4.0
     */
    public function setUseErrorHandler($useErrorHandler)
    {
        $this->useErrorHandler = $useErrorHandler;
    }

    /**
     * @since Method available since Release 3.4.0
     */
    protected function setUseErrorHandlerFromAnnotation()
    {
        try {
            $useErrorHandler = PHPUnit_Util_Test::getErrorHandlerSettings(
                get_class($this),
                $this->name
            );

            if ($useErrorHandler !== null) {
                $this->setUseErrorHandler($useErrorHandler);
            }
        } catch (ReflectionException $e) {
        }
    }

    /**
     * @since Method available since Release 3.6.0
     */
    protected function checkRequirements()
    {
        if (!$this->name || !method_exists($this, $this->name)) {
            return;
        }

        $missingRequirements = PHPUnit_Util_Test::getMissingRequirements(
            get_class($this),
            $this->name
        );

        if (!empty($missingRequirements)) {
            $this->markTestSkipped(implode(PHP_EOL, $missingRequirements));
        }
    }

    /**
     * Returns the status of this test.
     *
     * @return int
     *
     * @since  Method available since Release 3.1.0
     */
    public function getStatus()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->status;
    }

<<<<<<< HEAD
    public function markAsRisky(): void
    {
        $this->status = BaseTestRunner::STATUS_RISKY;
    }

    public function getStatusMessage(): string
=======
    /**
     * Returns the status message of this test.
     *
     * @return string
     *
     * @since  Method available since Release 3.3.0
     */
    public function getStatusMessage()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->statusMessage;
    }

<<<<<<< HEAD
    public function hasFailed(): bool
    {
        $status = $this->getStatus();

        return $status === BaseTestRunner::STATUS_FAILURE || $status === BaseTestRunner::STATUS_ERROR;
=======
    /**
     * Returns whether or not this test has failed.
     *
     * @return bool
     *
     * @since  Method available since Release 3.0.0
     */
    public function hasFailed()
    {
        $status = $this->getStatus();

        return $status == PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE ||
               $status == PHPUnit_Runner_BaseTestRunner::STATUS_ERROR;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Runs the test case and collects the results in a TestResult object.
     * If no TestResult object is passed a new one will be created.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws \SebastianBergmann\CodeCoverage\MissingCoversAnnotationException
     * @throws \SebastianBergmann\CodeCoverage\RuntimeException
     * @throws \SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws CodeCoverageException
     * @throws UtilException
     */
    public function run(TestResult $result = null): TestResult
=======
     * @param PHPUnit_Framework_TestResult $result
     *
     * @return PHPUnit_Framework_TestResult
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function run(PHPUnit_Framework_TestResult $result = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($result === null) {
            $result = $this->createResult();
        }

<<<<<<< HEAD
        if (!$this instanceof WarningTestCase) {
            $this->setTestResultObject($result);
        }

        if (!$this instanceof WarningTestCase &&
            !$this instanceof SkippedTestCase &&
            !$this->handleDependencies()) {
            return $result;
        }

        if ($this->runInSeparateProcess()) {
            $runEntireClass = $this->runClassInSeparateProcess && !$this->runTestInSeparateProcess;

            try {
                $class = new ReflectionClass($this);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
                    $e
                );
            }
            // @codeCoverageIgnoreEnd

            if ($runEntireClass) {
                $template = new Text_Template(
                    __DIR__ . '/../Util/PHP/Template/TestCaseClass.tpl'
                );
            } else {
                $template = new Text_Template(
                    __DIR__ . '/../Util/PHP/Template/TestCaseMethod.tpl'
                );
            }

            if ($this->preserveGlobalState) {
                $constants     = GlobalState::getConstantsAsString();
                $globals       = GlobalState::getGlobalsAsString();
                $includedFiles = GlobalState::getIncludedFilesAsString();
                $iniSettings   = GlobalState::getIniSettingsAsString();
            } else {
                $constants = '';

                if (!empty($GLOBALS['__PHPUNIT_BOOTSTRAP'])) {
                    $globals = '$GLOBALS[\'__PHPUNIT_BOOTSTRAP\'] = ' . var_export($GLOBALS['__PHPUNIT_BOOTSTRAP'], true) . ";\n";
                } else {
                    $globals = '';
                }

=======
        if (!$this instanceof PHPUnit_Framework_Warning) {
            $this->setTestResultObject($result);
            $this->setUseErrorHandlerFromAnnotation();
        }

        if ($this->useErrorHandler !== null) {
            $oldErrorHandlerSetting = $result->getConvertErrorsToExceptions();
            $result->convertErrorsToExceptions($this->useErrorHandler);
        }

        if (!$this instanceof PHPUnit_Framework_Warning && !$this->handleDependencies()) {
            return;
        }

        if ($this->runTestInSeparateProcess === true &&
            $this->inIsolation !== true &&
            !$this instanceof PHPUnit_Extensions_SeleniumTestCase &&
            !$this instanceof PHPUnit_Extensions_PhptTestCase) {
            $class = new ReflectionClass($this);

            $template = new Text_Template(
                __DIR__ . '/../Util/PHP/Template/TestCaseMethod.tpl'
            );

            if ($this->preserveGlobalState) {
                $constants     = PHPUnit_Util_GlobalState::getConstantsAsString();
                $globals       = PHPUnit_Util_GlobalState::getGlobalsAsString();
                $includedFiles = PHPUnit_Util_GlobalState::getIncludedFilesAsString();
                $iniSettings   = PHPUnit_Util_GlobalState::getIniSettingsAsString();
            } else {
                $constants     = '';
                if (!empty($GLOBALS['__PHPUNIT_BOOTSTRAP'])) {
                    $globals     = '$GLOBALS[\'__PHPUNIT_BOOTSTRAP\'] = ' . var_export($GLOBALS['__PHPUNIT_BOOTSTRAP'], true) . ";\n";
                } else {
                    $globals     = '';
                }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $includedFiles = '';
                $iniSettings   = '';
            }

<<<<<<< HEAD
            $coverage                                   = $result->getCollectCodeCoverageInformation() ? 'true' : 'false';
            $isStrictAboutTestsThatDoNotTestAnything    = $result->isStrictAboutTestsThatDoNotTestAnything() ? 'true' : 'false';
            $isStrictAboutOutputDuringTests             = $result->isStrictAboutOutputDuringTests() ? 'true' : 'false';
            $enforcesTimeLimit                          = $result->enforcesTimeLimit() ? 'true' : 'false';
            $isStrictAboutTodoAnnotatedTests            = $result->isStrictAboutTodoAnnotatedTests() ? 'true' : 'false';
            $isStrictAboutResourceUsageDuringSmallTests = $result->isStrictAboutResourceUsageDuringSmallTests() ? 'true' : 'false';
=======
            $coverage                                = $result->getCollectCodeCoverageInformation()       ? 'true' : 'false';
            $isStrictAboutTestsThatDoNotTestAnything = $result->isStrictAboutTestsThatDoNotTestAnything() ? 'true' : 'false';
            $isStrictAboutOutputDuringTests          = $result->isStrictAboutOutputDuringTests()          ? 'true' : 'false';
            $isStrictAboutTestSize                   = $result->isStrictAboutTestSize()                   ? 'true' : 'false';
            $isStrictAboutTodoAnnotatedTests         = $result->isStrictAboutTodoAnnotatedTests()         ? 'true' : 'false';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            if (defined('PHPUNIT_COMPOSER_INSTALL')) {
                $composerAutoload = var_export(PHPUNIT_COMPOSER_INSTALL, true);
            } else {
                $composerAutoload = '\'\'';
            }

            if (defined('__PHPUNIT_PHAR__')) {
                $phar = var_export(__PHPUNIT_PHAR__, true);
            } else {
                $phar = '\'\'';
            }

            if ($result->getCodeCoverage()) {
                $codeCoverageFilter = $result->getCodeCoverage()->filter();
            } else {
                $codeCoverageFilter = null;
            }

            $data               = var_export(serialize($this->data), true);
            $dataName           = var_export($this->dataName, true);
            $dependencyInput    = var_export(serialize($this->dependencyInput), true);
            $includePath        = var_export(get_include_path(), true);
            $codeCoverageFilter = var_export(serialize($codeCoverageFilter), true);
            // must do these fixes because TestCaseMethod.tpl has unserialize('{data}') in it, and we can't break BC
            // the lines above used to use addcslashes() rather than var_export(), which breaks null byte escape sequences
            $data               = "'." . $data . ".'";
            $dataName           = "'.(" . $dataName . ").'";
            $dependencyInput    = "'." . $dependencyInput . ".'";
            $includePath        = "'." . $includePath . ".'";
            $codeCoverageFilter = "'." . $codeCoverageFilter . ".'";

<<<<<<< HEAD
            $configurationFilePath = $GLOBALS['__PHPUNIT_CONFIGURATION_FILE'] ?? '';

            $var = [
                'composerAutoload'                           => $composerAutoload,
                'phar'                                       => $phar,
                'filename'                                   => $class->getFileName(),
                'className'                                  => $class->getName(),
                'collectCodeCoverageInformation'             => $coverage,
                'data'                                       => $data,
                'dataName'                                   => $dataName,
                'dependencyInput'                            => $dependencyInput,
                'constants'                                  => $constants,
                'globals'                                    => $globals,
                'include_path'                               => $includePath,
                'included_files'                             => $includedFiles,
                'iniSettings'                                => $iniSettings,
                'isStrictAboutTestsThatDoNotTestAnything'    => $isStrictAboutTestsThatDoNotTestAnything,
                'isStrictAboutOutputDuringTests'             => $isStrictAboutOutputDuringTests,
                'enforcesTimeLimit'                          => $enforcesTimeLimit,
                'isStrictAboutTodoAnnotatedTests'            => $isStrictAboutTodoAnnotatedTests,
                'isStrictAboutResourceUsageDuringSmallTests' => $isStrictAboutResourceUsageDuringSmallTests,
                'codeCoverageFilter'                         => $codeCoverageFilter,
                'configurationFilePath'                      => $configurationFilePath,
                'name'                                       => $this->getName(false),
            ];

            if (!$runEntireClass) {
                $var['methodName'] = $this->name;
            }

            $template->setVar($var);

            $php = AbstractPhpProcess::factory();
=======
            $configurationFilePath = (isset($GLOBALS['__PHPUNIT_CONFIGURATION_FILE']) ? $GLOBALS['__PHPUNIT_CONFIGURATION_FILE'] : '');

            $template->setVar(
                array(
                    'composerAutoload'                        => $composerAutoload,
                    'phar'                                    => $phar,
                    'filename'                                => $class->getFileName(),
                    'className'                               => $class->getName(),
                    'methodName'                              => $this->name,
                    'collectCodeCoverageInformation'          => $coverage,
                    'data'                                    => $data,
                    'dataName'                                => $dataName,
                    'dependencyInput'                         => $dependencyInput,
                    'constants'                               => $constants,
                    'globals'                                 => $globals,
                    'include_path'                            => $includePath,
                    'included_files'                          => $includedFiles,
                    'iniSettings'                             => $iniSettings,
                    'isStrictAboutTestsThatDoNotTestAnything' => $isStrictAboutTestsThatDoNotTestAnything,
                    'isStrictAboutOutputDuringTests'          => $isStrictAboutOutputDuringTests,
                    'isStrictAboutTestSize'                   => $isStrictAboutTestSize,
                    'isStrictAboutTodoAnnotatedTests'         => $isStrictAboutTodoAnnotatedTests,
                    'codeCoverageFilter'                      => $codeCoverageFilter,
                    'configurationFilePath'                   => $configurationFilePath
                )
            );

            $this->prepareTemplate($template);

            $php = PHPUnit_Util_PHP::factory();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $php->runTestJob($template->render(), $this, $result);
        } else {
            $result->run($this);
        }

<<<<<<< HEAD
=======
        if ($this->useErrorHandler !== null) {
            $result->convertErrorsToExceptions($oldErrorHandlerSetting);
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->result = null;

        return $result;
    }

    /**
<<<<<<< HEAD
     * Returns a builder object to create mock objects using a fluent interface.
     *
     * @param string|string[] $className
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType>|string[] $className
     *
     * @psalm-return MockBuilder<RealInstanceType>
     */
    public function getMockBuilder($className): MockBuilder
    {
        if (!is_string($className)) {
            $this->addWarning('Passing an array of interface names to getMockBuilder() for creating a test double that implements multiple interfaces is deprecated and will no longer be supported in PHPUnit 9.');
        }

        $this->recordDoubledType($className);

        return new MockBuilder($this, $className);
    }

    public function registerComparator(Comparator $comparator): void
    {
        ComparatorFactory::getInstance()->register($comparator);

        $this->customComparators[] = $comparator;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     *
     * @deprecated Invoking this method has no effect; it will be removed in PHPUnit 9
     */
    public function setUseErrorHandler(bool $useErrorHandler): void
    {
    }

    /**
     * @return string[]
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function doubledTypes(): array
    {
        return array_unique($this->doubledTypes);
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setGroups(array $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getAnnotations(): array
    {
        return TestUtil::parseTestMethodAnnotations(
            static::class,
            $this->name
        );
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getName(bool $withDataSet = true): string
    {
        if ($withDataSet) {
            return $this->name . $this->getDataSetAsString(false);
        }

        return $this->name;
    }

    /**
     * Returns the size of the test.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getSize(): int
    {
        return TestUtil::getSize(
            static::class,
            $this->getName(false)
        );
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function hasSize(): bool
    {
        return $this->getSize() !== TestUtil::UNKNOWN;
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function isSmall(): bool
    {
        return $this->getSize() === TestUtil::SMALL;
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function isMedium(): bool
    {
        return $this->getSize() === TestUtil::MEDIUM;
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function isLarge(): bool
    {
        return $this->getSize() === TestUtil::LARGE;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getActualOutput(): string
    {
        if (!$this->outputBufferingActive) {
            return $this->output;
        }

        return (string) ob_get_contents();
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function hasOutput(): bool
    {
        if ($this->output === '') {
            return false;
        }

        if ($this->hasExpectationOnOutput()) {
            return false;
        }

        return true;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function doesNotPerformAssertions(): bool
    {
        return $this->doesNotPerformAssertions;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function hasExpectationOnOutput(): bool
    {
        return is_string($this->outputExpectedString) || is_string($this->outputExpectedRegex) || $this->outputRetrievedForAssertion;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getExpectedException(): ?string
    {
        return $this->expectedException;
    }

    /**
     * @return null|int|string
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getExpectedExceptionCode()
    {
        return $this->expectedExceptionCode;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getExpectedExceptionMessage(): ?string
    {
        return $this->expectedExceptionMessage;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getExpectedExceptionMessageRegExp(): ?string
    {
        return $this->expectedExceptionMessageRegExp;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setRegisterMockObjectsFromTestArgumentsRecursively(bool $flag): void
    {
        $this->registerMockObjectsFromTestArgumentsRecursively = $flag;
    }

    /**
     * @throws Throwable
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function runBare(): void
=======
     * Runs the bare test sequence.
     */
    public function runBare()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->numAssertions = 0;

        $this->snapshotGlobalState();
        $this->startOutputBuffering();
        clearstatcache();
        $currentWorkingDirectory = getcwd();

<<<<<<< HEAD
        $hookMethods = TestUtil::getHookMethods(static::class);

        $hasMetRequirements = false;

        try {
=======
        $hookMethods = PHPUnit_Util_Test::getHookMethods(get_class($this));

        try {
            $hasMetRequirements = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->checkRequirements();
            $hasMetRequirements = true;

            if ($this->inIsolation) {
                foreach ($hookMethods['beforeClass'] as $method) {
<<<<<<< HEAD
                    $this->{$method}();
=======
                    $this->$method();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                }
            }

            $this->setExpectedExceptionFromAnnotation();
<<<<<<< HEAD
            $this->setDoesNotPerformAssertionsFromAnnotation();

            foreach ($hookMethods['before'] as $method) {
                $this->{$method}();
=======

            foreach ($hookMethods['before'] as $method) {
                $this->$method();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }

            $this->assertPreConditions();
            $this->testResult = $this->runTest();
            $this->verifyMockObjects();
            $this->assertPostConditions();

<<<<<<< HEAD
            if (!empty($this->warnings)) {
                throw new Warning(
                    implode(
                        "\n",
                        array_unique($this->warnings)
                    )
                );
            }

            $this->status = BaseTestRunner::STATUS_PASSED;
        } catch (IncompleteTest $e) {
            $this->status        = BaseTestRunner::STATUS_INCOMPLETE;
            $this->statusMessage = $e->getMessage();
        } catch (SkippedTest $e) {
            $this->status        = BaseTestRunner::STATUS_SKIPPED;
            $this->statusMessage = $e->getMessage();
        } catch (Warning $e) {
            $this->status        = BaseTestRunner::STATUS_WARNING;
            $this->statusMessage = $e->getMessage();
        } catch (AssertionFailedError $e) {
            $this->status        = BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $e->getMessage();
        } catch (PredictionException $e) {
            $this->status        = BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $e->getMessage();
        } catch (Throwable $_e) {
            $e                   = $_e;
            $this->status        = BaseTestRunner::STATUS_ERROR;
            $this->statusMessage = $_e->getMessage();
        }

        $this->mockObjects = [];
=======
            $this->status = PHPUnit_Runner_BaseTestRunner::STATUS_PASSED;
        } catch (PHPUnit_Framework_IncompleteTest $e) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_INCOMPLETE;
            $this->statusMessage = $e->getMessage();
        } catch (PHPUnit_Framework_SkippedTest $e) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_SKIPPED;
            $this->statusMessage = $e->getMessage();
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $e->getMessage();
        } catch (PredictionException $e) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $e->getMessage();
        } catch (Throwable $_e) {
            $e = $_e;
        } catch (Exception $_e) {
            $e = $_e;
        }

        if (isset($_e)) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_ERROR;
            $this->statusMessage = $_e->getMessage();
        }

        // Clean up the mock objects.
        $this->mockObjects = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->prophet     = null;

        // Tear down the fixture. An exception raised in tearDown() will be
        // caught and passed on when no exception was raised before.
        try {
            if ($hasMetRequirements) {
                foreach ($hookMethods['after'] as $method) {
<<<<<<< HEAD
                    $this->{$method}();
=======
                    $this->$method();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                }

                if ($this->inIsolation) {
                    foreach ($hookMethods['afterClass'] as $method) {
<<<<<<< HEAD
                        $this->{$method}();
=======
                        $this->$method();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    }
                }
            }
        } catch (Throwable $_e) {
<<<<<<< HEAD
            $e = $e ?? $_e;
=======
            if (!isset($e)) {
                $e = $_e;
            }
        } catch (Exception $_e) {
            if (!isset($e)) {
                $e = $_e;
            }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        try {
            $this->stopOutputBuffering();
<<<<<<< HEAD
        } catch (RiskyTestError $_e) {
            $e = $e ?? $_e;
        }

        if (isset($_e)) {
            $this->status        = BaseTestRunner::STATUS_ERROR;
            $this->statusMessage = $_e->getMessage();
=======
        } catch (PHPUnit_Framework_RiskyTestError $_e) {
            if (!isset($e)) {
                $e = $_e;
            }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        clearstatcache();

<<<<<<< HEAD
        if ($currentWorkingDirectory !== getcwd()) {
=======
        if ($currentWorkingDirectory != getcwd()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            chdir($currentWorkingDirectory);
        }

        $this->restoreGlobalState();
<<<<<<< HEAD
        $this->unregisterCustomComparators();
        $this->cleanupIniSettings();
        $this->cleanupLocaleSettings();
        libxml_clear_errors();
=======

        // Clean up INI settings.
        foreach ($this->iniSettings as $varName => $oldValue) {
            ini_set($varName, $oldValue);
        }

        $this->iniSettings = array();

        // Clean up locale settings.
        foreach ($this->locale as $category => $locale) {
            setlocale($category, $locale);
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        // Perform assertion on output.
        if (!isset($e)) {
            try {
                if ($this->outputExpectedRegex !== null) {
                    $this->assertRegExp($this->outputExpectedRegex, $this->output);
                } elseif ($this->outputExpectedString !== null) {
                    $this->assertEquals($this->outputExpectedString, $this->output);
                }
            } catch (Throwable $_e) {
                $e = $_e;
<<<<<<< HEAD
=======
            } catch (Exception $_e) {
                $e = $_e;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }

        // Workaround for missing "finally".
        if (isset($e)) {
            if ($e instanceof PredictionException) {
<<<<<<< HEAD
                $e = new AssertionFailedError($e->getMessage());
=======
                $e = new PHPUnit_Framework_AssertionFailedError($e->getMessage());
            }

            if (!$e instanceof Exception) {
                // Rethrow Error directly on PHP 7 as onNotSuccessfulTest does not support it
                throw $e;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }

            $this->onNotSuccessfulTest($e);
        }
    }

    /**
<<<<<<< HEAD
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string[] $dependencies
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setDependencies(array $dependencies): void
    {
        $this->dependencies = $dependencies;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getDependencies(): array
    {
        return $this->dependencies;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function hasDependencies(): bool
    {
        return count($this->dependencies) > 0;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setDependencyInput(array $dependencyInput): void
    {
        $this->dependencyInput = $dependencyInput;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getDependencyInput(): array
    {
        return $this->dependencyInput;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setBeStrictAboutChangesToGlobalState(?bool $beStrictAboutChangesToGlobalState): void
    {
        $this->beStrictAboutChangesToGlobalState = $beStrictAboutChangesToGlobalState;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setBackupGlobals(?bool $backupGlobals): void
    {
        if ($this->backupGlobals === null && $backupGlobals !== null) {
            $this->backupGlobals = $backupGlobals;
        }
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setBackupStaticAttributes(?bool $backupStaticAttributes): void
    {
        if ($this->backupStaticAttributes === null && $backupStaticAttributes !== null) {
            $this->backupStaticAttributes = $backupStaticAttributes;
        }
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setRunTestInSeparateProcess(bool $runTestInSeparateProcess): void
    {
        if ($this->runTestInSeparateProcess === null) {
            $this->runTestInSeparateProcess = $runTestInSeparateProcess;
        }
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setRunClassInSeparateProcess(bool $runClassInSeparateProcess): void
    {
        if ($this->runClassInSeparateProcess === null) {
            $this->runClassInSeparateProcess = $runClassInSeparateProcess;
        }
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setPreserveGlobalState(bool $preserveGlobalState): void
    {
        $this->preserveGlobalState = $preserveGlobalState;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setInIsolation(bool $inIsolation): void
    {
        $this->inIsolation = $inIsolation;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function isInIsolation(): bool
    {
        return $this->inIsolation;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getResult()
    {
        return $this->testResult;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setResult($result): void
    {
        $this->testResult = $result;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setOutputCallback(callable $callback): void
    {
        $this->outputCallback = $callback;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getTestResultObject(): ?TestResult
    {
        return $this->result;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setTestResultObject(TestResult $result): void
    {
        $this->result = $result;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function registerMockObject(MockObject $mockObject): void
    {
        $this->mockObjects[] = $mockObject;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function addToAssertionCount(int $count): void
    {
        $this->numAssertions += $count;
    }

    /**
     * Returns the number of assertions performed by this test.
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getNumAssertions(): int
    {
        return $this->numAssertions;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function usesDataProvider(): bool
    {
        return !empty($this->data);
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function dataDescription(): string
    {
        return is_string($this->dataName) ? $this->dataName : '';
    }

    /**
     * @return int|string
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function dataName()
    {
        return $this->dataName;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getDataSetAsString(bool $includeData = true): string
    {
        $buffer = '';

        if (!empty($this->data)) {
            if (is_int($this->dataName)) {
                $buffer .= sprintf(' with data set #%d', $this->dataName);
            } else {
                $buffer .= sprintf(' with data set "%s"', $this->dataName);
            }

            if ($includeData) {
                $exporter = new Exporter;

                $buffer .= sprintf(' (%s)', $exporter->shortenedRecursiveExport($this->data));
            }
        }

        return $buffer;
    }

    /**
     * Gets the data set of a TestCase.
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getProvidedData(): array
    {
        return $this->data;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function addWarning(string $warning): void
    {
        $this->warnings[] = $warning;
    }

    /**
     * Override to run the test and assert its state.
     *
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     * @throws AssertionFailedError
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws Throwable
     */
    protected function runTest()
    {
        if (trim($this->name) === '') {
            throw new Exception(
                'PHPUnit\Framework\TestCase::$name must be a non-blank string.'
            );
        }

        $testArguments = array_merge($this->data, $this->dependencyInput);

        $this->registerMockObjectsFromTestArguments($testArguments);

        try {
            $testResult = $this->{$this->name}(...array_values($testArguments));
        } catch (Throwable $exception) {
            if (!$this->checkExceptionExpectations($exception)) {
                throw $exception;
            }

            if ($this->expectedException !== null) {
                if ($this->expectedException === Error::class) {
                    $this->assertThat(
                        $exception,
                        LogicalOr::fromConstraints(
                            new ExceptionConstraint(Error::class),
                            new ExceptionConstraint(\Error::class)
                        )
                    );
                } else {
                    $this->assertThat(
                        $exception,
                        new ExceptionConstraint(
                            $this->expectedException
                        )
                    );
                }
            }

            if ($this->expectedExceptionMessage !== null) {
                $this->assertThat(
                    $exception,
                    new ExceptionMessage(
                        $this->expectedExceptionMessage
                    )
                );
            }

            if ($this->expectedExceptionMessageRegExp !== null) {
                $this->assertThat(
                    $exception,
                    new ExceptionMessageRegularExpression(
                        $this->expectedExceptionMessageRegExp
                    )
                );
            }

            if ($this->expectedExceptionCode !== null) {
                $this->assertThat(
                    $exception,
                    new ExceptionCode(
                        $this->expectedExceptionCode
                    )
                );
            }

            if ($this->deprecatedExpectExceptionMessageRegExpUsed) {
                $this->addWarning('expectExceptionMessageRegExp() is deprecated in PHPUnit 8 and will be removed in PHPUnit 9. Use expectExceptionMessageMatches() instead.');
            }

            return;
=======
     * Override to run the test and assert its state.
     *
     * @return mixed
     *
     * @throws Exception|PHPUnit_Framework_Exception
     * @throws PHPUnit_Framework_Exception
     */
    protected function runTest()
    {
        if ($this->name === null) {
            throw new PHPUnit_Framework_Exception(
                'PHPUnit_Framework_TestCase::$name must not be null.'
            );
        }

        try {
            $class  = new ReflectionClass($this);
            $method = $class->getMethod($this->name);
        } catch (ReflectionException $e) {
            $this->fail($e->getMessage());
        }

        try {
            $testResult = $method->invokeArgs(
                $this,
                array_merge($this->data, $this->dependencyInput)
            );
        } catch (Throwable $_e) {
            $e = $_e;
        } catch (Exception $_e) {
            $e = $_e;
        }

        if (isset($e)) {
            $checkException = false;

            if (!($e instanceof PHPUnit_Framework_SkippedTestError) && is_string($this->expectedException)) {
                $checkException = true;

                if ($e instanceof PHPUnit_Framework_Exception) {
                    $checkException = false;
                }

                $reflector = new ReflectionClass($this->expectedException);

                if ($this->expectedException === 'PHPUnit_Framework_Exception' ||
                    $this->expectedException === '\PHPUnit_Framework_Exception' ||
                    $reflector->isSubclassOf('PHPUnit_Framework_Exception')) {
                    $checkException = true;
                }
            }

            if ($checkException) {
                $this->assertThat(
                    $e,
                    new PHPUnit_Framework_Constraint_Exception(
                        $this->expectedException
                    )
                );

                if (is_string($this->expectedExceptionMessage) &&
                    !empty($this->expectedExceptionMessage)) {
                    $this->assertThat(
                        $e,
                        new PHPUnit_Framework_Constraint_ExceptionMessage(
                            $this->expectedExceptionMessage
                        )
                    );
                }

                if (is_string($this->expectedExceptionMessageRegExp) &&
                    !empty($this->expectedExceptionMessageRegExp)) {
                    $this->assertThat(
                        $e,
                        new PHPUnit_Framework_Constraint_ExceptionMessageRegExp(
                            $this->expectedExceptionMessageRegExp
                        )
                    );
                }

                if ($this->expectedExceptionCode !== null) {
                    $this->assertThat(
                        $e,
                        new PHPUnit_Framework_Constraint_ExceptionCode(
                            $this->expectedExceptionCode
                        )
                    );
                }

                return;
            } else {
                throw $e;
            }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if ($this->expectedException !== null) {
            $this->assertThat(
                null,
<<<<<<< HEAD
                new ExceptionConstraint(
                    $this->expectedException
                )
            );
        } elseif ($this->expectedExceptionMessage !== null) {
            $this->numAssertions++;

            throw new AssertionFailedError(
                sprintf(
                    'Failed asserting that exception with message "%s" is thrown',
                    $this->expectedExceptionMessage
                )
            );
        } elseif ($this->expectedExceptionMessageRegExp !== null) {
            $this->numAssertions++;

            throw new AssertionFailedError(
                sprintf(
                    'Failed asserting that exception with message matching "%s" is thrown',
                    $this->expectedExceptionMessageRegExp
                )
            );
        } elseif ($this->expectedExceptionCode !== null) {
            $this->numAssertions++;

            throw new AssertionFailedError(
                sprintf(
                    'Failed asserting that exception with code "%s" is thrown',
                    $this->expectedExceptionCode
                )
            );
=======
                new PHPUnit_Framework_Constraint_Exception(
                    $this->expectedException
                )
            );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $testResult;
    }

    /**
<<<<<<< HEAD
=======
     * Verifies the mock object expectations.
     *
     * @since Method available since Release 3.5.0
     */
    protected function verifyMockObjects()
    {
        foreach ($this->mockObjects as $mockObject) {
            if ($mockObject->__phpunit_hasMatchers()) {
                $this->numAssertions++;
            }

            $mockObject->__phpunit_verify();
        }

        if ($this->prophet !== null) {
            try {
                $this->prophet->checkPredictions();
            } catch (Throwable $e) {
                /* Intentionally left empty */
            } catch (Exception $e) {
                /* Intentionally left empty */
            }

            foreach ($this->prophet->getProphecies() as $objectProphecy) {
                foreach ($objectProphecy->getMethodProphecies() as $methodProphecies) {
                    foreach ($methodProphecies as $methodProphecy) {
                        $this->numAssertions += count($methodProphecy->getCheckedPredictions());
                    }
                }
            }

            if (isset($e)) {
                throw $e;
            }
        }
    }

    /**
     * Sets the name of a TestCase.
     *
     * @param  string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Sets the dependencies of a TestCase.
     *
     * @param array $dependencies
     *
     * @since  Method available since Release 3.4.0
     */
    public function setDependencies(array $dependencies)
    {
        $this->dependencies = $dependencies;
    }

    /**
     * Returns true if the tests has dependencies
     *
     * @return bool
     *
     * @since Method available since Release 4.0.0
     */
    public function hasDependencies()
    {
        return count($this->dependencies) > 0;
    }

    /**
     * Sets
     *
     * @param array $dependencyInput
     *
     * @since  Method available since Release 3.4.0
     */
    public function setDependencyInput(array $dependencyInput)
    {
        $this->dependencyInput = $dependencyInput;
    }

    /**
     * @param bool $disallowChangesToGlobalState
     *
     * @since Method available since Release 4.6.0
     */
    public function setDisallowChangesToGlobalState($disallowChangesToGlobalState)
    {
        $this->disallowChangesToGlobalState = $disallowChangesToGlobalState;
    }

    /**
     * Calling this method in setUp() has no effect!
     *
     * @param bool $backupGlobals
     *
     * @since  Method available since Release 3.3.0
     */
    public function setBackupGlobals($backupGlobals)
    {
        if (is_null($this->backupGlobals) && is_bool($backupGlobals)) {
            $this->backupGlobals = $backupGlobals;
        }
    }

    /**
     * Calling this method in setUp() has no effect!
     *
     * @param bool $backupStaticAttributes
     *
     * @since  Method available since Release 3.4.0
     */
    public function setBackupStaticAttributes($backupStaticAttributes)
    {
        if (is_null($this->backupStaticAttributes) &&
            is_bool($backupStaticAttributes)) {
            $this->backupStaticAttributes = $backupStaticAttributes;
        }
    }

    /**
     * @param bool $runTestInSeparateProcess
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.4.0
     */
    public function setRunTestInSeparateProcess($runTestInSeparateProcess)
    {
        if (is_bool($runTestInSeparateProcess)) {
            if ($this->runTestInSeparateProcess === null) {
                $this->runTestInSeparateProcess = $runTestInSeparateProcess;
            }
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }
    }

    /**
     * @param bool $preserveGlobalState
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.4.0
     */
    public function setPreserveGlobalState($preserveGlobalState)
    {
        if (is_bool($preserveGlobalState)) {
            $this->preserveGlobalState = $preserveGlobalState;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }
    }

    /**
     * @param bool $inIsolation
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.4.0
     */
    public function setInIsolation($inIsolation)
    {
        if (is_bool($inIsolation)) {
            $this->inIsolation = $inIsolation;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }
    }

    /**
     * @return bool
     *
     * @since  Method available since Release 4.3.0
     */
    public function isInIsolation()
    {
        return $this->inIsolation;
    }

    /**
     * @return mixed
     *
     * @since  Method available since Release 3.4.0
     */
    public function getResult()
    {
        return $this->testResult;
    }

    /**
     * @param mixed $result
     *
     * @since  Method available since Release 3.4.0
     */
    public function setResult($result)
    {
        $this->testResult = $result;
    }

    /**
     * @param callable $callback
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since Method available since Release 3.6.0
     */
    public function setOutputCallback($callback)
    {
        if (!is_callable($callback)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'callback');
        }

        $this->outputCallback = $callback;
    }

    /**
     * @return PHPUnit_Framework_TestResult
     *
     * @since  Method available since Release 3.5.7
     */
    public function getTestResultObject()
    {
        return $this->result;
    }

    /**
     * @param PHPUnit_Framework_TestResult $result
     *
     * @since Method available since Release 3.6.0
     */
    public function setTestResultObject(PHPUnit_Framework_TestResult $result)
    {
        $this->result = $result;
    }

    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * This method is a wrapper for the ini_set() function that automatically
     * resets the modified php.ini setting to its original value after the
     * test is run.
     *
<<<<<<< HEAD
     * @throws Exception
     */
    protected function iniSet(string $varName, string $newValue): void
    {
=======
     * @param string $varName
     * @param string $newValue
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.0.0
     */
    protected function iniSet($varName, $newValue)
    {
        if (!is_string($varName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $currentValue = ini_set($varName, $newValue);

        if ($currentValue !== false) {
            $this->iniSettings[$varName] = $currentValue;
        } else {
<<<<<<< HEAD
            throw new Exception(
=======
            throw new PHPUnit_Framework_Exception(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                sprintf(
                    'INI setting "%s" could not be set to "%s".',
                    $varName,
                    $newValue
                )
            );
        }
    }

    /**
     * This method is a wrapper for the setlocale() function that automatically
     * resets the locale to its original value after the test is run.
     *
<<<<<<< HEAD
     * @throws Exception
     */
    protected function setLocale(...$args): void
    {
        if (count($args) < 2) {
            throw new Exception;
        }

        [$category, $locale] = $args;
=======
     * @param int    $category
     * @param string $locale
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.1.0
     */
    protected function setLocale()
    {
        $args = func_get_args();

        if (count($args) < 2) {
            throw new PHPUnit_Framework_Exception;
        }

        $category = $args[0];
        $locale   = $args[1];

        $categories = array(
            LC_ALL, LC_COLLATE, LC_CTYPE, LC_MONETARY, LC_NUMERIC, LC_TIME
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if (defined('LC_MESSAGES')) {
            $categories[] = LC_MESSAGES;
        }

<<<<<<< HEAD
        if (!in_array($category, self::LOCALE_CATEGORIES, true)) {
            throw new Exception;
        }

        if (!is_array($locale) && !is_string($locale)) {
            throw new Exception;
        }

        $this->locale[$category] = setlocale($category, 0);

        $result = setlocale(...$args);

        if ($result === false) {
            throw new Exception(
=======
        if (!in_array($category, $categories)) {
            throw new PHPUnit_Framework_Exception;
        }

        if (!is_array($locale) && !is_string($locale)) {
            throw new PHPUnit_Framework_Exception;
        }

        $this->locale[$category] = setlocale($category, null);

        $result = call_user_func_array('setlocale', $args);

        if ($result === false) {
            throw new PHPUnit_Framework_Exception(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                'The locale functionality is not implemented on your platform, ' .
                'the specified locale does not exist or the category name is ' .
                'invalid.'
            );
        }
    }

    /**
<<<<<<< HEAD
     * Makes configurable stub for the specified class.
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param    class-string<RealInstanceType> $originalClassName
     *
     * @psalm-return   Stub&RealInstanceType
     */
    protected function createStub(string $originalClassName): Stub
    {
        return $this->createMock($originalClassName);
    }

    /**
     * Returns a mock object for the specified class.
     *
     * @param string|string[] $originalClassName
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType>|string[] $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    protected function createMock($originalClassName): MockObject
    {
        if (!is_string($originalClassName)) {
            $this->addWarning('Passing an array of interface names to createMock() for creating a test double that implements multiple interfaces is deprecated and will no longer be supported in PHPUnit 9.');
        }

        return $this->getMockBuilder($originalClassName)
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->disableArgumentCloning()
                    ->disallowMockingUnknownTypes()
                    ->getMock();
    }

    /**
     * Returns a configured mock object for the specified class.
     *
     * @param string|string[] $originalClassName
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType>|string[] $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    protected function createConfiguredMock($originalClassName, array $configuration): MockObject
    {
        $o = $this->createMock($originalClassName);

        foreach ($configuration as $method => $return) {
            $o->method($method)->willReturn($return);
        }

        return $o;
    }

    /**
     * Returns a partial mock object for the specified class.
     *
     * @param string|string[] $originalClassName
     * @param string[]        $methods
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType>|string[] $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    protected function createPartialMock($originalClassName, array $methods): MockObject
    {
        if (!is_string($originalClassName)) {
            $this->addWarning('Passing an array of interface names to createPartialMock() for creating a test double that implements multiple interfaces is deprecated and will no longer be supported in PHPUnit 9.');
        }

        $class_names = is_array($originalClassName) ? $originalClassName : [$originalClassName];

        foreach ($class_names as $class_name) {
            $reflection = new ReflectionClass($class_name);

            $mockedMethodsThatDontExist = array_filter(
                $methods,
                static function (string $method) use ($reflection)
                {
                    return !$reflection->hasMethod($method);
                }
            );

            if ($mockedMethodsThatDontExist) {
                $this->addWarning(
                    sprintf(
                        'createPartialMock called with method(s) %s that do not exist in %s. This will not be allowed in future versions of PHPUnit.',
                        implode(', ', $mockedMethodsThatDontExist),
                        $class_name
                    )
                );
            }
        }

        return $this->getMockBuilder($originalClassName)
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->disableArgumentCloning()
                    ->disallowMockingUnknownTypes()
                    ->setMethods(empty($methods) ? null : $methods)
                    ->getMock();
    }

    /**
     * Returns a test proxy for the specified class.
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType> $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    protected function createTestProxy(string $originalClassName, array $constructorArguments = []): MockObject
    {
        return $this->getMockBuilder($originalClassName)
                    ->setConstructorArgs($constructorArguments)
                    ->enableProxyingToOriginalMethods()
                    ->getMock();
=======
     * Returns a mock object for the specified class.
     *
     * @param string     $originalClassName       Name of the class to mock.
     * @param array|null $methods                 When provided, only methods whose names are in the array
     *                                            are replaced with a configurable test double. The behavior
     *                                            of the other methods is not changed.
     *                                            Providing null means that no methods will be replaced.
     * @param array      $arguments               Parameters to pass to the original class' constructor.
     * @param string     $mockClassName           Class name for the generated test double class.
     * @param bool       $callOriginalConstructor Can be used to disable the call to the original class' constructor.
     * @param bool       $callOriginalClone       Can be used to disable the call to the original class' clone constructor.
     * @param bool       $callAutoload            Can be used to disable __autoload() during the generation of the test double class.
     * @param bool       $cloneArguments
     * @param bool       $callOriginalMethods
     * @param object     $proxyTarget
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.0.0
     */
    public function getMock($originalClassName, $methods = array(), array $arguments = array(), $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $cloneArguments = false, $callOriginalMethods = false, $proxyTarget = null)
    {
        $mockObject = $this->getMockObjectGenerator()->getMock(
            $originalClassName,
            $methods,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $cloneArguments,
            $callOriginalMethods,
            $proxyTarget
        );

        $this->mockObjects[] = $mockObject;

        return $mockObject;
    }

    /**
     * Returns a builder object to create mock objects using a fluent interface.
     *
     * @param string $className
     *
     * @return PHPUnit_Framework_MockObject_MockBuilder
     *
     * @since  Method available since Release 3.5.0
     */
    public function getMockBuilder($className)
    {
        return new PHPUnit_Framework_MockObject_MockBuilder($this, $className);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Mocks the specified class and returns the name of the mocked class.
     *
     * @param string $originalClassName
     * @param array  $methods
<<<<<<< HEAD
=======
     * @param array  $arguments
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param bool   $cloneArguments
     *
<<<<<<< HEAD
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType>|string $originalClassName
     *
     * @psalm-return class-string<MockObject&RealInstanceType>
     */
    protected function getMockClass($originalClassName, $methods = [], array $arguments = [], $mockClassName = '', $callOriginalConstructor = false, $callOriginalClone = true, $callAutoload = true, $cloneArguments = false): string
    {
        $this->recordDoubledType($originalClassName);

        $mock = $this->getMockObjectGenerator()->getMock(
=======
     * @return string
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.5.0
     */
    protected function getMockClass($originalClassName, $methods = array(), array $arguments = array(), $mockClassName = '', $callOriginalConstructor = false, $callOriginalClone = true, $callAutoload = true, $cloneArguments = false)
    {
        $mock = $this->getMock(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $originalClassName,
            $methods,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $cloneArguments
        );

        return get_class($mock);
    }

    /**
     * Returns a mock object for the specified abstract class with all abstract
     * methods of the class mocked. Concrete methods are not mocked by default.
     * To mock concrete methods, use the 7th parameter ($mockedMethods).
     *
     * @param string $originalClassName
<<<<<<< HEAD
=======
     * @param array  $arguments
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param array  $mockedMethods
     * @param bool   $cloneArguments
     *
<<<<<<< HEAD
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType> $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    protected function getMockForAbstractClass($originalClassName, array $arguments = [], $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = [], $cloneArguments = false): MockObject
    {
        $this->recordDoubledType($originalClassName);

=======
     * @return PHPUnit_Framework_MockObject_MockObject
     *
     * @since  Method available since Release 3.4.0
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function getMockForAbstractClass($originalClassName, array $arguments = array(), $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = array(), $cloneArguments = false)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $mockObject = $this->getMockObjectGenerator()->getMockForAbstractClass(
            $originalClassName,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $mockedMethods,
            $cloneArguments
        );

<<<<<<< HEAD
        $this->registerMockObject($mockObject);
=======
        $this->mockObjects[] = $mockObject;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $mockObject;
    }

    /**
     * Returns a mock object based on the given WSDL file.
     *
     * @param string $wsdlFile
     * @param string $originalClassName
     * @param string $mockClassName
<<<<<<< HEAD
     * @param bool   $callOriginalConstructor
     * @param array  $options                 An array of options passed to SOAPClient::_construct
     *
     * @psalm-template RealInstanceType of object
     *
     * @psalm-param class-string<RealInstanceType>|string $originalClassName
     *
     * @psalm-return MockObject&RealInstanceType
     */
    protected function getMockFromWsdl($wsdlFile, $originalClassName = '', $mockClassName = '', array $methods = [], $callOriginalConstructor = true, array $options = []): MockObject
    {
        $this->recordDoubledType('SoapClient');

        if ($originalClassName === '') {
            $fileName          = pathinfo(basename(parse_url($wsdlFile, PHP_URL_PATH)), PATHINFO_FILENAME);
            $originalClassName = preg_replace('/\W/', '', $fileName);
=======
     * @param array  $methods
     * @param bool   $callOriginalConstructor
     * @param array  $options                 An array of options passed to SOAPClient::_construct
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     *
     * @since  Method available since Release 3.4.0
     */
    protected function getMockFromWsdl($wsdlFile, $originalClassName = '', $mockClassName = '', array $methods = array(), $callOriginalConstructor = true, array $options = array())
    {
        if ($originalClassName === '') {
            $originalClassName = str_replace('.wsdl', '', basename($wsdlFile));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if (!class_exists($originalClassName)) {
            eval(
<<<<<<< HEAD
                $this->getMockObjectGenerator()->generateClassFromWsdl(
                    $wsdlFile,
                    $originalClassName,
                    $methods,
                    $options
                )
            );
        }

        $mockObject = $this->getMockObjectGenerator()->getMock(
            $originalClassName,
            $methods,
            ['', $options],
=======
            $this->getMockObjectGenerator()->generateClassFromWsdl(
                $wsdlFile,
                $originalClassName,
                $methods,
                $options
            )
            );
        }

        return $this->getMock(
            $originalClassName,
            $methods,
            array('', $options),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $mockClassName,
            $callOriginalConstructor,
            false,
            false
        );
<<<<<<< HEAD

        $this->registerMockObject($mockObject);

        return $mockObject;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns a mock object for the specified trait with all abstract methods
     * of the trait mocked. Concrete methods to mock can be specified with the
     * `$mockedMethods` parameter.
     *
     * @param string $traitName
<<<<<<< HEAD
=======
     * @param array  $arguments
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param array  $mockedMethods
     * @param bool   $cloneArguments
<<<<<<< HEAD
     */
    protected function getMockForTrait($traitName, array $arguments = [], $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = [], $cloneArguments = false): MockObject
    {
        $this->recordDoubledType($traitName);

=======
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     *
     * @since  Method available since Release 4.0.0
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function getMockForTrait($traitName, array $arguments = array(), $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = array(), $cloneArguments = false)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $mockObject = $this->getMockObjectGenerator()->getMockForTrait(
            $traitName,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $mockedMethods,
            $cloneArguments
        );

<<<<<<< HEAD
        $this->registerMockObject($mockObject);
=======
        $this->mockObjects[] = $mockObject;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $mockObject;
    }

    /**
     * Returns an object for the specified trait.
     *
     * @param string $traitName
<<<<<<< HEAD
=======
     * @param array  $arguments
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param string $traitClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
<<<<<<< HEAD
     *
     * @return object
     */
    protected function getObjectForTrait($traitName, array $arguments = [], $traitClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true)/*: object*/
    {
        $this->recordDoubledType($traitName);

        return $this->getMockObjectGenerator()->getObjectForTrait(
            $traitName,
            $traitClassName,
            $callAutoload,
            $callOriginalConstructor,
            $arguments
=======
     * @param bool   $cloneArguments
     *
     * @return object
     *
     * @since  Method available since Release 3.6.0
     *
     * @throws PHPUnit_Framework_Exception
     */
    protected function getObjectForTrait($traitName, array $arguments = array(), $traitClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $cloneArguments = false)
    {
        return $this->getMockObjectGenerator()->getObjectForTrait(
            $traitName,
            $arguments,
            $traitClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $cloneArguments
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );
    }

    /**
<<<<<<< HEAD
     * @param null|string $classOrInterface
     *
     * @throws \Prophecy\Exception\Doubler\ClassNotFoundException
     * @throws \Prophecy\Exception\Doubler\DoubleException
     * @throws \Prophecy\Exception\Doubler\InterfaceNotFoundException
     *
     * @psalm-param class-string|null $classOrInterface
     */
    protected function prophesize($classOrInterface = null): ObjectProphecy
    {
        if (!class_exists(Prophet::class)) {
            throw new Exception('This test uses TestCase::prophesize(), but phpspec/prophecy is not installed. Please run "composer require --dev phpspec/prophecy".');
        }

        if (is_string($classOrInterface)) {
            $this->recordDoubledType($classOrInterface);
        }

=======
     * @param string|null $classOrInterface
     *
     * @return \Prophecy\Prophecy\ObjectProphecy
     *
     * @throws \LogicException
     *
     * @since  Method available since Release 4.5.0
     */
    protected function prophesize($classOrInterface = null)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this->getProphet()->prophesize($classOrInterface);
    }

    /**
<<<<<<< HEAD
     * Creates a default TestResult object.
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    protected function createResult(): TestResult
    {
        return new TestResult;
    }

    /**
     * This method is called when a test method did not execute successfully.
     *
     * @throws Throwable
     */
    protected function onNotSuccessfulTest(Throwable $t): void
    {
        throw $t;
    }

    private function setExpectedExceptionFromAnnotation(): void
    {
        if ($this->name === null) {
            return;
        }

        try {
            $expectedException = TestUtil::getExpectedException(
                static::class,
                $this->name
            );

            if ($expectedException !== false) {
                $this->addWarning('The @expectedException, @expectedExceptionCode, @expectedExceptionMessage, and @expectedExceptionMessageRegExp annotations are deprecated. They will be removed in PHPUnit 9. Refactor your test to use expectException(), expectExceptionCode(), expectExceptionMessage(), or expectExceptionMessageMatches() instead.');

                $this->expectException($expectedException['class']);

                if ($expectedException['code'] !== null) {
                    $this->expectExceptionCode($expectedException['code']);
                }

                if ($expectedException['message'] !== '') {
                    $this->expectExceptionMessage($expectedException['message']);
                } elseif ($expectedException['message_regex'] !== '') {
                    $this->expectExceptionMessageMatches($expectedException['message_regex']);
                }
            }
        } catch (UtilException $e) {
        }
    }

    /**
     * @throws SkippedTestError
     * @throws SyntheticSkippedError
     * @throws Warning
     */
    private function checkRequirements(): void
    {
        if (!$this->name || !method_exists($this, $this->name)) {
            return;
        }

        $missingRequirements = TestUtil::getMissingRequirements(
            static::class,
            $this->name
        );

        if (!empty($missingRequirements)) {
            $this->markTestSkipped(implode(PHP_EOL, $missingRequirements));
        }
    }

    /**
     * @throws Throwable
     */
    private function verifyMockObjects(): void
    {
        foreach ($this->mockObjects as $mockObject) {
            if ($mockObject->__phpunit_hasMatchers()) {
                $this->numAssertions++;
            }

            $mockObject->__phpunit_verify(
                $this->shouldInvocationMockerBeReset($mockObject)
            );
        }

        if ($this->prophet !== null) {
            try {
                $this->prophet->checkPredictions();
            } finally {
                foreach ($this->prophet->getProphecies() as $objectProphecy) {
                    foreach ($objectProphecy->getMethodProphecies() as $methodProphecies) {
                        foreach ($methodProphecies as $methodProphecy) {
                            assert($methodProphecy instanceof MethodProphecy);

                            $this->numAssertions += count($methodProphecy->getCheckedPredictions());
                        }
                    }
                }
            }
        }
    }

    private function handleDependencies(): bool
    {
        if (!empty($this->dependencies) && !$this->inIsolation) {
            $passed     = $this->result->passed();
            $passedKeys = array_keys($passed);

            foreach ($passedKeys as $key => $value) {
                $pos = strpos($value, ' with data set');

                if ($pos !== false) {
                    $passedKeys[$key] = substr($value, 0, $pos);
=======
     * Adds a value to the assertion counter.
     *
     * @param int $count
     *
     * @since Method available since Release 3.3.3
     */
    public function addToAssertionCount($count)
    {
        $this->numAssertions += $count;
    }

    /**
     * Returns the number of assertions performed by this test.
     *
     * @return int
     *
     * @since  Method available since Release 3.3.0
     */
    public function getNumAssertions()
    {
        return $this->numAssertions;
    }

    /**
     * Returns a matcher that matches when the method is executed
     * zero or more times.
     *
     * @return PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount
     *
     * @since  Method available since Release 3.0.0
     */
    public static function any()
    {
        return new PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount;
    }

    /**
     * Returns a matcher that matches when the method is never executed.
     *
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
     *
     * @since  Method available since Release 3.0.0
     */
    public static function never()
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedCount(0);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at least N times.
     *
     * @param int $requiredInvocations
     *
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastCount
     *
     * @since  Method available since Release 4.2.0
     */
    public static function atLeast($requiredInvocations)
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastCount(
            $requiredInvocations
        );
    }

    /**
     * Returns a matcher that matches when the method is executed at least once.
     *
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastOnce
     *
     * @since  Method available since Release 3.0.0
     */
    public static function atLeastOnce()
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastOnce;
    }

    /**
     * Returns a matcher that matches when the method is executed exactly once.
     *
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
     *
     * @since  Method available since Release 3.0.0
     */
    public static function once()
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedCount(1);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * exactly $count times.
     *
     * @param int $count
     *
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
     *
     * @since  Method available since Release 3.0.0
     */
    public static function exactly($count)
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedCount($count);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at most N times.
     *
     * @param int $allowedInvocations
     *
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedAtMostCount
     *
     * @since  Method available since Release 4.2.0
     */
    public static function atMost($allowedInvocations)
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedAtMostCount(
            $allowedInvocations
        );
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at the given index.
     *
     * @param int $index
     *
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedAtIndex
     *
     * @since  Method available since Release 3.0.0
     */
    public static function at($index)
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedAtIndex($index);
    }

    /**
     * @param mixed $value
     *
     * @return PHPUnit_Framework_MockObject_Stub_Return
     *
     * @since  Method available since Release 3.0.0
     */
    public static function returnValue($value)
    {
        return new PHPUnit_Framework_MockObject_Stub_Return($value);
    }

    /**
     * @param array $valueMap
     *
     * @return PHPUnit_Framework_MockObject_Stub_ReturnValueMap
     *
     * @since  Method available since Release 3.6.0
     */
    public static function returnValueMap(array $valueMap)
    {
        return new PHPUnit_Framework_MockObject_Stub_ReturnValueMap($valueMap);
    }

    /**
     * @param int $argumentIndex
     *
     * @return PHPUnit_Framework_MockObject_Stub_ReturnArgument
     *
     * @since  Method available since Release 3.3.0
     */
    public static function returnArgument($argumentIndex)
    {
        return new PHPUnit_Framework_MockObject_Stub_ReturnArgument(
            $argumentIndex
        );
    }

    /**
     * @param mixed $callback
     *
     * @return PHPUnit_Framework_MockObject_Stub_ReturnCallback
     *
     * @since  Method available since Release 3.3.0
     */
    public static function returnCallback($callback)
    {
        return new PHPUnit_Framework_MockObject_Stub_ReturnCallback($callback);
    }

    /**
     * Returns the current object.
     *
     * This method is useful when mocking a fluent interface.
     *
     * @return PHPUnit_Framework_MockObject_Stub_ReturnSelf
     *
     * @since  Method available since Release 3.6.0
     */
    public static function returnSelf()
    {
        return new PHPUnit_Framework_MockObject_Stub_ReturnSelf();
    }

    /**
     * @param Exception $exception
     *
     * @return PHPUnit_Framework_MockObject_Stub_Exception
     *
     * @since  Method available since Release 3.1.0
     */
    public static function throwException(Exception $exception)
    {
        return new PHPUnit_Framework_MockObject_Stub_Exception($exception);
    }

    /**
     * @param mixed $value, ...
     *
     * @return PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls
     *
     * @since  Method available since Release 3.0.0
     */
    public static function onConsecutiveCalls()
    {
        $args = func_get_args();

        return new PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls($args);
    }

    /**
     * Gets the data set description of a TestCase.
     *
     * @param bool $includeData
     *
     * @return string
     *
     * @since  Method available since Release 3.3.0
     */
    protected function getDataSetAsString($includeData = true)
    {
        $buffer = '';

        if (!empty($this->data)) {
            if (is_int($this->dataName)) {
                $buffer .= sprintf(' with data set #%d', $this->dataName);
            } else {
                $buffer .= sprintf(' with data set "%s"', $this->dataName);
            }

            $exporter = new Exporter;

            if ($includeData) {
                $buffer .= sprintf(' (%s)', $exporter->shortenedRecursiveExport($this->data));
            }
        }

        return $buffer;
    }

    /**
     * Creates a default TestResult object.
     *
     * @return PHPUnit_Framework_TestResult
     */
    protected function createResult()
    {
        return new PHPUnit_Framework_TestResult;
    }

    /**
     * @since Method available since Release 3.5.4
     */
    protected function handleDependencies()
    {
        if (!empty($this->dependencies) && !$this->inIsolation) {
            $className  = get_class($this);
            $passed     = $this->result->passed();
            $passedKeys = array_keys($passed);
            $numKeys    = count($passedKeys);

            for ($i = 0; $i < $numKeys; $i++) {
                $pos = strpos($passedKeys[$i], ' with data set');

                if ($pos !== false) {
                    $passedKeys[$i] = substr($passedKeys[$i], 0, $pos);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                }
            }

            $passedKeys = array_flip(array_unique($passedKeys));

            foreach ($this->dependencies as $dependency) {
<<<<<<< HEAD
                $deepClone    = false;
                $shallowClone = false;

                if (empty($dependency)) {
                    $this->markSkippedForNotSpecifyingDependency();

                    return false;
                }

                if (strpos($dependency, 'clone ') === 0) {
                    $deepClone  = true;
                    $dependency = substr($dependency, strlen('clone '));
                } elseif (strpos($dependency, '!clone ') === 0) {
                    $deepClone  = false;
                    $dependency = substr($dependency, strlen('!clone '));
                }

                if (strpos($dependency, 'shallowClone ') === 0) {
                    $shallowClone = true;
                    $dependency   = substr($dependency, strlen('shallowClone '));
                } elseif (strpos($dependency, '!shallowClone ') === 0) {
                    $shallowClone = false;
                    $dependency   = substr($dependency, strlen('!shallowClone '));
                }

                if (strpos($dependency, '::') === false) {
                    $dependency = static::class . '::' . $dependency;
                }

                if (!isset($passedKeys[$dependency])) {
                    if (!$this->isCallableTestMethod($dependency)) {
                        $this->warnAboutDependencyThatDoesNotExist($dependency);
                    } else {
                        $this->markSkippedForMissingDependency($dependency);
                    }
=======
                if (strpos($dependency, '::') === false) {
                    $dependency = $className . '::' . $dependency;
                }

                if (!isset($passedKeys[$dependency])) {
                    $this->result->addError(
                        $this,
                        new PHPUnit_Framework_SkippedTestError(
                            sprintf(
                                'This test depends on "%s" to pass.',
                                $dependency
                            )
                        ),
                        0
                    );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

                    return false;
                }

                if (isset($passed[$dependency])) {
<<<<<<< HEAD
                    if ($passed[$dependency]['size'] !== TestUtil::UNKNOWN &&
                        $this->getSize() !== TestUtil::UNKNOWN &&
                        $passed[$dependency]['size'] > $this->getSize()) {
                        $this->result->addError(
                            $this,
                            new SkippedTestError(
=======
                    if ($passed[$dependency]['size'] != PHPUnit_Util_Test::UNKNOWN &&
                        $this->getSize() != PHPUnit_Util_Test::UNKNOWN &&
                        $passed[$dependency]['size'] > $this->getSize()) {
                        $this->result->addError(
                            $this,
                            new PHPUnit_Framework_SkippedTestError(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                                'This test depends on a test that is larger than itself.'
                            ),
                            0
                        );

                        return false;
                    }

<<<<<<< HEAD
                    if ($deepClone) {
                        $deepCopy = new DeepCopy;
                        $deepCopy->skipUncloneable(false);

                        $this->dependencyInput[$dependency] = $deepCopy->copy($passed[$dependency]['result']);
                    } elseif ($shallowClone) {
                        $this->dependencyInput[$dependency] = clone $passed[$dependency]['result'];
                    } else {
                        $this->dependencyInput[$dependency] = $passed[$dependency]['result'];
                    }
=======
                    $this->dependencyInput[$dependency] = $passed[$dependency]['result'];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                } else {
                    $this->dependencyInput[$dependency] = null;
                }
            }
        }

        return true;
    }

<<<<<<< HEAD
    private function markSkippedForNotSpecifyingDependency(): void
    {
        $this->status = BaseTestRunner::STATUS_SKIPPED;

        $this->result->startTest($this);

        $this->result->addError(
            $this,
            new SkippedTestError(
                'This method has an invalid @depends annotation.'
            ),
            0
        );

        $this->result->endTest($this, 0);
    }

    private function markSkippedForMissingDependency(string $dependency): void
    {
        $this->status = BaseTestRunner::STATUS_SKIPPED;

        $this->result->startTest($this);

        $this->result->addError(
            $this,
            new SkippedTestError(
                sprintf(
                    'This test depends on "%s" to pass.',
                    $dependency
                )
            ),
            0
        );

        $this->result->endTest($this, 0);
    }

    private function warnAboutDependencyThatDoesNotExist(string $dependency): void
    {
        $this->status = BaseTestRunner::STATUS_WARNING;

        $this->result->startTest($this);

        $this->result->addWarning(
            $this,
            new Warning(
                sprintf(
                    'This test depends on "%s" which does not exist.',
                    $dependency
                )
            ),
            0
        );

        $this->result->endTest($this, 0);
=======
    /**
     * This method is called before the first test of this test class is run.
     *
     * @since Method available since Release 3.4.0
     */
    public static function setUpBeforeClass()
    {
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called before the execution of a test starts
     * and after setUp() is called.
     *
     * @since  Method available since Release 3.2.8
     */
    protected function assertPreConditions()
    {
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called before the execution of a test ends
     * and before tearDown() is called.
     *
     * @since  Method available since Release 3.2.8
     */
    protected function assertPostConditions()
    {
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * This method is called after the last test of this test class is run.
     *
     * @since Method available since Release 3.4.0
     */
    public static function tearDownAfterClass()
    {
    }

    /**
     * This method is called when a test method did not execute successfully.
     *
     * @param Exception $e
     *
     * @since Method available since Release 3.4.0
     *
     * @throws Exception
     */
    protected function onNotSuccessfulTest(Exception $e)
    {
        throw $e;
    }

    /**
     * Performs custom preparations on the process isolation template.
     *
     * @param Text_Template $template
     *
     * @since Method available since Release 3.4.0
     */
    protected function prepareTemplate(Text_Template $template)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Get the mock object generator, creating it if it doesn't exist.
<<<<<<< HEAD
     */
    private function getMockObjectGenerator(): MockGenerator
    {
        if ($this->mockObjectGenerator === null) {
            $this->mockObjectGenerator = new MockGenerator;
=======
     *
     * @return PHPUnit_Framework_MockObject_Generator
     */
    protected function getMockObjectGenerator()
    {
        if (null === $this->mockObjectGenerator) {
            $this->mockObjectGenerator = new PHPUnit_Framework_MockObject_Generator;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $this->mockObjectGenerator;
    }

<<<<<<< HEAD
    private function startOutputBuffering(): void
    {
=======
    /**
     * @since Method available since Release 4.2.0
     */
    private function startOutputBuffering()
    {
        while (!defined('PHPUNIT_TESTSUITE') && ob_get_level() > 0) {
            ob_end_clean();
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        ob_start();

        $this->outputBufferingActive = true;
        $this->outputBufferingLevel  = ob_get_level();
    }

    /**
<<<<<<< HEAD
     * @throws RiskyTestError
     */
    private function stopOutputBuffering(): void
    {
        if (ob_get_level() !== $this->outputBufferingLevel) {
            while (ob_get_level() >= $this->outputBufferingLevel) {
                ob_end_clean();
            }

            throw new RiskyTestError(
=======
     * @since Method available since Release 4.2.0
     */
    private function stopOutputBuffering()
    {
        if (ob_get_level() != $this->outputBufferingLevel) {
            while (ob_get_level() > 0) {
                ob_end_clean();
            }

            throw new PHPUnit_Framework_RiskyTestError(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                'Test code or tested code did not (only) close its own output buffers'
            );
        }

<<<<<<< HEAD
        $this->output = ob_get_contents();

        if ($this->outputCallback !== false) {
            $this->output = (string) call_user_func($this->outputCallback, $this->output);
=======
        $output = ob_get_contents();

        if ($this->outputCallback === false) {
            $this->output = $output;
        } else {
            $this->output = call_user_func_array(
                $this->outputCallback,
                array($output)
            );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        ob_end_clean();

        $this->outputBufferingActive = false;
        $this->outputBufferingLevel  = ob_get_level();
    }

<<<<<<< HEAD
    private function snapshotGlobalState(): void
    {
        if ($this->runTestInSeparateProcess || $this->inIsolation ||
            (!$this->backupGlobals && !$this->backupStaticAttributes)) {
            return;
        }

        $this->snapshot = $this->createGlobalStateSnapshot($this->backupGlobals === true);
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws RiskyTestError
     */
    private function restoreGlobalState(): void
=======
    private function snapshotGlobalState()
    {
        $backupGlobals = $this->backupGlobals === null || $this->backupGlobals === true;

        if ($this->runTestInSeparateProcess || $this->inIsolation ||
            (!$backupGlobals && !$this->backupStaticAttributes)) {
            return;
        }

        $this->snapshot = $this->createGlobalStateSnapshot($backupGlobals);
    }

    private function restoreGlobalState()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->snapshot instanceof Snapshot) {
            return;
        }

<<<<<<< HEAD
        if ($this->beStrictAboutChangesToGlobalState) {
            try {
                $this->compareGlobalStateSnapshots(
                    $this->snapshot,
                    $this->createGlobalStateSnapshot($this->backupGlobals === true)
                );
            } catch (RiskyTestError $rte) {
=======
        $backupGlobals = $this->backupGlobals === null || $this->backupGlobals === true;

        if ($this->disallowChangesToGlobalState) {
            try {
                $this->compareGlobalStateSnapshots(
                    $this->snapshot,
                    $this->createGlobalStateSnapshot($backupGlobals)
                );
            } catch (PHPUnit_Framework_RiskyTestError $rte) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                // Intentionally left empty
            }
        }

        $restorer = new Restorer;

<<<<<<< HEAD
        if ($this->backupGlobals) {
=======
        if ($backupGlobals) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $restorer->restoreGlobalVariables($this->snapshot);
        }

        if ($this->backupStaticAttributes) {
            $restorer->restoreStaticAttributes($this->snapshot);
        }

        $this->snapshot = null;

        if (isset($rte)) {
            throw $rte;
        }
    }

<<<<<<< HEAD
    private function createGlobalStateSnapshot(bool $backupGlobals): Snapshot
=======
    /**
     * @param bool $backupGlobals
     *
     * @return Snapshot
     */
    private function createGlobalStateSnapshot($backupGlobals)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $blacklist = new Blacklist;

        foreach ($this->backupGlobalsBlacklist as $globalVariable) {
            $blacklist->addGlobalVariable($globalVariable);
        }

        if (!defined('PHPUNIT_TESTSUITE')) {
            $blacklist->addClassNamePrefix('PHPUnit');
<<<<<<< HEAD
            $blacklist->addClassNamePrefix('SebastianBergmann\CodeCoverage');
            $blacklist->addClassNamePrefix('SebastianBergmann\FileIterator');
            $blacklist->addClassNamePrefix('SebastianBergmann\Invoker');
            $blacklist->addClassNamePrefix('SebastianBergmann\Timer');
            $blacklist->addClassNamePrefix('PHP_Token');
            $blacklist->addClassNamePrefix('Text_Template');
            $blacklist->addClassNamePrefix('Doctrine\Instantiator');
            $blacklist->addClassNamePrefix('Prophecy');
            $blacklist->addStaticAttribute(ComparatorFactory::class, 'instance');
=======
            $blacklist->addClassNamePrefix('File_Iterator');
            $blacklist->addClassNamePrefix('PHP_CodeCoverage');
            $blacklist->addClassNamePrefix('PHP_Invoker');
            $blacklist->addClassNamePrefix('PHP_Timer');
            $blacklist->addClassNamePrefix('PHP_Token');
            $blacklist->addClassNamePrefix('Symfony');
            $blacklist->addClassNamePrefix('Text_Template');
            $blacklist->addClassNamePrefix('Doctrine\Instantiator');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            foreach ($this->backupStaticAttributesBlacklist as $class => $attributes) {
                foreach ($attributes as $attribute) {
                    $blacklist->addStaticAttribute($class, $attribute);
                }
            }
        }

        return new Snapshot(
            $blacklist,
            $backupGlobals,
<<<<<<< HEAD
            (bool) $this->backupStaticAttributes,
=======
            $this->backupStaticAttributes,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            false,
            false,
            false,
            false,
            false,
            false,
            false
        );
    }

    /**
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws RiskyTestError
     */
    private function compareGlobalStateSnapshots(Snapshot $before, Snapshot $after): void
    {
        $backupGlobals = $this->backupGlobals === null || $this->backupGlobals;
=======
     * @param Snapshot $before
     * @param Snapshot $after
     *
     * @throws PHPUnit_Framework_RiskyTestError
     */
    private function compareGlobalStateSnapshots(Snapshot $before, Snapshot $after)
    {
        $backupGlobals = $this->backupGlobals === null || $this->backupGlobals === true;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if ($backupGlobals) {
            $this->compareGlobalStateSnapshotPart(
                $before->globalVariables(),
                $after->globalVariables(),
                "--- Global variables before the test\n+++ Global variables after the test\n"
            );

            $this->compareGlobalStateSnapshotPart(
                $before->superGlobalVariables(),
                $after->superGlobalVariables(),
                "--- Super-global variables before the test\n+++ Super-global variables after the test\n"
            );
        }

        if ($this->backupStaticAttributes) {
            $this->compareGlobalStateSnapshotPart(
                $before->staticAttributes(),
                $after->staticAttributes(),
                "--- Static attributes before the test\n+++ Static attributes after the test\n"
            );
        }
    }

    /**
<<<<<<< HEAD
     * @throws RiskyTestError
     */
    private function compareGlobalStateSnapshotPart(array $before, array $after, string $header): void
=======
     * @param array  $before
     * @param array  $after
     * @param string $header
     *
     * @throws PHPUnit_Framework_RiskyTestError
     */
    private function compareGlobalStateSnapshotPart(array $before, array $after, $header)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($before != $after) {
            $differ   = new Differ($header);
            $exporter = new Exporter;

            $diff = $differ->diff(
                $exporter->export($before),
                $exporter->export($after)
            );

<<<<<<< HEAD
            throw new RiskyTestError(
=======
            throw new PHPUnit_Framework_RiskyTestError(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $diff
            );
        }
    }

<<<<<<< HEAD
    private function getProphet(): Prophet
=======
    /**
     * @return Prophecy\Prophet
     *
     * @since Method available since Release 4.5.0
     */
    private function getProphet()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($this->prophet === null) {
            $this->prophet = new Prophet;
        }

        return $this->prophet;
    }
<<<<<<< HEAD

    /**
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     */
    private function shouldInvocationMockerBeReset(MockObject $mock): bool
    {
        $enumerator = new Enumerator;

        foreach ($enumerator->enumerate($this->dependencyInput) as $object) {
            if ($mock === $object) {
                return false;
            }
        }

        if (!is_array($this->testResult) && !is_object($this->testResult)) {
            return true;
        }

        return !in_array($mock, $enumerator->enumerate($this->testResult), true);
    }

    /**
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     * @throws \SebastianBergmann\ObjectReflector\InvalidArgumentException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    private function registerMockObjectsFromTestArguments(array $testArguments, array &$visited = []): void
    {
        if ($this->registerMockObjectsFromTestArgumentsRecursively) {
            foreach ((new Enumerator)->enumerate($testArguments) as $object) {
                if ($object instanceof MockObject) {
                    $this->registerMockObject($object);
                }
            }
        } else {
            foreach ($testArguments as $testArgument) {
                if ($testArgument instanceof MockObject) {
                    if (Type::isCloneable($testArgument)) {
                        $testArgument = clone $testArgument;
                    }

                    $this->registerMockObject($testArgument);
                } elseif (is_array($testArgument) && !in_array($testArgument, $visited, true)) {
                    $visited[] = $testArgument;

                    $this->registerMockObjectsFromTestArguments(
                        $testArgument,
                        $visited
                    );
                }
            }
        }
    }

    private function setDoesNotPerformAssertionsFromAnnotation(): void
    {
        $annotations = $this->getAnnotations();

        if (isset($annotations['method']['doesNotPerformAssertions'])) {
            $this->doesNotPerformAssertions = true;
        }
    }

    private function unregisterCustomComparators(): void
    {
        $factory = ComparatorFactory::getInstance();

        foreach ($this->customComparators as $comparator) {
            $factory->unregister($comparator);
        }

        $this->customComparators = [];
    }

    private function cleanupIniSettings(): void
    {
        foreach ($this->iniSettings as $varName => $oldValue) {
            ini_set($varName, $oldValue);
        }

        $this->iniSettings = [];
    }

    private function cleanupLocaleSettings(): void
    {
        foreach ($this->locale as $category => $locale) {
            setlocale($category, $locale);
        }

        $this->locale = [];
    }

    /**
     * @throws Exception
     */
    private function checkExceptionExpectations(Throwable $throwable): bool
    {
        $result = false;

        if ($this->expectedException !== null || $this->expectedExceptionCode !== null || $this->expectedExceptionMessage !== null || $this->expectedExceptionMessageRegExp !== null) {
            $result = true;
        }

        if ($throwable instanceof Exception) {
            $result = false;
        }

        if (is_string($this->expectedException)) {
            try {
                $reflector = new ReflectionClass($this->expectedException);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
                    $e
                );
            }
            // @codeCoverageIgnoreEnd

            if ($this->expectedException === 'PHPUnit\Framework\Exception' ||
                $this->expectedException === '\PHPUnit\Framework\Exception' ||
                $reflector->isSubclassOf(Exception::class)) {
                $result = true;
            }
        }

        return $result;
    }

    private function runInSeparateProcess(): bool
    {
        return ($this->runTestInSeparateProcess || $this->runClassInSeparateProcess) &&
            !$this->inIsolation && !$this instanceof PhptTestCase;
    }

    /**
     * @param string|string[] $originalClassName
     */
    private function recordDoubledType($originalClassName): void
    {
        if (is_string($originalClassName)) {
            $this->doubledTypes[] = $originalClassName;
        }

        if (is_array($originalClassName)) {
            foreach ($originalClassName as $_originalClassName) {
                if (is_string($_originalClassName)) {
                    $this->doubledTypes[] = $_originalClassName;
                }
            }
        }
    }

    private function isCallableTestMethod(string $dependency): bool
    {
        [$className, $methodName] = explode('::', $dependency);

        if (!class_exists($className)) {
            return false;
        }

        try {
            $class = new ReflectionClass($className);
        } catch (ReflectionException $e) {
            return false;
        }

        if (!$class->isSubclassOf(__CLASS__)) {
            return false;
        }

        if (!$class->hasMethod($methodName)) {
            return false;
        }

        try {
            $method = $class->getMethod($methodName);
        } catch (ReflectionException $e) {
            return false;
        }

        return TestUtil::isTestMethod($method);
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
