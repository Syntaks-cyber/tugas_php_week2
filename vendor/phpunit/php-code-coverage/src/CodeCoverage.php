<<<<<<< HEAD
<?php declare(strict_types=1);
/*
 * This file is part of the php-code-coverage package.
=======
<?php
/*
 * This file is part of the PHP_CodeCoverage package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
namespace SebastianBergmann\CodeCoverage;

use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\Test;
use SebastianBergmann\CodeCoverage\Driver\Driver;
use SebastianBergmann\CodeCoverage\Driver\PCOV;
use SebastianBergmann\CodeCoverage\Driver\PHPDBG;
use SebastianBergmann\CodeCoverage\Driver\Xdebug;
use SebastianBergmann\CodeCoverage\Node\Builder;
use SebastianBergmann\CodeCoverage\Node\Directory;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;
=======

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
use SebastianBergmann\Environment\Runtime;

/**
 * Provides collection functionality for PHP code coverage information.
<<<<<<< HEAD
 */
final class CodeCoverage
{
    /**
     * @var Driver
=======
 *
 * @since Class available since Release 1.0.0
 */
class PHP_CodeCoverage
{
    /**
     * @var PHP_CodeCoverage_Driver
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private $driver;

    /**
<<<<<<< HEAD
     * @var Filter
=======
     * @var PHP_CodeCoverage_Filter
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private $filter;

    /**
<<<<<<< HEAD
     * @var Wizard
     */
    private $wizard;

    /**
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @var bool
     */
    private $cacheTokens = false;

    /**
     * @var bool
     */
    private $checkForUnintentionallyCoveredCode = false;

    /**
     * @var bool
     */
    private $forceCoversAnnotation = false;

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $checkForUnexecutedCoveredCode = false;

    /**
     * @var bool
     */
    private $checkForMissingCoversAnnotation = false;
=======
    private $mapTestClassNameToCoveredClassName = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
    private $addUncoveredFilesFromWhitelist = true;

    /**
     * @var bool
     */
    private $processUncoveredFilesFromWhitelist = false;

    /**
<<<<<<< HEAD
     * @var bool
     */
    private $ignoreDeprecatedCode = false;

    /**
     * @var PhptTestCase|string|TestCase
=======
     * @var mixed
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private $currentId;

    /**
     * Code coverage data.
     *
     * @var array
     */
<<<<<<< HEAD
    private $data = [];
=======
    private $data = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $ignoredLines = [];
=======
    private $ignoredLines = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
    private $disableIgnoredLines = false;

    /**
     * Test data.
     *
     * @var array
     */
<<<<<<< HEAD
    private $tests = [];

    /**
     * @var string[]
     */
    private $unintentionallyCoveredSubclassesWhitelist = [];

    /**
     * Determine if the data has been initialized or not
     *
     * @var bool
     */
    private $isInitialized = false;

    /**
     * Determine whether we need to check for dead and unused code on each test
     *
     * @var bool
     */
    private $shouldCheckForDeadAndUnused = true;

    /**
     * @var Directory
     */
    private $report;

