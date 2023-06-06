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
use function array_keys;
use function array_merge;
use function array_slice;
use function basename;
use function call_user_func;
use function class_exists;
use function count;
use function dirname;
use function file_exists;
use function get_declared_classes;
use function implode;
use function is_bool;
use function is_object;
use function is_string;
use function method_exists;
use function preg_match;
use function preg_quote;
use function sprintf;
use function substr;
use Iterator;
use IteratorAggregate;
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Runner\Filter\Factory;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\FileLoader;
use PHPUnit\Util\Reflection;
use PHPUnit\Util\Test as TestUtil;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use Throwable;

/**
 * @template-implements IteratorAggregate<int, Test>
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class TestSuite implements IteratorAggregate, SelfDescribing, Test
{
    /**
=======

/**
 * A TestSuite is a composite of Tests. It runs a collection of test cases.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Framework_TestSuite implements PHPUnit_Framework_Test, PHPUnit_Framework_SelfDescribing, IteratorAggregate
{
    /**
     * Last count of tests in this suite.
     *
     * @var int|null
     */
    private $cachedNumTests;

    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Enable or disable the backup and restoration of the $GLOBALS array.
     *
     * @var bool
     */
<<<<<<< HEAD
    protected $backupGlobals;
=======
    protected $backupGlobals = null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Enable or disable the backup and restoration of static attributes.
     *
     * @var bool
     */
<<<<<<< HEAD
    protected $backupStaticAttributes;
=======
    protected $backupStaticAttributes = null;

    /**
     * @var bool
     */
    private $disallowChangesToGlobalState = null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
    protected $runTestInSeparateProcess = false;

    /**
     * The name of the test suite.
     *
     * @var string
     */
    protected $name = '';

    /**
     * The test groups of the test suite.
     *
     * @var array
     */
<<<<<<< HEAD
    protected $groups = [];
=======
    protected $groups = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * The tests in the test suite.
     *
<<<<<<< HEAD
     * @var Test[]
     */
    protected $tests = [];
