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
namespace PHPUnit\Runner;

use function is_dir;
use function is_file;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestSuite;
use ReflectionClass;
use ReflectionException;
use SebastianBergmann\FileIterator\Facade as FileIteratorFacade;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
abstract class BaseTestRunner
{
    /**
     * @var int
     */
    public const STATUS_UNKNOWN = -1;

    /**
     * @var int
     */
    public const STATUS_PASSED = 0;

    /**
     * @var int
     */
    public const STATUS_SKIPPED = 1;

    /**
     * @var int
     */
    public const STATUS_INCOMPLETE = 2;

    /**
     * @var int
     */
    public const STATUS_FAILURE = 3;

    /**
     * @var int
     */
    public const STATUS_ERROR = 4;

    /**
     * @var int
     */
    public const STATUS_RISKY = 5;

    /**
     * @var int
     */
    public const STATUS_WARNING = 6;

    /**
     * @var string
     */
    public const SUITE_METHODNAME = 'suite';

    /**
     * Returns the loader to be used.
     */
    public function getLoader(): TestSuiteLoader
    {
        return new StandardTestSuiteLoader;
=======

/**
 * Base class for all test runners.
 *
 * @since Class available since Release 2.0.0
 */
abstract class PHPUnit_Runner_BaseTestRunner
{
    const STATUS_PASSED     = 0;
    const STATUS_SKIPPED    = 1;
    const STATUS_INCOMPLETE = 2;
    const STATUS_FAILURE    = 3;
    const STATUS_ERROR      = 4;
    const STATUS_RISKY      = 5;
    const SUITE_METHODNAME  = 'suite';

    /**
     * Returns the loader to be used.
     *
     * @return PHPUnit_Runner_TestSuiteLoader
     */
    public function getLoader()
    {
        return new PHPUnit_Runner_StandardTestSuiteLoader;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the Test corresponding to the given suite.
     * This is a template method, subclasses override
     * the runFailed() and clearStatus() methods.
     *
<<<<<<< HEAD
     * @param string|string[] $suffixes
     *
     * @throws Exception
     */
    public function getTest(string $suiteClassName, string $suiteClassFile = '', $suffixes = ''): ?Test
    {
        if (empty($suiteClassFile) && is_dir($suiteClassName) && !is_file($suiteClassName . '.php')) {
            /** @var string[] $files */
            $files = (new FileIteratorFacade)->getFilesAsArray(
=======
     * @param string $suiteClassName
     * @param string $suiteClassFile
     * @param mixed  $suffixes
     *
     * @return PHPUnit_Framework_Test
     */
    public function getTest($suiteClassName, $suiteClassFile = '', $suffixes = '')
    {
        if (is_dir($suiteClassName) &&
            !is_file($suiteClassName . '.php') && empty($suiteClassFile)) {
            $facade = new File_Iterator_Facade;
            $files  = $facade->getFilesAsArray(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $suiteClassName,
                $suffixes
            );

<<<<<<< HEAD
            $suite = new TestSuite($suiteClassName);
=======
            $suite = new PHPUnit_Framework_TestSuite($suiteClassName);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $suite->addTestFiles($files);

            return $suite;
        }

        try {
            $testClass = $this->loadSuiteClass(
                $suiteClassName,
                $suiteClassFile
            );
<<<<<<< HEAD
        } catch (Exception $e) {
            $this->runFailed($e->getMessage());

            return null;
=======
        } catch (PHPUnit_Framework_Exception $e) {
            $this->runFailed($e->getMessage());

            return;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        try {
            $suiteMethod = $testClass->getMethod(self::SUITE_METHODNAME);

            if (!$suiteMethod->isStatic()) {
                $this->runFailed(
                    'suite() method must be static.'
                );

<<<<<<< HEAD
                return null;
            }

            $test = $suiteMethod->invoke(null, $testClass->getName());
        } catch (ReflectionException $e) {
            try {
                $test = new TestSuite($testClass);
            } catch (Exception $e) {
                $test = new TestSuite;
=======
                return;
            }

            try {
                $test = $suiteMethod->invoke(null, $testClass->getName());
            } catch (ReflectionException $e) {
                $this->runFailed(
                    sprintf(
                        "Failed to invoke suite() method.\n%s",
                        $e->getMessage()
                    )
                );

                return;
            }
        } catch (ReflectionException $e) {
            try {
                $test = new PHPUnit_Framework_TestSuite($testClass);
            } catch (PHPUnit_Framework_Exception $e) {
                $test = new PHPUnit_Framework_TestSuite;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $test->setName($suiteClassName);
            }
        }

        $this->clearStatus();

        return $test;
    }

    /**
     * Returns the loaded ReflectionClass for a suite name.
<<<<<<< HEAD
     */
    protected function loadSuiteClass(string $suiteClassName, string $suiteClassFile = ''): ReflectionClass
    {
        return $this->getLoader()->load($suiteClassName, $suiteClassFile);
=======
     *
     * @param string $suiteClassName
     * @param string $suiteClassFile
     *
     * @return ReflectionClass
     */
    protected function loadSuiteClass($suiteClassName, $suiteClassFile = '')
    {
        $loader = $this->getLoader();

        return $loader->load($suiteClassName, $suiteClassFile);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Clears the status message.
     */
<<<<<<< HEAD
    protected function clearStatus(): void
=======
    protected function clearStatus()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
    }

    /**
     * Override to define how to handle a failed loading of
     * a test suite.
<<<<<<< HEAD
     */
    abstract protected function runFailed(string $message): void;
=======
     *
     * @param string $message
     */
    abstract protected function runFailed($message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