    /**
     * @throws RuntimeException
     */
    public function __construct(Driver $driver = null, Filter $filter = null)
    {
        if ($filter === null) {
            $filter = new Filter;
        }

        if ($driver === null) {
            $driver = $this->selectDriver($filter);
=======
    private $tests = array();

    /**
     * Constructor.
     *
     * @param  PHP_CodeCoverage_Driver    $driver
     * @param  PHP_CodeCoverage_Filter    $filter
     * @throws PHP_CodeCoverage_Exception
     */
    public function __construct(PHP_CodeCoverage_Driver $driver = null, PHP_CodeCoverage_Filter $filter = null)
    {
        if ($driver === null) {
            $driver = $this->selectDriver();
        }

        if ($filter === null) {
            $filter = new PHP_CodeCoverage_Filter;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $this->driver = $driver;
        $this->filter = $filter;
<<<<<<< HEAD

        $this->wizard = new Wizard;
    }

    /**
     * Returns the code coverage information as a graph of node objects.
     */
    public function getReport(): Directory
    {
        if ($this->report === null) {
            $this->report = (new Builder)->build($this);
        }

        return $this->report;
=======
    }

    /**
     * Returns the PHP_CodeCoverage_Report_Node_* object graph
     * for this PHP_CodeCoverage object.
     *
     * @return PHP_CodeCoverage_Report_Node_Directory
     * @since  Method available since Release 1.1.0
     */
    public function getReport()
    {
        $factory = new PHP_CodeCoverage_Report_Factory;

        return $factory->create($this);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Clears collected code coverage data.
     */
<<<<<<< HEAD
    public function clear(): void
    {
        $this->isInitialized = false;
        $this->currentId     = null;
        $this->data          = [];
        $this->tests         = [];
        $this->report        = null;
    }

    /**
     * Returns the filter object used.
     */
    public function filter(): Filter
=======
    public function clear()
    {
        $this->currentId = null;
        $this->data      = array();
        $this->tests     = array();
    }

    /**
     * Returns the PHP_CodeCoverage_Filter used.
     *
     * @return PHP_CodeCoverage_Filter
     */
    public function filter()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->filter;
    }

    /**
     * Returns the collected code coverage data.
<<<<<<< HEAD
     */
    public function getData(bool $raw = false): array
=======
     * Set $raw = true to bypass all filters.
     *
     * @param  bool  $raw
     * @return array
     * @since  Method available since Release 1.1.0
     */
    public function getData($raw = false)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$raw && $this->addUncoveredFilesFromWhitelist) {
            $this->addUncoveredFilesFromWhitelist();
        }

<<<<<<< HEAD
=======
        // We need to apply the blacklist filter a second time
        // when no whitelist is used.
        if (!$raw && !$this->filter->hasWhitelist()) {
            $this->applyListsFilter($this->data);
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this->data;
    }

    /**
     * Sets the coverage data.
<<<<<<< HEAD
     */
    public function setData(array $data): void
    {
        $this->data   = $data;
        $this->report = null;
=======
     *
     * @param array $data
     * @since Method available since Release 2.0.0
     */
    public function setData(array $data)
    {
        $this->data = $data;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the test data.
<<<<<<< HEAD
     */
    public function getTests(): array
=======
     *
     * @return array
     * @since  Method available since Release 1.1.0
     */
    public function getTests()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->tests;
    }

    /**
     * Sets the test data.
<<<<<<< HEAD
     */
    public function setTests(array $tests): void
=======
     *
     * @param array $tests
     * @since Method available since Release 2.0.0
     */
    public function setTests(array $tests)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->tests = $tests;
    }

    /**
     * Start collection of code coverage information.
     *
<<<<<<< HEAD
     * @param PhptTestCase|string|TestCase $id
     *
     * @throws RuntimeException
     */
    public function start($id, bool $clear = false): void
    {
=======
     * @param  mixed                      $id
     * @param  bool                       $clear
     * @throws PHP_CodeCoverage_Exception
     */
    public function start($id, $clear = false)
    {
        if (!is_bool($clear)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if ($clear) {
            $this->clear();
        }

<<<<<<< HEAD
        if ($this->isInitialized === false) {
            $this->initializeData();
        }

        $this->currentId = $id;

        $this->driver->start($this->shouldCheckForDeadAndUnused);
=======
        $this->currentId = $id;

        $this->driver->start();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Stop collection of code coverage information.
     *
<<<<<<< HEAD
     * @param array|false $linesToBeCovered
     *
     * @throws MissingCoversAnnotationException
     * @throws CoveredCodeNotExecutedException
     * @throws RuntimeException
     * @throws InvalidArgumentException
     * @throws \ReflectionException
     */
    public function stop(bool $append = true, $linesToBeCovered = [], array $linesToBeUsed = [], bool $ignoreForceCoversAnnotation = false): array
    {
        if (!\is_array($linesToBeCovered) && $linesToBeCovered !== false) {
            throw InvalidArgumentException::create(
=======
     * @param  bool                       $append
     * @param  mixed                      $linesToBeCovered
     * @param  array                      $linesToBeUsed
     * @return array
     * @throws PHP_CodeCoverage_Exception
     */
    public function stop($append = true, $linesToBeCovered = array(), array $linesToBeUsed = array())
    {
        if (!is_bool($append)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        if (!is_array($linesToBeCovered) && $linesToBeCovered !== false) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                2,
                'array or false'
            );
        }

        $data = $this->driver->stop();
<<<<<<< HEAD
        $this->append($data, null, $append, $linesToBeCovered, $linesToBeUsed, $ignoreForceCoversAnnotation);
=======
        $this->append($data, null, $append, $linesToBeCovered, $linesToBeUsed);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $this->currentId = null;

        return $data;
    }

    /**
     * Appends code coverage data.
     *
<<<<<<< HEAD
     * @param PhptTestCase|string|TestCase $id
     * @param array|false                  $linesToBeCovered
     *
     * @throws \SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException
     * @throws \SebastianBergmann\CodeCoverage\MissingCoversAnnotationException
     * @throws \SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException
     * @throws \ReflectionException
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws RuntimeException
     */
    public function append(array $data, $id = null, bool $append = true, $linesToBeCovered = [], array $linesToBeUsed = [], bool $ignoreForceCoversAnnotation = false): void
=======
     * @param  array                      $data
     * @param  mixed                      $id
     * @param  bool                       $append
     * @param  mixed                      $linesToBeCovered
     * @param  array                      $linesToBeUsed
     * @throws PHP_CodeCoverage_Exception
     */
    public function append(array $data, $id = null, $append = true, $linesToBeCovered = array(), array $linesToBeUsed = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($id === null) {
            $id = $this->currentId;
        }

        if ($id === null) {
<<<<<<< HEAD
            throw new RuntimeException;
        }

        $this->applyWhitelistFilter($data);
=======
            throw new PHP_CodeCoverage_Exception;
        }

        $this->applyListsFilter($data);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->applyIgnoredLinesFilter($data);
        $this->initializeFilesThatAreSeenTheFirstTime($data);

        if (!$append) {
            return;
        }

<<<<<<< HEAD
        if ($id !== 'UNCOVERED_FILES_FROM_WHITELIST') {
            $this->applyCoversAnnotationFilter(
                $data,
                $linesToBeCovered,
                $linesToBeUsed,
                $ignoreForceCoversAnnotation
=======
        if ($id != 'UNCOVERED_FILES_FROM_WHITELIST') {
            $this->applyCoversAnnotationFilter(
                $data,
                $linesToBeCovered,
                $linesToBeUsed
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            );
        }

        if (empty($data)) {
            return;
        }

        $size   = 'unknown';
<<<<<<< HEAD
        $status = -1;

        if ($id instanceof TestCase) {
            $_size = $id->getSize();

            if ($_size === Test::SMALL) {
                $size = 'small';
            } elseif ($_size === Test::MEDIUM) {
                $size = 'medium';
            } elseif ($_size === Test::LARGE) {
=======
        $status = null;

        if ($id instanceof PHPUnit_Framework_TestCase) {
            $_size = $id->getSize();

            if ($_size == PHPUnit_Util_Test::SMALL) {
                $size = 'small';
            } elseif ($_size == PHPUnit_Util_Test::MEDIUM) {
                $size = 'medium';
            } elseif ($_size == PHPUnit_Util_Test::LARGE) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $size = 'large';
            }

            $status = $id->getStatus();
<<<<<<< HEAD
            $id     = \get_class($id) . '::' . $id->getName();
        } elseif ($id instanceof PhptTestCase) {
=======
            $id     = get_class($id) . '::' . $id->getName();
        } elseif ($id instanceof PHPUnit_Extensions_PhptTestCase) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $size = 'large';
            $id   = $id->getName();
        }

<<<<<<< HEAD
        $this->tests[$id] = ['size' => $size, 'status' => $status];
=======
        $this->tests[$id] = array('size' => $size, 'status' => $status);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        foreach ($data as $file => $lines) {
            if (!$this->filter->isFile($file)) {
                continue;
            }

            foreach ($lines as $k => $v) {
<<<<<<< HEAD
                if ($v === Driver::LINE_EXECUTED) {
                    if (empty($this->data[$file][$k]) || !\in_array($id, $this->data[$file][$k])) {
=======
                if ($v == PHP_CodeCoverage_Driver::LINE_EXECUTED) {
                    if (empty($this->data[$file][$k]) || !in_array($id, $this->data[$file][$k])) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                        $this->data[$file][$k][] = $id;
                    }
                }
            }
        }
<<<<<<< HEAD

        $this->report = null;
    }

    /**
     * Merges the data from another instance.
     *
     * @param CodeCoverage $that
     */
    public function merge(self $that): void
    {
        $this->filter->setWhitelistedFiles(
            \array_merge($this->filter->getWhitelistedFiles(), $that->filter()->getWhitelistedFiles())
=======
    }

    /**
     * Merges the data from another instance of PHP_CodeCoverage.
     *
     * @param PHP_CodeCoverage $that
     */
    public function merge(PHP_CodeCoverage $that)
    {
        $this->filter->setBlacklistedFiles(
            array_merge($this->filter->getBlacklistedFiles(), $that->filter()->getBlacklistedFiles())
        );

        $this->filter->setWhitelistedFiles(
            array_merge($this->filter->getWhitelistedFiles(), $that->filter()->getWhitelistedFiles())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        foreach ($that->data as $file => $lines) {
            if (!isset($this->data[$file])) {
                if (!$this->filter->isFiltered($file)) {
                    $this->data[$file] = $lines;
                }

                continue;
            }

<<<<<<< HEAD
            // we should compare the lines if any of two contains data
            $compareLineNumbers = \array_unique(
                \array_merge(
                    \array_keys($this->data[$file]),
                    \array_keys($that->data[$file])
                )
            );

            foreach ($compareLineNumbers as $line) {
                $thatPriority = $this->getLinePriority($that->data[$file], $line);
                $thisPriority = $this->getLinePriority($this->data[$file], $line);

                if ($thatPriority > $thisPriority) {
                    $this->data[$file][$line] = $that->data[$file][$line];
                } elseif ($thatPriority === $thisPriority && \is_array($this->data[$file][$line])) {
                    $this->data[$file][$line] = \array_unique(
                        \array_merge($this->data[$file][$line], $that->data[$file][$line])
                    );
=======
            foreach ($lines as $line => $data) {
                if ($data !== null) {
                    if (!isset($this->data[$file][$line])) {
                        $this->data[$file][$line] = $data;
                    } else {
                        $this->data[$file][$line] = array_unique(
                            array_merge($this->data[$file][$line], $data)
                        );
                    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                }
            }
        }

<<<<<<< HEAD
        $this->tests  = \array_merge($this->tests, $that->getTests());
        $this->report = null;
    }

    public function setCacheTokens(bool $flag): void
    {
        $this->cacheTokens = $flag;
    }

    public function getCacheTokens(): bool
=======
        $this->tests = array_merge($this->tests, $that->getTests());

    }

    /**
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     * @since  Method available since Release 1.1.0
     */
    public function setCacheTokens($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->cacheTokens = $flag;
    }

    /**
     * @since Method available since Release 1.1.0
     */
    public function getCacheTokens()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->cacheTokens;
    }

<<<<<<< HEAD
    public function setCheckForUnintentionallyCoveredCode(bool $flag): void
    {
        $this->checkForUnintentionallyCoveredCode = $flag;
    }

    public function setForceCoversAnnotation(bool $flag): void
    {
        $this->forceCoversAnnotation = $flag;
    }

    public function setCheckForMissingCoversAnnotation(bool $flag): void
    {
        $this->checkForMissingCoversAnnotation = $flag;
    }

    public function setCheckForUnexecutedCoveredCode(bool $flag): void
    {
        $this->checkForUnexecutedCoveredCode = $flag;
    }

    public function setAddUncoveredFilesFromWhitelist(bool $flag): void
    {
        $this->addUncoveredFilesFromWhitelist = $flag;
    }

    public function setProcessUncoveredFilesFromWhitelist(bool $flag): void
    {
        $this->processUncoveredFilesFromWhitelist = $flag;
    }

    public function setDisableIgnoredLines(bool $flag): void
    {
        $this->disableIgnoredLines = $flag;
    }

    public function setIgnoreDeprecatedCode(bool $flag): void
    {
        $this->ignoreDeprecatedCode = $flag;
    }

    public function setUnintentionallyCoveredSubclassesWhitelist(array $whitelist): void
    {
        $this->unintentionallyCoveredSubclassesWhitelist = $whitelist;
    }

    /**
     * Determine the priority for a line
     *
     * 1 = the line is not set
     * 2 = the line has not been tested
     * 3 = the line is dead code
     * 4 = the line has been tested
     *
     * During a merge, a higher number is better.
     *
     * @param array $data
     * @param int   $line
     *
     * @return int
     */
    private function getLinePriority($data, $line)
    {
        if (!\array_key_exists($line, $data)) {
            return 1;
        }

        if (\is_array($data[$line]) && \count($data[$line]) === 0) {
            return 2;
        }

        if ($data[$line] === null) {
            return 3;
        }

        return 4;
=======
    /**
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     * @since  Method available since Release 2.0.0
     */
    public function setCheckForUnintentionallyCoveredCode($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->checkForUnintentionallyCoveredCode = $flag;
    }

    /**
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     */
    public function setForceCoversAnnotation($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->forceCoversAnnotation = $flag;
    }

    /**
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     */
    public function setMapTestClassNameToCoveredClassName($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->mapTestClassNameToCoveredClassName = $flag;
    }

    /**
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     */
    public function setAddUncoveredFilesFromWhitelist($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->addUncoveredFilesFromWhitelist = $flag;
    }

    /**
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     */
    public function setProcessUncoveredFilesFromWhitelist($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->processUncoveredFilesFromWhitelist = $flag;
    }

    /**
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     */
    public function setDisableIgnoredLines($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'boolean'
            );
        }

        $this->disableIgnoredLines = $flag;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Applies the @covers annotation filtering.
     *
<<<<<<< HEAD
     * @param array|false $linesToBeCovered
     *
     * @throws \SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException
     * @throws \ReflectionException
     * @throws MissingCoversAnnotationException
     * @throws UnintentionallyCoveredCodeException
     */
    private function applyCoversAnnotationFilter(array &$data, $linesToBeCovered, array $linesToBeUsed, bool $ignoreForceCoversAnnotation): void
    {
        if ($linesToBeCovered === false ||
            ($this->forceCoversAnnotation && empty($linesToBeCovered) && !$ignoreForceCoversAnnotation)) {
            if ($this->checkForMissingCoversAnnotation) {
                throw new MissingCoversAnnotationException;
            }

            $data = [];
=======
     * @param  array                                                 $data
     * @param  mixed                                                 $linesToBeCovered
     * @param  array                                                 $linesToBeUsed
     * @throws PHP_CodeCoverage_Exception_UnintentionallyCoveredCode
     */
    private function applyCoversAnnotationFilter(array &$data, $linesToBeCovered, array $linesToBeUsed)
    {
        if ($linesToBeCovered === false ||
            ($this->forceCoversAnnotation && empty($linesToBeCovered))) {
            $data = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            return;
        }

        if (empty($linesToBeCovered)) {
            return;
        }

<<<<<<< HEAD
        if ($this->checkForUnintentionallyCoveredCode &&
            (!$this->currentId instanceof TestCase ||
            (!$this->currentId->isMedium() && !$this->currentId->isLarge()))) {
            $this->performUnintentionallyCoveredCodeCheck($data, $linesToBeCovered, $linesToBeUsed);
        }

        if ($this->checkForUnexecutedCoveredCode) {
            $this->performUnexecutedCoveredCodeCheck($data, $linesToBeCovered, $linesToBeUsed);
        }

        $data = \array_intersect_key($data, $linesToBeCovered);

        foreach (\array_keys($data) as $filename) {
            $_linesToBeCovered = \array_flip($linesToBeCovered[$filename]);
            $data[$filename]   = \array_intersect_key($data[$filename], $_linesToBeCovered);
        }
    }

    private function applyWhitelistFilter(array &$data): void
    {
        foreach (\array_keys($data) as $filename) {
=======
        if ($this->checkForUnintentionallyCoveredCode) {
            $this->performUnintentionallyCoveredCodeCheck(
                $data,
                $linesToBeCovered,
                $linesToBeUsed
            );
        }

        $data = array_intersect_key($data, $linesToBeCovered);

        foreach (array_keys($data) as $filename) {
            $_linesToBeCovered = array_flip($linesToBeCovered[$filename]);

            $data[$filename] = array_intersect_key(
                $data[$filename],
                $_linesToBeCovered
            );
        }
    }

    /**
     * Applies the blacklist/whitelist filtering.
     *
     * @param array $data
     */
    private function applyListsFilter(array &$data)
    {
        foreach (array_keys($data) as $filename) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if ($this->filter->isFiltered($filename)) {
                unset($data[$filename]);
            }
        }
    }

    /**
<<<<<<< HEAD
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     */
    private function applyIgnoredLinesFilter(array &$data): void
    {
        foreach (\array_keys($data) as $filename) {
=======
     * Applies the "ignored lines" filtering.
     *
     * @param array $data
     */
    private function applyIgnoredLinesFilter(array &$data)
    {
        foreach (array_keys($data) as $filename) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if (!$this->filter->isFile($filename)) {
                continue;
            }

            foreach ($this->getLinesToBeIgnored($filename) as $line) {
                unset($data[$filename][$line]);
            }
        }
    }

<<<<<<< HEAD
    private function initializeFilesThatAreSeenTheFirstTime(array $data): void
    {
        foreach ($data as $file => $lines) {
            if (!isset($this->data[$file]) && $this->filter->isFile($file)) {
                $this->data[$file] = [];

                foreach ($lines as $k => $v) {
                    $this->data[$file][$k] = $v === -2 ? null : [];
=======
    /**
     * @param array $data
     * @since Method available since Release 1.1.0
     */
    private function initializeFilesThatAreSeenTheFirstTime(array $data)
    {
        foreach ($data as $file => $lines) {
            if ($this->filter->isFile($file) && !isset($this->data[$file])) {
                $this->data[$file] = array();

                foreach ($lines as $k => $v) {
                    $this->data[$file][$k] = $v == -2 ? null : array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                }
            }
        }
    }

    /**
<<<<<<< HEAD
     * @throws CoveredCodeNotExecutedException
     * @throws InvalidArgumentException
     * @throws MissingCoversAnnotationException
     * @throws RuntimeException
     * @throws UnintentionallyCoveredCodeException
     * @throws \ReflectionException
     */
    private function addUncoveredFilesFromWhitelist(): void
    {
        $data           = [];
        $uncoveredFiles = \array_diff(
            $this->filter->getWhitelist(),
            \array_keys($this->data)
        );

        foreach ($uncoveredFiles as $uncoveredFile) {
            if (!\file_exists($uncoveredFile)) {
                continue;
            }

            $data[$uncoveredFile] = [];

            $lines = \count(\file($uncoveredFile));

            for ($i = 1; $i <= $lines; $i++) {
                $data[$uncoveredFile][$i] = Driver::LINE_NOT_EXECUTED;
=======
     * Processes whitelisted files that are not covered.
     */
    private function addUncoveredFilesFromWhitelist()
    {
        $data           = array();
        $uncoveredFiles = array_diff(
            $this->filter->getWhitelist(),
            array_keys($this->data)
        );

        foreach ($uncoveredFiles as $uncoveredFile) {
            if (!file_exists($uncoveredFile)) {
                continue;
            }

            if ($this->processUncoveredFilesFromWhitelist) {
                $this->processUncoveredFileFromWhitelist(
                    $uncoveredFile,
                    $data,
                    $uncoveredFiles
                );
            } else {
                $data[$uncoveredFile] = array();

                $lines = count(file($uncoveredFile));

                for ($i = 1; $i <= $lines; $i++) {
                    $data[$uncoveredFile][$i] = PHP_CodeCoverage_Driver::LINE_NOT_EXECUTED;
                }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }

        $this->append($data, 'UNCOVERED_FILES_FROM_WHITELIST');
    }

<<<<<<< HEAD
    private function getLinesToBeIgnored(string $fileName): array
    {
        if (isset($this->ignoredLines[$fileName])) {
            return $this->ignoredLines[$fileName];
        }

        try {
            return $this->getLinesToBeIgnoredInner($fileName);
        } catch (\OutOfBoundsException $e) {
            // This can happen with PHP_Token_Stream if the file is syntactically invalid,
            // and probably affects a file that wasn't executed.
            return [];
        }
    }

    private function getLinesToBeIgnoredInner(string $fileName): array
    {
        $this->ignoredLines[$fileName] = [];

        $lines = \file($fileName);

        foreach ($lines as $index => $line) {
            if (!\trim($line)) {
                $this->ignoredLines[$fileName][] = $index + 1;
            }
        }

        if ($this->cacheTokens) {
            $tokens = \PHP_Token_Stream_CachingFactory::get($fileName);
        } else {
            $tokens = new \PHP_Token_Stream($fileName);
        }

        foreach ($tokens->getInterfaces() as $interface) {
            $interfaceStartLine = $interface['startLine'];
            $interfaceEndLine   = $interface['endLine'];

            foreach (\range($interfaceStartLine, $interfaceEndLine) as $line) {
                $this->ignoredLines[$fileName][] = $line;
            }
        }

        foreach (\array_merge($tokens->getClasses(), $tokens->getTraits()) as $classOrTrait) {
            $classOrTraitStartLine = $classOrTrait['startLine'];
            $classOrTraitEndLine   = $classOrTrait['endLine'];

            if (empty($classOrTrait['methods'])) {
                foreach (\range($classOrTraitStartLine, $classOrTraitEndLine) as $line) {
                    $this->ignoredLines[$fileName][] = $line;
                }

                continue;
            }

            $firstMethod          = \array_shift($classOrTrait['methods']);
            $firstMethodStartLine = $firstMethod['startLine'];
            $lastMethodEndLine    = $firstMethod['endLine'];

            do {
                $lastMethod = \array_pop($classOrTrait['methods']);
            } while ($lastMethod !== null && 0 === \strpos($lastMethod['signature'], 'anonymousFunction'));

            if ($lastMethod !== null) {
                $lastMethodEndLine = $lastMethod['endLine'];
            }

            foreach (\range($classOrTraitStartLine, $firstMethodStartLine) as $line) {
                $this->ignoredLines[$fileName][] = $line;
            }

            foreach (\range($lastMethodEndLine + 1, $classOrTraitEndLine) as $line) {
                $this->ignoredLines[$fileName][] = $line;
            }
        }

        if ($this->disableIgnoredLines) {
            $this->ignoredLines[$fileName] = \array_unique($this->ignoredLines[$fileName]);
            \sort($this->ignoredLines[$fileName]);

            return $this->ignoredLines[$fileName];
        }

        $ignore = false;
        $stop   = false;

        foreach ($tokens->tokens() as $token) {
            switch (\get_class($token)) {
                case \PHP_Token_COMMENT::class:
                case \PHP_Token_DOC_COMMENT::class:
                    $_token = \trim((string) $token);
                    $_line  = \trim($lines[$token->getLine() - 1]);

                    if ($_token === '// @codeCoverageIgnore' ||
                        $_token === '//@codeCoverageIgnore') {
                        $ignore = true;
                        $stop   = true;
                    } elseif ($_token === '// @codeCoverageIgnoreStart' ||
                        $_token === '//@codeCoverageIgnoreStart') {
                        $ignore = true;
                    } elseif ($_token === '// @codeCoverageIgnoreEnd' ||
                        $_token === '//@codeCoverageIgnoreEnd') {
                        $stop = true;
                    }

                    if (!$ignore) {
                        $start = $token->getLine();
                        $end   = $start + \substr_count((string) $token, "\n");

                        // Do not ignore the first line when there is a token
                        // before the comment
                        if (0 !== \strpos($_token, $_line)) {
                            $start++;
                        }

                        for ($i = $start; $i < $end; $i++) {
                            $this->ignoredLines[$fileName][] = $i;
                        }

                        // A DOC_COMMENT token or a COMMENT token starting with "/*"
                        // does not contain the final \n character in its text
                        if (isset($lines[$i - 1]) && 0 === \strpos($_token, '/*') && '*/' === \substr(\trim($lines[$i - 1]), -2)) {
                            $this->ignoredLines[$fileName][] = $i;
                        }
                    }

                    break;

                case \PHP_Token_INTERFACE::class:
                case \PHP_Token_TRAIT::class:
                case \PHP_Token_CLASS::class:
                case \PHP_Token_FUNCTION::class:
                    /* @var \PHP_Token_Interface $token */

                    $docblock = (string) $token->getDocblock();

                    $this->ignoredLines[$fileName][] = $token->getLine();

                    if (\strpos($docblock, '@codeCoverageIgnore') || ($this->ignoreDeprecatedCode && \strpos($docblock, '@deprecated'))) {
                        $endLine = $token->getEndLine();

                        for ($i = $token->getLine(); $i <= $endLine; $i++) {
                            $this->ignoredLines[$fileName][] = $i;
                        }
                    }

                    break;

                /* @noinspection PhpMissingBreakStatementInspection */
                case \PHP_Token_NAMESPACE::class:
                    $this->ignoredLines[$fileName][] = $token->getEndLine();

                // Intentional fallthrough
                case \PHP_Token_DECLARE::class:
                case \PHP_Token_OPEN_TAG::class:
                case \PHP_Token_CLOSE_TAG::class:
                case \PHP_Token_USE::class:
                case \PHP_Token_USE_FUNCTION::class:
                    $this->ignoredLines[$fileName][] = $token->getLine();

                    break;
            }

            if ($ignore) {
                $this->ignoredLines[$fileName][] = $token->getLine();

                if ($stop) {
                    $ignore = false;
                    $stop   = false;
                }
            }
        }

        $this->ignoredLines[$fileName][] = \count($lines) + 1;

        $this->ignoredLines[$fileName] = \array_unique(
            $this->ignoredLines[$fileName]
        );

        $this->ignoredLines[$fileName] = \array_unique($this->ignoredLines[$fileName]);
        \sort($this->ignoredLines[$fileName]);

        return $this->ignoredLines[$fileName];
    }

    /**
     * @throws \ReflectionException
     * @throws UnintentionallyCoveredCodeException
     */
    private function performUnintentionallyCoveredCodeCheck(array &$data, array $linesToBeCovered, array $linesToBeUsed): void
=======
    /**
     * @param string $uncoveredFile
     * @param array  $data
     * @param array  $uncoveredFiles
     */
    private function processUncoveredFileFromWhitelist($uncoveredFile, array &$data, array $uncoveredFiles)
    {
        $this->driver->start();
        include_once $uncoveredFile;
        $coverage = $this->driver->stop();

        foreach ($coverage as $file => $fileCoverage) {
            if (!isset($data[$file]) &&
                in_array($file, $uncoveredFiles)) {
                foreach (array_keys($fileCoverage) as $key) {
                    if ($fileCoverage[$key] == PHP_CodeCoverage_Driver::LINE_EXECUTED) {
                        $fileCoverage[$key] = PHP_CodeCoverage_Driver::LINE_NOT_EXECUTED;
                    }
                }

                $data[$file] = $fileCoverage;
            }
        }
    }

    /**
     * Returns the lines of a source file that should be ignored.
     *
     * @param  string                     $filename
     * @return array
     * @throws PHP_CodeCoverage_Exception
     * @since  Method available since Release 2.0.0
     */
    private function getLinesToBeIgnored($filename)
    {
        if (!is_string($filename)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'string'
            );
        }

        if (!isset($this->ignoredLines[$filename])) {
            $this->ignoredLines[$filename] = array();

            if ($this->disableIgnoredLines) {
                return $this->ignoredLines[$filename];
            }

            $ignore   = false;
            $stop     = false;
            $lines    = file($filename);
            $numLines = count($lines);

            foreach ($lines as $index => $line) {
                if (!trim($line)) {
                    $this->ignoredLines[$filename][] = $index + 1;
                }
            }

            if ($this->cacheTokens) {
                $tokens = PHP_Token_Stream_CachingFactory::get($filename);
            } else {
                $tokens = new PHP_Token_Stream($filename);
            }

            $classes = array_merge($tokens->getClasses(), $tokens->getTraits());
            $tokens  = $tokens->tokens();

            foreach ($tokens as $token) {
                switch (get_class($token)) {
                    case 'PHP_Token_COMMENT':
                    case 'PHP_Token_DOC_COMMENT':
                        $_token = trim($token);
                        $_line  = trim($lines[$token->getLine() - 1]);

                        if ($_token == '// @codeCoverageIgnore' ||
                            $_token == '//@codeCoverageIgnore') {
                            $ignore = true;
                            $stop   = true;
                        } elseif ($_token == '// @codeCoverageIgnoreStart' ||
                            $_token == '//@codeCoverageIgnoreStart') {
                            $ignore = true;
                        } elseif ($_token == '// @codeCoverageIgnoreEnd' ||
                            $_token == '//@codeCoverageIgnoreEnd') {
                            $stop = true;
                        }

                        if (!$ignore) {
                            $start = $token->getLine();
                            $end   = $start + substr_count($token, "\n");

                            // Do not ignore the first line when there is a token
                            // before the comment
                            if (0 !== strpos($_token, $_line)) {
                                $start++;
                            }

                            for ($i = $start; $i < $end; $i++) {
                                $this->ignoredLines[$filename][] = $i;
                            }

                            // A DOC_COMMENT token or a COMMENT token starting with "/*"
                            // does not contain the final \n character in its text
                            if (isset($lines[$i-1]) && 0 === strpos($_token, '/*') && '*/' === substr(trim($lines[$i-1]), -2)) {
                                $this->ignoredLines[$filename][] = $i;
                            }
                        }
                        break;

                    case 'PHP_Token_INTERFACE':
                    case 'PHP_Token_TRAIT':
                    case 'PHP_Token_CLASS':
                    case 'PHP_Token_FUNCTION':
                        $docblock = $token->getDocblock();

                        $this->ignoredLines[$filename][] = $token->getLine();

                        if (strpos($docblock, '@codeCoverageIgnore') || strpos($docblock, '@deprecated')) {
                            $endLine = $token->getEndLine();

                            for ($i = $token->getLine(); $i <= $endLine; $i++) {
                                $this->ignoredLines[$filename][] = $i;
                            }
                        } elseif ($token instanceof PHP_Token_INTERFACE ||
                            $token instanceof PHP_Token_TRAIT ||
                            $token instanceof PHP_Token_CLASS) {
                            if (empty($classes[$token->getName()]['methods'])) {
                                for ($i = $token->getLine();
                                     $i <= $token->getEndLine();
                                     $i++) {
                                    $this->ignoredLines[$filename][] = $i;
                                }
                            } else {
                                $firstMethod = array_shift(
                                    $classes[$token->getName()]['methods']
                                );

                                do {
                                    $lastMethod = array_pop(
                                        $classes[$token->getName()]['methods']
                                    );
                                } while ($lastMethod !== null &&
                                    substr($lastMethod['signature'], 0, 18) == 'anonymous function');

                                if ($lastMethod === null) {
                                    $lastMethod = $firstMethod;
                                }

                                for ($i = $token->getLine();
                                     $i < $firstMethod['startLine'];
                                     $i++) {
                                    $this->ignoredLines[$filename][] = $i;
                                }

                                for ($i = $token->getEndLine();
                                     $i > $lastMethod['endLine'];
                                     $i--) {
                                    $this->ignoredLines[$filename][] = $i;
                                }
                            }
                        }
                        break;

                    case 'PHP_Token_NAMESPACE':
                        $this->ignoredLines[$filename][] = $token->getEndLine();

                    // Intentional fallthrough
                    case 'PHP_Token_OPEN_TAG':
                    case 'PHP_Token_CLOSE_TAG':
                    case 'PHP_Token_USE':
                        $this->ignoredLines[$filename][] = $token->getLine();
                        break;
                }

                if ($ignore) {
                    $this->ignoredLines[$filename][] = $token->getLine();

                    if ($stop) {
                        $ignore = false;
                        $stop   = false;
                    }
                }
            }

            $this->ignoredLines[$filename][] = $numLines + 1;

            $this->ignoredLines[$filename] = array_unique(
                $this->ignoredLines[$filename]
            );

            sort($this->ignoredLines[$filename]);
        }

        return $this->ignoredLines[$filename];
    }

    /**
     * @param  array                                                 $data
     * @param  array                                                 $linesToBeCovered
     * @param  array                                                 $linesToBeUsed
     * @throws PHP_CodeCoverage_Exception_UnintentionallyCoveredCode
     * @since Method available since Release 2.0.0
     */
    private function performUnintentionallyCoveredCodeCheck(array &$data, array $linesToBeCovered, array $linesToBeUsed)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $allowedLines = $this->getAllowedLines(
            $linesToBeCovered,
            $linesToBeUsed
        );

<<<<<<< HEAD
        $unintentionallyCoveredUnits = [];

        foreach ($data as $file => $_data) {
            foreach ($_data as $line => $flag) {
                if ($flag === 1 && !isset($allowedLines[$file][$line])) {
                    $unintentionallyCoveredUnits[] = $this->wizard->lookup($file, $line);
=======
        $message = '';

        foreach ($data as $file => $_data) {
            foreach ($_data as $line => $flag) {
                if ($flag == 1 &&
                    (!isset($allowedLines[$file]) ||
                        !isset($allowedLines[$file][$line]))) {
                    $message .= sprintf(
                        '- %s:%d' . PHP_EOL,
                        $file,
                        $line
                    );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                }
            }
        }

<<<<<<< HEAD
        $unintentionallyCoveredUnits = $this->processUnintentionallyCoveredUnits($unintentionallyCoveredUnits);

        if (!empty($unintentionallyCoveredUnits)) {
            throw new UnintentionallyCoveredCodeException(
                $unintentionallyCoveredUnits
=======
        if (!empty($message)) {
            throw new PHP_CodeCoverage_Exception_UnintentionallyCoveredCode(
                $message
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            );
        }
    }

    /**
<<<<<<< HEAD
     * @throws CoveredCodeNotExecutedException
     */
    private function performUnexecutedCoveredCodeCheck(array &$data, array $linesToBeCovered, array $linesToBeUsed): void
    {
        $executedCodeUnits = $this->coverageToCodeUnits($data);
        $message           = '';

        foreach ($this->linesToCodeUnits($linesToBeCovered) as $codeUnit) {
            if (!\in_array($codeUnit, $executedCodeUnits)) {
                $message .= \sprintf(
                    '- %s is expected to be executed (@covers) but was not executed' . "\n",
                    $codeUnit
                );
            }
        }

        foreach ($this->linesToCodeUnits($linesToBeUsed) as $codeUnit) {
            if (!\in_array($codeUnit, $executedCodeUnits)) {
                $message .= \sprintf(
                    '- %s is expected to be executed (@uses) but was not executed' . "\n",
                    $codeUnit
                );
            }
        }

        if (!empty($message)) {
            throw new CoveredCodeNotExecutedException($message);
        }
    }

    private function getAllowedLines(array $linesToBeCovered, array $linesToBeUsed): array
    {
        $allowedLines = [];

        foreach (\array_keys($linesToBeCovered) as $file) {
            if (!isset($allowedLines[$file])) {
                $allowedLines[$file] = [];
            }

            $allowedLines[$file] = \array_merge(
=======
     * @param  array $linesToBeCovered
     * @param  array $linesToBeUsed
     * @return array
     * @since Method available since Release 2.0.0
     */
    private function getAllowedLines(array $linesToBeCovered, array $linesToBeUsed)
    {
        $allowedLines = array();

        foreach (array_keys($linesToBeCovered) as $file) {
            if (!isset($allowedLines[$file])) {
                $allowedLines[$file] = array();
            }

            $allowedLines[$file] = array_merge(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $allowedLines[$file],
                $linesToBeCovered[$file]
            );
        }

<<<<<<< HEAD
        foreach (\array_keys($linesToBeUsed) as $file) {
            if (!isset($allowedLines[$file])) {
                $allowedLines[$file] = [];
            }

            $allowedLines[$file] = \array_merge(
=======
        foreach (array_keys($linesToBeUsed) as $file) {
            if (!isset($allowedLines[$file])) {
                $allowedLines[$file] = array();
            }

            $allowedLines[$file] = array_merge(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $allowedLines[$file],
                $linesToBeUsed[$file]
            );
        }

<<<<<<< HEAD
        foreach (\array_keys($allowedLines) as $file) {
            $allowedLines[$file] = \array_flip(
                \array_unique($allowedLines[$file])
=======
        foreach (array_keys($allowedLines) as $file) {
            $allowedLines[$file] = array_flip(
                array_unique($allowedLines[$file])
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            );
        }

        return $allowedLines;
    }

    /**
<<<<<<< HEAD
     * @throws RuntimeException
     */
    private function selectDriver(Filter $filter): Driver
    {
        $runtime = new Runtime;

        if ($runtime->hasPHPDBGCodeCoverage()) {
            return new PHPDBG;
        }

        if ($runtime->hasPCOV()) {
            return new PCOV;
        }

        if ($runtime->hasXdebug()) {
            return new Xdebug($filter);
        }

        throw new RuntimeException('No code coverage driver available');
    }

    private function processUnintentionallyCoveredUnits(array $unintentionallyCoveredUnits): array
    {
        $unintentionallyCoveredUnits = \array_unique($unintentionallyCoveredUnits);
        \sort($unintentionallyCoveredUnits);

        foreach (\array_keys($unintentionallyCoveredUnits) as $k => $v) {
            $unit = \explode('::', $unintentionallyCoveredUnits[$k]);

            if (\count($unit) !== 2) {
                continue;
            }

            $class = new \ReflectionClass($unit[0]);

            foreach ($this->unintentionallyCoveredSubclassesWhitelist as $whitelisted) {
                if ($class->isSubclassOf($whitelisted)) {
                    unset($unintentionallyCoveredUnits[$k]);

                    break;
                }
            }
        }

        return \array_values($unintentionallyCoveredUnits);
    }

    /**
     * @throws CoveredCodeNotExecutedException
     * @throws InvalidArgumentException
     * @throws MissingCoversAnnotationException
     * @throws RuntimeException
     * @throws UnintentionallyCoveredCodeException
     * @throws \ReflectionException
     */
    private function initializeData(): void
    {
        $this->isInitialized = true;

        if ($this->processUncoveredFilesFromWhitelist) {
            $this->shouldCheckForDeadAndUnused = false;

            $this->driver->start();

            foreach ($this->filter->getWhitelist() as $file) {
                if ($this->filter->isFile($file)) {
                    include_once $file;
                }
            }

            $data = [];

            foreach ($this->driver->stop() as $file => $fileCoverage) {
                if ($this->filter->isFiltered($file)) {
                    continue;
                }

                foreach (\array_keys($fileCoverage) as $key) {
                    if ($fileCoverage[$key] === Driver::LINE_EXECUTED) {
                        $fileCoverage[$key] = Driver::LINE_NOT_EXECUTED;
                    }
                }

                $data[$file] = $fileCoverage;
            }

            $this->append($data, 'UNCOVERED_FILES_FROM_WHITELIST');
        }
    }

    private function coverageToCodeUnits(array $data): array
    {
        $codeUnits = [];

        foreach ($data as $filename => $lines) {
            foreach ($lines as $line => $flag) {
                if ($flag === 1) {
                    $codeUnits[] = $this->wizard->lookup($filename, $line);
                }
            }
        }

        return \array_unique($codeUnits);
    }

    private function linesToCodeUnits(array $data): array
    {
        $codeUnits = [];

        foreach ($data as $filename => $lines) {
            foreach ($lines as $line) {
                $codeUnits[] = $this->wizard->lookup($filename, $line);
            }
        }

        return \array_unique($codeUnits);
=======
     * @return PHP_CodeCoverage_Driver
     * @throws PHP_CodeCoverage_Exception
     */
    private function selectDriver()
    {
        $runtime = new Runtime;

        if (!$runtime->canCollectCodeCoverage()) {
            throw new PHP_CodeCoverage_Exception('No code coverage driver available');
        }

        if ($runtime->isHHVM()) {
            return new PHP_CodeCoverage_Driver_HHVM;
        } elseif ($runtime->isPHPDBG()) {
            return new PHP_CodeCoverage_Driver_PHPDBG;
        } else {
            return new PHP_CodeCoverage_Driver_Xdebug;
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