=======
     * @var array
     */
    protected $tests = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * The number of tests in the test suite.
     *
     * @var int
     */
    protected $numTests = -1;

    /**
     * @var bool
     */
    protected $testCase = false;

    /**
<<<<<<< HEAD
     * @var string[]
     */
    protected $foundClasses = [];

    /**
     * Last count of tests in this suite.
     *
     * @var null|int
     */
    private $cachedNumTests;

    /**
     * @var bool
     */
    private $beStrictAboutChangesToGlobalState;

    /**
     * @var Factory
     */
    private $iteratorFilter;

    /**
     * @var int
     */
    private $declaredClassesPointer;

    /**
     * Constructs a new TestSuite:.
     *
     *   - PHPUnit\Framework\TestSuite() constructs an empty TestSuite.
     *
     *   - PHPUnit\Framework\TestSuite(ReflectionClass) constructs a
     *     TestSuite from the given class.
     *
     *   - PHPUnit\Framework\TestSuite(ReflectionClass, String)
     *     constructs a TestSuite from the given class with the given
     *     name.
     *
     *   - PHPUnit\Framework\TestSuite(String) either constructs a
=======
     * @var array
     */
    protected $foundClasses = array();

    /**
     * @var PHPUnit_Runner_Filter_Factory
     */
    private $iteratorFilter = null;

    /**
     * Constructs a new TestSuite:
     *
     *   - PHPUnit_Framework_TestSuite() constructs an empty TestSuite.
     *
     *   - PHPUnit_Framework_TestSuite(ReflectionClass) constructs a
     *     TestSuite from the given class.
     *
     *   - PHPUnit_Framework_TestSuite(ReflectionClass, String)
     *     constructs a TestSuite from the given class with the given
     *     name.
     *
     *   - PHPUnit_Framework_TestSuite(String) either constructs a
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *     TestSuite from the given class (if the passed string is the
     *     name of an existing class) or constructs an empty TestSuite
     *     with the given name.
     *
<<<<<<< HEAD
     * @param ReflectionClass|string $theClass
     *
     * @throws Exception
     */
    public function __construct($theClass = '', string $name = '')
    {
        if (!is_string($theClass) && !$theClass instanceof ReflectionClass) {
            throw InvalidArgumentException::create(
                1,
                'ReflectionClass object or string'
            );
        }

        $this->declaredClassesPointer = count(get_declared_classes());

        if (!$theClass instanceof ReflectionClass) {
            if (class_exists($theClass, true)) {
                if ($name === '') {
                    $name = $theClass;
                }

                try {
                    $theClass = new ReflectionClass($theClass);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd
            } else {
                $this->setName($theClass);

                return;
            }
        }

        if (!$theClass->isSubclassOf(TestCase::class)) {
            $this->setName((string) $theClass);
=======
     * @param mixed  $theClass
     * @param string $name
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function __construct($theClass = '', $name = '')
    {
        $argumentsValid = false;

        if (is_object($theClass) &&
            $theClass instanceof ReflectionClass) {
            $argumentsValid = true;
        } elseif (is_string($theClass) &&
                 $theClass !== '' &&
                 class_exists($theClass, false)) {
            $argumentsValid = true;

            if ($name == '') {
                $name = $theClass;
            }

            $theClass = new ReflectionClass($theClass);
        } elseif (is_string($theClass)) {
            $this->setName($theClass);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            return;
        }

<<<<<<< HEAD
        if ($name !== '') {
=======
        if (!$argumentsValid) {
            throw new PHPUnit_Framework_Exception;
        }

        if (!$theClass->isSubclassOf('PHPUnit_Framework_TestCase')) {
            throw new PHPUnit_Framework_Exception(
                'Class "' . $theClass->name . '" does not extend PHPUnit_Framework_TestCase.'
            );
        }

        if ($name != '') {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->setName($name);
        } else {
            $this->setName($theClass->getName());
        }

        $constructor = $theClass->getConstructor();

        if ($constructor !== null &&
            !$constructor->isPublic()) {
            $this->addTest(
<<<<<<< HEAD
                new WarningTestCase(
=======
                self::warning(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    sprintf(
                        'Class "%s" has no public constructor.',
                        $theClass->getName()
                    )
                )
            );

            return;
        }

<<<<<<< HEAD
        foreach ((new Reflection)->publicMethodsInTestClass($theClass) as $method) {
            if (!TestUtil::isTestMethod($method)) {
                continue;
            }

=======
        foreach ($theClass->getMethods() as $method) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->addTestMethod($theClass, $method);
        }

        if (empty($this->tests)) {
            $this->addTest(
<<<<<<< HEAD
                new WarningTestCase(
=======
                self::warning(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    sprintf(
                        'No tests found in class "%s".',
                        $theClass->getName()
                    )
                )
            );
        }

        $this->testCase = true;
    }

    /**
     * Returns a string representation of the test suite.
<<<<<<< HEAD
     */
    public function toString(): string
=======
     *
     * @return string
     */
    public function toString()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->getName();
    }

    /**
     * Adds a test to the suite.
     *
<<<<<<< HEAD
     * @param array $groups
     */
    public function addTest(Test $test, $groups = []): void
    {
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
=======
     * @param PHPUnit_Framework_Test $test
     * @param array                  $groups
     */
    public function addTest(PHPUnit_Framework_Test $test, $groups = array())
    {
        $class = new ReflectionClass($test);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if (!$class->isAbstract()) {
            $this->tests[]  = $test;
            $this->numTests = -1;

<<<<<<< HEAD
            if ($test instanceof self && empty($groups)) {
=======
            if ($test instanceof self &&
                empty($groups)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $groups = $test->getGroups();
            }

            if (empty($groups)) {
<<<<<<< HEAD
                $groups = ['default'];
=======
                $groups = array('default');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }

            foreach ($groups as $group) {
                if (!isset($this->groups[$group])) {
<<<<<<< HEAD
                    $this->groups[$group] = [$test];
=======
                    $this->groups[$group] = array($test);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                } else {
                    $this->groups[$group][] = $test;
                }
            }
<<<<<<< HEAD

            if ($test instanceof TestCase) {
                $test->setGroups($groups);
            }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * Adds the tests from the given class to the suite.
     *
<<<<<<< HEAD
     * @param object|string $testClass
     *
     * @throws Exception
     */
    public function addTestSuite($testClass): void
    {
        if (!(is_object($testClass) || (is_string($testClass) && class_exists($testClass)))) {
            throw InvalidArgumentException::create(
                1,
                'class name or object'
            );
        }

        if (!is_object($testClass)) {
            try {
                $testClass = new ReflectionClass($testClass);
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
     * @param mixed $testClass
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function addTestSuite($testClass)
    {
        if (is_string($testClass) && class_exists($testClass)) {
            $testClass = new ReflectionClass($testClass);
        }

        if (!is_object($testClass)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'class name or object'
            );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if ($testClass instanceof self) {
            $this->addTest($testClass);
        } elseif ($testClass instanceof ReflectionClass) {
            $suiteMethod = false;

<<<<<<< HEAD
            if (!$testClass->isAbstract() && $testClass->hasMethod(BaseTestRunner::SUITE_METHODNAME)) {
                try {
                    $method = $testClass->getMethod(
                        BaseTestRunner::SUITE_METHODNAME
                    );
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd

                if ($method->isStatic()) {
                    $this->addTest(
                        $method->invoke(null, $testClass->getName())
                    );

                    $suiteMethod = true;
                }
            }

            if (!$suiteMethod && !$testClass->isAbstract() && $testClass->isSubclassOf(TestCase::class)) {
                $this->addTest(new self($testClass));
            }
        } else {
            throw new Exception;
=======
            if (!$testClass->isAbstract()) {
                if ($testClass->hasMethod(PHPUnit_Runner_BaseTestRunner::SUITE_METHODNAME)) {
                    $method = $testClass->getMethod(
                        PHPUnit_Runner_BaseTestRunner::SUITE_METHODNAME
                    );

                    if ($method->isStatic()) {
                        $this->addTest(
                            $method->invoke(null, $testClass->getName())
                        );

                        $suiteMethod = true;
                    }
                }
            }

            if (!$suiteMethod && !$testClass->isAbstract()) {
                $this->addTest(new self($testClass));
            }
        } else {
            throw new PHPUnit_Framework_Exception;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * Wraps both <code>addTest()</code> and <code>addTestSuite</code>
     * as well as the separate import statements for the user's convenience.
     *
     * If the named file cannot be read or there are no new tests that can be
<<<<<<< HEAD
     * added, a <code>PHPUnit\Framework\WarningTestCase</code> will be created instead,
     * leaving the current test run untouched.
     *
     * @throws Exception
     */
    public function addTestFile(string $filename): void
    {
        if (file_exists($filename) && substr($filename, -5) === '.phpt') {
            $this->addTest(
                new PhptTestCase($filename)
=======
     * added, a <code>PHPUnit_Framework_Warning</code> will be created instead,
     * leaving the current test run untouched.
     *
     * @param string $filename
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 2.3.0
     */
    public function addTestFile($filename)
    {
        if (!is_string($filename)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (file_exists($filename) && substr($filename, -5) == '.phpt') {
            $this->addTest(
                new PHPUnit_Extensions_PhptTestCase($filename)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            );

            return;
        }

        // The given file may contain further stub classes in addition to the
        // test class itself. Figure out the actual test class.
<<<<<<< HEAD
        $filename   = FileLoader::checkAndLoad($filename);
        $newClasses = array_slice(get_declared_classes(), $this->declaredClassesPointer);

        // The diff is empty in case a parent class (with test methods) is added
        // AFTER a child class that inherited from it. To account for that case,
        // accumulate all discovered classes, so the parent class may be found in
        // a later invocation.
        if (!empty($newClasses)) {
            // On the assumption that test classes are defined first in files,
            // process discovered classes in approximate LIFO order, so as to
            // avoid unnecessary reflection.
            $this->foundClasses           = array_merge($newClasses, $this->foundClasses);
            $this->declaredClassesPointer = count(get_declared_classes());
        }

        // The test class's name must match the filename, either in full, or as
        // a PEAR/PSR-0 prefixed short name ('NameSpace_ShortName'), or as a
        // PSR-1 local short name ('NameSpace\ShortName'). The comparison must be
        // anchored to prevent false-positive matches (e.g., 'OtherShortName').
        $shortName      = basename($filename, '.php');
        $shortNameRegEx = '/(?:^|_|\\\\)' . preg_quote($shortName, '/') . '$/';

        foreach ($this->foundClasses as $i => $className) {
            if (preg_match($shortNameRegEx, $className)) {
                try {
                    $class = new ReflectionClass($className);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd

                if ($class->getFileName() == $filename) {
                    $newClasses = [$className];
                    unset($this->foundClasses[$i]);

=======
        $classes    = get_declared_classes();
        $filename   = PHPUnit_Util_Fileloader::checkAndLoad($filename);
        $newClasses = array_diff(get_declared_classes(), $classes);

        // The diff is empty in case a parent class (with test methods) is added
        // AFTER a child class that inherited from it. To account for that case,
        // cumulate all discovered classes, so the parent class may be found in
        // a later invocation.
        if ($newClasses) {
            // On the assumption that test classes are defined first in files,
            // process discovered classes in approximate LIFO order, so as to
            // avoid unnecessary reflection.
            $this->foundClasses = array_merge($newClasses, $this->foundClasses);
        }

        // The test class's name must match the filename, either in full, or as
        // a PEAR/PSR-0 prefixed shortname ('NameSpace_ShortName'), or as a
        // PSR-1 local shortname ('NameSpace\ShortName'). The comparison must be
        // anchored to prevent false-positive matches (e.g., 'OtherShortName').
        $shortname      = basename($filename, '.php');
        $shortnameRegEx = '/(?:^|_|\\\\)' . preg_quote($shortname, '/') . '$/';

        foreach ($this->foundClasses as $i => $className) {
            if (preg_match($shortnameRegEx, $className)) {
                $class = new ReflectionClass($className);

                if ($class->getFileName() == $filename) {
                    $newClasses = array($className);
                    unset($this->foundClasses[$i]);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;
                }
            }
        }

        foreach ($newClasses as $className) {
<<<<<<< HEAD
            try {
                $class = new ReflectionClass($className);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
                    $e
                );
            }
            // @codeCoverageIgnoreEnd

            if (dirname($class->getFileName()) === __DIR__) {
                continue;
            }

            if (!$class->isAbstract()) {
                if ($class->hasMethod(BaseTestRunner::SUITE_METHODNAME)) {
                    try {
                        $method = $class->getMethod(
                            BaseTestRunner::SUITE_METHODNAME
                        );
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
            $class = new ReflectionClass($className);

            if (!$class->isAbstract()) {
                if ($class->hasMethod(PHPUnit_Runner_BaseTestRunner::SUITE_METHODNAME)) {
                    $method = $class->getMethod(
                        PHPUnit_Runner_BaseTestRunner::SUITE_METHODNAME
                    );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

                    if ($method->isStatic()) {
                        $this->addTest($method->invoke(null, $className));
                    }
<<<<<<< HEAD
                } elseif ($class->implementsInterface(Test::class)) {
=======
                } elseif ($class->implementsInterface('PHPUnit_Framework_Test')) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $this->addTestSuite($class);
                }
            }
        }

        $this->numTests = -1;
    }

    /**
     * Wrapper for addTestFile() that adds multiple test files.
     *
<<<<<<< HEAD
     * @throws Exception
     */
    public function addTestFiles(iterable $fileNames): void
    {
        foreach ($fileNames as $filename) {
=======
     * @param array|Iterator $filenames
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 2.3.0
     */
    public function addTestFiles($filenames)
    {
        if (!(is_array($filenames) ||
             (is_object($filenames) && $filenames instanceof Iterator))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'array or iterator'
            );
        }

        foreach ($filenames as $filename) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->addTestFile((string) $filename);
        }
    }

    /**
     * Counts the number of test cases that will be run by this test.
<<<<<<< HEAD
     */
    public function count(bool $preferCache = false): int
    {
        if ($preferCache && $this->cachedNumTests !== null) {
            return $this->cachedNumTests;
        }

        $numTests = 0;

        foreach ($this as $test) {
            $numTests += count($test);
        }

        $this->cachedNumTests = $numTests;

=======
     *
     * @param bool $preferCache Indicates if cache is preferred.
     *
     * @return int
     */
    public function count($preferCache = false)
    {
        if ($preferCache && $this->cachedNumTests != null) {
            $numTests = $this->cachedNumTests;
        } else {
            $numTests = 0;
            foreach ($this as $test) {
                $numTests += count($test);
            }
            $this->cachedNumTests = $numTests;
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $numTests;
    }

    /**
<<<<<<< HEAD
     * Returns the name of the suite.
     */
    public function getName(): string
=======
     * @param ReflectionClass $theClass
     * @param string          $name
     *
     * @return PHPUnit_Framework_Test
     *
     * @throws PHPUnit_Framework_Exception
     */
    public static function createTest(ReflectionClass $theClass, $name)
    {
        $className = $theClass->getName();

        if (!$theClass->isInstantiable()) {
            return self::warning(
                sprintf('Cannot instantiate class "%s".', $className)
            );
        }

        $backupSettings = PHPUnit_Util_Test::getBackupSettings(
            $className,
            $name
        );

        $preserveGlobalState = PHPUnit_Util_Test::getPreserveGlobalStateSettings(
            $className,
            $name
        );

        $runTestInSeparateProcess = PHPUnit_Util_Test::getProcessIsolationSettings(
            $className,
            $name
        );

        $constructor = $theClass->getConstructor();

        if ($constructor !== null) {
            $parameters = $constructor->getParameters();

            // TestCase() or TestCase($name)
            if (count($parameters) < 2) {
                $test = new $className;
            } // TestCase($name, $data)
            else {
                try {
                    $data = PHPUnit_Util_Test::getProvidedData(
                        $className,
                        $name
                    );
                } catch (PHPUnit_Framework_IncompleteTestError $e) {
                    $message = sprintf(
                        'Test for %s::%s marked incomplete by data provider',
                        $className,
                        $name
                    );

                    $_message = $e->getMessage();

                    if (!empty($_message)) {
                        $message .= "\n" . $_message;
                    }

                    $data = self::incompleteTest($className, $name, $message);
                } catch (PHPUnit_Framework_SkippedTestError $e) {
                    $message = sprintf(
                        'Test for %s::%s skipped by data provider',
                        $className,
                        $name
                    );

                    $_message = $e->getMessage();

                    if (!empty($_message)) {
                        $message .= "\n" . $_message;
                    }

                    $data = self::skipTest($className, $name, $message);
                } catch (Throwable $_t) {
                    $t = $_t;
                } catch (Exception $_t) {
                    $t = $_t;
                }

                if (isset($t)) {
                    $message = sprintf(
                        'The data provider specified for %s::%s is invalid.',
                        $className,
                        $name
                    );

                    $_message = $t->getMessage();

                    if (!empty($_message)) {
                        $message .= "\n" . $_message;
                    }

                    $data = self::warning($message);
                }

                // Test method with @dataProvider.
                if (isset($data)) {
                    $test = new PHPUnit_Framework_TestSuite_DataProvider(
                        $className . '::' . $name
                    );

                    if (empty($data)) {
                        $data = self::warning(
                            sprintf(
                                'No tests found in suite "%s".',
                                $test->getName()
                            )
                        );
                    }

                    $groups = PHPUnit_Util_Test::getGroups($className, $name);

                    if ($data instanceof PHPUnit_Framework_Warning ||
                        $data instanceof PHPUnit_Framework_SkippedTestCase ||
                        $data instanceof PHPUnit_Framework_IncompleteTestCase) {
                        $test->addTest($data, $groups);
                    } else {
                        foreach ($data as $_dataName => $_data) {
                            $_test = new $className($name, $_data, $_dataName);

                            if ($runTestInSeparateProcess) {
                                $_test->setRunTestInSeparateProcess(true);

                                if ($preserveGlobalState !== null) {
                                    $_test->setPreserveGlobalState($preserveGlobalState);
                                }
                            }

                            if ($backupSettings['backupGlobals'] !== null) {
                                $_test->setBackupGlobals(
                                    $backupSettings['backupGlobals']
                                );
                            }

                            if ($backupSettings['backupStaticAttributes'] !== null) {
                                $_test->setBackupStaticAttributes(
                                    $backupSettings['backupStaticAttributes']
                                );
                            }

                            $test->addTest($_test, $groups);
                        }
                    }
                } else {
                    $test = new $className;
                }
            }
        }

        if (!isset($test)) {
            throw new PHPUnit_Framework_Exception('No valid test provided.');
        }

        if ($test instanceof PHPUnit_Framework_TestCase) {
            $test->setName($name);

            if ($runTestInSeparateProcess) {
                $test->setRunTestInSeparateProcess(true);

                if ($preserveGlobalState !== null) {
                    $test->setPreserveGlobalState($preserveGlobalState);
                }
            }

            if ($backupSettings['backupGlobals'] !== null) {
                $test->setBackupGlobals($backupSettings['backupGlobals']);
            }

            if ($backupSettings['backupStaticAttributes'] !== null) {
                $test->setBackupStaticAttributes(
                    $backupSettings['backupStaticAttributes']
                );
            }
        }

        return $test;
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
     * Returns the name of the suite.
     *
     * @return string
     */
    public function getName()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->name;
    }

    /**
     * Returns the test groups of the suite.
<<<<<<< HEAD
     */
    public function getGroups(): array
=======
     *
     * @return array
     *
     * @since  Method available since Release 3.2.0
     */
    public function getGroups()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return array_keys($this->groups);
    }

<<<<<<< HEAD
    public function getGroupDetails(): array
=======
    public function getGroupDetails()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->groups;
    }

    /**
<<<<<<< HEAD
     * Set tests groups of the test case.
     */
    public function setGroupDetails(array $groups): void
=======
     * Set tests groups of the test case
     *
     * @param array $groups
     *
     * @since Method available since Release 4.0.0
     */
    public function setGroupDetails(array $groups)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->groups = $groups;
    }

    /**
     * Runs the tests and collects their result in a TestResult.
     *
<<<<<<< HEAD
     * @throws \PHPUnit\Framework\CodeCoverageException
     * @throws \SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws \SebastianBergmann\CodeCoverage\MissingCoversAnnotationException
     * @throws \SebastianBergmann\CodeCoverage\RuntimeException
     * @throws \SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Warning
     */
    public function run(TestResult $result = null): TestResult
=======
     * @param PHPUnit_Framework_TestResult $result
     *
     * @return PHPUnit_Framework_TestResult
     */
    public function run(PHPUnit_Framework_TestResult $result = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($result === null) {
            $result = $this->createResult();
        }

<<<<<<< HEAD
        if (count($this) === 0) {
            return $result;
        }

        /** @psalm-var class-string $className */
        $className   = $this->name;
        $hookMethods = TestUtil::getHookMethods($className);
=======
        if (count($this) == 0) {
            return $result;
        }

        $hookMethods = PHPUnit_Util_Test::getHookMethods($this->name);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $result->startTestSuite($this);

        try {
<<<<<<< HEAD
            foreach ($hookMethods['beforeClass'] as $beforeClassMethod) {
                if ($this->testCase &&
                    class_exists($this->name, false) &&
                    method_exists($this->name, $beforeClassMethod)) {
                    if ($missingRequirements = TestUtil::getMissingRequirements($this->name, $beforeClassMethod)) {
                        $this->markTestSuiteSkipped(implode(PHP_EOL, $missingRequirements));
                    }

                    call_user_func([$this->name, $beforeClassMethod]);
                }
            }
        } catch (SkippedTestSuiteError $error) {
            foreach ($this->tests() as $test) {
                $result->startTest($test);
                $result->addFailure($test, $error, 0);
                $result->endTest($test, 0);
            }

            $result->endTestSuite($this);

            return $result;
        } catch (Throwable $t) {
            $errorAdded = false;

            foreach ($this->tests() as $test) {
                if ($result->shouldStop()) {
                    break;
                }

                $result->startTest($test);

                if (!$errorAdded) {
                    $result->addError($test, $t, 0);

                    $errorAdded = true;
                } else {
                    $result->addFailure(
                        $test,
                        new SkippedTestError('Test skipped because of an error in hook method'),
                        0
                    );
                }

                $result->endTest($test, 0);
            }

=======
            $this->setUp();

            foreach ($hookMethods['beforeClass'] as $beforeClassMethod) {
                if ($this->testCase === true &&
                    class_exists($this->name, false) &&
                    method_exists($this->name, $beforeClassMethod)) {
                    if ($missingRequirements = PHPUnit_Util_Test::getMissingRequirements($this->name, $beforeClassMethod)) {
                        $this->markTestSuiteSkipped(implode(PHP_EOL, $missingRequirements));
                    }

                    call_user_func(array($this->name, $beforeClassMethod));
                }
            }
        } catch (PHPUnit_Framework_SkippedTestSuiteError $e) {
            $numTests = count($this);

            for ($i = 0; $i < $numTests; $i++) {
                $result->startTest($this);
                $result->addFailure($this, $e, 0);
                $result->endTest($this, 0);
            }

            $this->tearDown();
            $result->endTestSuite($this);

            return $result;
        } catch (Throwable $_t) {
            $t = $_t;
        } catch (Exception $_t) {
            $t = $_t;
        }

        if (isset($t)) {
            $numTests = count($this);

            for ($i = 0; $i < $numTests; $i++) {
                $result->startTest($this);
                $result->addError($this, $t, 0);
                $result->endTest($this, 0);
            }

            $this->tearDown();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $result->endTestSuite($this);

            return $result;
        }

        foreach ($this as $test) {
            if ($result->shouldStop()) {
                break;
            }

<<<<<<< HEAD
            if ($test instanceof TestCase || $test instanceof self) {
                $test->setBeStrictAboutChangesToGlobalState($this->beStrictAboutChangesToGlobalState);
=======
            if ($test instanceof PHPUnit_Framework_TestCase ||
                $test instanceof self) {
                $test->setDisallowChangesToGlobalState($this->disallowChangesToGlobalState);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $test->setBackupGlobals($this->backupGlobals);
                $test->setBackupStaticAttributes($this->backupStaticAttributes);
                $test->setRunTestInSeparateProcess($this->runTestInSeparateProcess);
            }

            $test->run($result);
        }

<<<<<<< HEAD
        try {
            foreach ($hookMethods['afterClass'] as $afterClassMethod) {
                if ($this->testCase &&
                    class_exists($this->name, false) &&
                    method_exists($this->name, $afterClassMethod)) {
                    call_user_func([$this->name, $afterClassMethod]);
                }
            }
        } catch (Throwable $t) {
            $message = "Exception in {$this->name}::{$afterClassMethod}" . PHP_EOL . $t->getMessage();
            $error   = new SyntheticError($message, 0, $t->getFile(), $t->getLine(), $t->getTrace());

            $placeholderTest = clone $test;
            $placeholderTest->setName($afterClassMethod);

            $result->startTest($placeholderTest);
            $result->addFailure($placeholderTest, $error, 0);
            $result->endTest($placeholderTest, 0);
        }

=======
        foreach ($hookMethods['afterClass'] as $afterClassMethod) {
            if ($this->testCase === true && class_exists($this->name, false) && method_exists($this->name, $afterClassMethod)) {
                call_user_func(array($this->name, $afterClassMethod));
            }
        }

        $this->tearDown();

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $result->endTestSuite($this);

        return $result;
    }

<<<<<<< HEAD
    public function setRunTestInSeparateProcess(bool $runTestInSeparateProcess): void
    {
        $this->runTestInSeparateProcess = $runTestInSeparateProcess;
    }

    public function setName(string $name): void
=======
    /**
     * @param bool $runTestInSeparateProcess
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.7.0
     */
    public function setRunTestInSeparateProcess($runTestInSeparateProcess)
    {
        if (is_bool($runTestInSeparateProcess)) {
            $this->runTestInSeparateProcess = $runTestInSeparateProcess;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }
    }

    /**
     * Runs a test.
     *
     * @deprecated
     *
     * @param PHPUnit_Framework_Test       $test
     * @param PHPUnit_Framework_TestResult $result
     */
    public function runTest(PHPUnit_Framework_Test $test, PHPUnit_Framework_TestResult $result)
    {
        $test->run($result);
    }

    /**
     * Sets the name of the suite.
     *
     * @param  string
     */
    public function setName($name)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->name = $name;
    }

    /**
     * Returns the test at the given index.
     *
<<<<<<< HEAD
     * @return false|Test
     */
    public function testAt(int $index)
    {
        return $this->tests[$index] ?? false;
=======
     * @param  int
     *
     * @return PHPUnit_Framework_Test
     */
    public function testAt($index)
    {
        if (isset($this->tests[$index])) {
            return $this->tests[$index];
        } else {
            return false;
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the tests as an enumeration.
     *
<<<<<<< HEAD
     * @return Test[]
     */
    public function tests(): array
=======
     * @return array
     */
    public function tests()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->tests;
    }

    /**
<<<<<<< HEAD
     * Set tests of the test suite.
     *
     * @param Test[] $tests
     */
    public function setTests(array $tests): void
=======
     * Set tests of the test suite
     *
     * @param array $tests
     *
     * @since Method available since Release 4.0.0
     */
    public function setTests(array $tests)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->tests = $tests;
    }

    /**
     * Mark the test suite as skipped.
     *
     * @param string $message
     *
<<<<<<< HEAD
     * @throws SkippedTestSuiteError
     *
     * @psalm-return never-return
     */
    public function markTestSuiteSkipped($message = ''): void
    {
        throw new SkippedTestSuiteError($message);
    }

    /**
     * @param bool $beStrictAboutChangesToGlobalState
     */
    public function setBeStrictAboutChangesToGlobalState($beStrictAboutChangesToGlobalState): void
    {
        if (null === $this->beStrictAboutChangesToGlobalState && is_bool($beStrictAboutChangesToGlobalState)) {
            $this->beStrictAboutChangesToGlobalState = $beStrictAboutChangesToGlobalState;
=======
     * @throws PHPUnit_Framework_SkippedTestSuiteError
     *
     * @since  Method available since Release 3.0.0
     */
    public function markTestSuiteSkipped($message = '')
    {
        throw new PHPUnit_Framework_SkippedTestSuiteError($message);
    }

    /**
     * @param ReflectionClass  $class
     * @param ReflectionMethod $method
     */
    protected function addTestMethod(ReflectionClass $class, ReflectionMethod $method)
    {
        if (!$this->isTestMethod($method)) {
            return;
        }

        $name = $method->getName();

        if (!$method->isPublic()) {
            $this->addTest(
                self::warning(
                    sprintf(
                        'Test method "%s" in test class "%s" is not public.',
                        $name,
                        $class->getName()
                    )
                )
            );

            return;
        }

        $test = self::createTest($class, $name);

        if ($test instanceof PHPUnit_Framework_TestCase ||
            $test instanceof PHPUnit_Framework_TestSuite_DataProvider) {
            $test->setDependencies(
                PHPUnit_Util_Test::getDependencies($class->getName(), $name)
            );
        }

        $this->addTest(
            $test,
            PHPUnit_Util_Test::getGroups($class->getName(), $name)
        );
    }

    /**
     * @param ReflectionMethod $method
     *
     * @return bool
     */
    public static function isTestMethod(ReflectionMethod $method)
    {
        if (strpos($method->name, 'test') === 0) {
            return true;
        }

        // @scenario on TestCase::testMethod()
        // @test     on TestCase::testMethod()
        $doc_comment = $method->getDocComment();

        return strpos($doc_comment, '@test')     !== false ||
               strpos($doc_comment, '@scenario') !== false;
    }

    /**
     * @param string $message
     *
     * @return PHPUnit_Framework_Warning
     */
    protected static function warning($message)
    {
        return new PHPUnit_Framework_Warning($message);
    }

    /**
     * @param string $class
     * @param string $methodName
     * @param string $message
     *
     * @return PHPUnit_Framework_SkippedTestCase
     *
     * @since  Method available since Release 4.3.0
     */
    protected static function skipTest($class, $methodName, $message)
    {
        return new PHPUnit_Framework_SkippedTestCase($class, $methodName, $message);
    }

    /**
     * @param string $class
     * @param string $methodName
     * @param string $message
     *
     * @return PHPUnit_Framework_IncompleteTestCase
     *
     * @since  Method available since Release 4.3.0
     */
    protected static function incompleteTest($class, $methodName, $message)
    {
        return new PHPUnit_Framework_IncompleteTestCase($class, $methodName, $message);
    }

    /**
     * @param bool $disallowChangesToGlobalState
     *
     * @since  Method available since Release 4.6.0
     */
    public function setDisallowChangesToGlobalState($disallowChangesToGlobalState)
    {
        if (is_null($this->disallowChangesToGlobalState) && is_bool($disallowChangesToGlobalState)) {
            $this->disallowChangesToGlobalState = $disallowChangesToGlobalState;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * @param bool $backupGlobals
<<<<<<< HEAD
     */
    public function setBackupGlobals($backupGlobals): void
    {
        if (null === $this->backupGlobals && is_bool($backupGlobals)) {
=======
     *
     * @since  Method available since Release 3.3.0
     */
    public function setBackupGlobals($backupGlobals)
    {
        if (is_null($this->backupGlobals) && is_bool($backupGlobals)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->backupGlobals = $backupGlobals;
        }
    }

    /**
     * @param bool $backupStaticAttributes
<<<<<<< HEAD
     */
    public function setBackupStaticAttributes($backupStaticAttributes): void
    {
        if (null === $this->backupStaticAttributes && is_bool($backupStaticAttributes)) {
=======
     *
     * @since  Method available since Release 3.4.0
     */
    public function setBackupStaticAttributes($backupStaticAttributes)
    {
        if (is_null($this->backupStaticAttributes) &&
            is_bool($backupStaticAttributes)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->backupStaticAttributes = $backupStaticAttributes;
        }
    }

    /**
     * Returns an iterator for this test suite.
<<<<<<< HEAD
     */
    public function getIterator(): Iterator
    {
        $iterator = new TestSuiteIterator($this);
=======
     *
     * @return RecursiveIteratorIterator
     *
     * @since  Method available since Release 3.1.0
     */
    public function getIterator()
    {
        $iterator = new PHPUnit_Util_TestSuiteIterator($this);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if ($this->iteratorFilter !== null) {
            $iterator = $this->iteratorFilter->factory($iterator, $this);
        }

        return $iterator;
    }

<<<<<<< HEAD
    public function injectFilter(Factory $filter): void
    {
        $this->iteratorFilter = $filter;

=======
    public function injectFilter(PHPUnit_Runner_Filter_Factory $filter)
    {
        $this->iteratorFilter = $filter;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        foreach ($this as $test) {
            if ($test instanceof self) {
                $test->injectFilter($filter);
            }
        }
    }

    /**
<<<<<<< HEAD
     * Creates a default TestResult object.
     */
    protected function createResult(): TestResult
    {
        return new TestResult;
    }

    /**
     * @throws Exception
     */
    protected function addTestMethod(ReflectionClass $class, ReflectionMethod $method): void
    {
        if (!TestUtil::isTestMethod($method)) {
            return;
        }

        $methodName = $method->getName();

        $test = (new TestBuilder)->build($class, $methodName);

        if ($test instanceof TestCase || $test instanceof DataProviderTestSuite) {
            $test->setDependencies(
                TestUtil::getDependencies($class->getName(), $methodName)
            );
        }

        $this->addTest(
            $test,
            TestUtil::getGroups($class->getName(), $methodName)
        );
=======
     * Template Method that is called before the tests
     * of this test suite are run.
     *
     * @since  Method available since Release 3.1.0
     */
    protected function setUp()
    {
    }

    /**
     * Template Method that is called after the tests
     * of this test suite have finished running.
     *
     * @since  Method available since Release 3.1.0
     */
    protected function tearDown()
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
