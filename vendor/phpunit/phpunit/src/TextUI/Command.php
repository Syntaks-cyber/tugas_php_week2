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

use const PATH_SEPARATOR;
use const PHP_EOL;
use const STDIN;
use function array_keys;
use function assert;
use function class_exists;
use function explode;
use function extension_loaded;
use function fgets;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function getcwd;
use function ini_get;
use function ini_set;
use function is_callable;
use function is_dir;
use function is_file;
use function is_numeric;
use function is_string;
use function printf;
use function realpath;
use function sort;
use function sprintf;
use function str_replace;
use function stream_resolve_include_path;
use function strrpos;
use function substr;
use function trim;
use function version_compare;
use PharIo\Manifest\ApplicationName;
use PharIo\Manifest\Exception as ManifestException;
use PharIo\Manifest\ManifestLoader;
use PharIo\Version\Version as PharIoVersion;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Runner\StandardTestSuiteLoader;
use PHPUnit\Runner\TestSuiteLoader;
use PHPUnit\Runner\TestSuiteSorter;
use PHPUnit\Runner\Version;
use PHPUnit\Util\Configuration;
use PHPUnit\Util\ConfigurationGenerator;
use PHPUnit\Util\FileLoader;
use PHPUnit\Util\Filesystem;
use PHPUnit\Util\Getopt;
use PHPUnit\Util\Log\TeamCity;
use PHPUnit\Util\Printer;
use PHPUnit\Util\TestDox\CliTestDoxPrinter;
use PHPUnit\Util\TextTestListRenderer;
use PHPUnit\Util\XmlTestListRenderer;
use ReflectionClass;
use ReflectionException;
use SebastianBergmann\FileIterator\Facade as FileIteratorFacade;
use Throwable;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * A TestRunner for the Command Line Interface (CLI)
 * PHP SAPI Module.
<<<<<<< HEAD
 */
class Command
{
    /**
     * @var array<string,mixed>
     */
    protected $arguments = [
        'listGroups'              => false,
        'listSuites'              => false,
        'listTests'               => false,
        'listTestsXml'            => false,
        'loader'                  => null,
        'useDefaultConfiguration' => true,
        'loadedExtensions'        => [],
        'notLoadedExtensions'     => [],
    ];

    /**
     * @var array<string,mixed>
     */
    protected $options = [];

    /**
     * @var array<string,mixed>
     */
    protected $longOptions = [
        'atleast-version='          => null,
        'prepend='                  => null,
        'bootstrap='                => null,
        'cache-result'              => null,
        'do-not-cache-result'       => null,
        'cache-result-file='        => null,
        'check-version'             => null,
        'colors=='                  => null,
        'columns='                  => null,
        'configuration='            => null,
        'coverage-clover='          => null,
        'coverage-crap4j='          => null,
        'coverage-html='            => null,
        'coverage-php='             => null,
        'coverage-text=='           => null,
        'coverage-xml='             => null,
        'debug'                     => null,
        'disallow-test-output'      => null,
        'disallow-resource-usage'   => null,
        'disallow-todo-tests'       => null,
        'default-time-limit='       => null,
        'enforce-time-limit'        => null,
        'exclude-group='            => null,
        'filter='                   => null,
        'generate-configuration'    => null,
        'globals-backup'            => null,
        'group='                    => null,
        'help'                      => null,
        'resolve-dependencies'      => null,
        'ignore-dependencies'       => null,
        'include-path='             => null,
        'list-groups'               => null,
        'list-suites'               => null,
        'list-tests'                => null,
        'list-tests-xml='           => null,
        'loader='                   => null,
        'log-junit='                => null,
        'log-teamcity='             => null,
        'no-configuration'          => null,
        'no-coverage'               => null,
        'no-logging'                => null,
        'no-interaction'            => null,
        'no-extensions'             => null,
        'order-by='                 => null,
        'printer='                  => null,
        'process-isolation'         => null,
        'repeat='                   => null,
        'dont-report-useless-tests' => null,
        'random-order'              => null,
        'random-order-seed='        => null,
        'reverse-order'             => null,
        'reverse-list'              => null,
        'static-backup'             => null,
        'stderr'                    => null,
        'stop-on-defect'            => null,
        'stop-on-error'             => null,
        'stop-on-failure'           => null,
        'stop-on-warning'           => null,
        'stop-on-incomplete'        => null,
        'stop-on-risky'             => null,
        'stop-on-skipped'           => null,
        'fail-on-warning'           => null,
        'fail-on-risky'             => null,
        'strict-coverage'           => null,
        'disable-coverage-ignore'   => null,
        'strict-global-state'       => null,
        'teamcity'                  => null,
        'testdox'                   => null,
        'testdox-group='            => null,
        'testdox-exclude-group='    => null,
        'testdox-html='             => null,
        'testdox-text='             => null,
        'testdox-xml='              => null,
        'test-suffix='              => null,
        'testsuite='                => null,
        'verbose'                   => null,
        'version'                   => null,
        'whitelist='                => null,
        'dump-xdebug-filter='       => null,
    ];

    /**
     * @var @psalm-var list<string>
     */
    private $warnings = [];
=======
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_TextUI_Command
{
    /**
     * @var array
     */
    protected $arguments = array(
        'listGroups'              => false,
        'loader'                  => null,
        'useDefaultConfiguration' => true
    );

    /**
     * @var array
     */
    protected $options = array();

    /**
     * @var array
     */
    protected $longOptions = array(
        'colors=='             => null,
        'bootstrap='           => null,
        'columns='             => null,
        'configuration='       => null,
        'coverage-clover='     => null,
        'coverage-crap4j='     => null,
        'coverage-html='       => null,
        'coverage-php='        => null,
        'coverage-text=='      => null,
        'coverage-xml='        => null,
        'debug'                => null,
        'exclude-group='       => null,
        'filter='              => null,
        'testsuite='           => null,
        'group='               => null,
        'help'                 => null,
        'include-path='        => null,
        'list-groups'          => null,
        'loader='              => null,
        'log-json='            => null,
        'log-junit='           => null,
        'log-tap='             => null,
        'process-isolation'    => null,
        'repeat='              => null,
        'stderr'               => null,
        'stop-on-error'        => null,
        'stop-on-failure'      => null,
        'stop-on-incomplete'   => null,
        'stop-on-risky'        => null,
        'stop-on-skipped'      => null,
        'report-useless-tests' => null,
        'strict-coverage'      => null,
        'disallow-test-output' => null,
        'enforce-time-limit'   => null,
        'disallow-todo-tests'  => null,
        'strict-global-state'  => null,
        'strict'               => null,
        'tap'                  => null,
        'testdox'              => null,
        'testdox-html='        => null,
        'testdox-text='        => null,
        'test-suffix='         => null,
        'no-configuration'     => null,
        'no-coverage'          => null,
        'no-globals-backup'    => null,
        'printer='             => null,
        'static-backup'        => null,
        'verbose'              => null,
        'version'              => null
    );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
    private $versionStringPrinted = false;

    /**
<<<<<<< HEAD
     * @throws \PHPUnit\Framework\Exception
     */
    public static function main(bool $exit = true): int
    {
        return (new static)->run($_SERVER['argv'], $exit);
    }

    /**
     * @throws Exception
     */
    public function run(array $argv, bool $exit = true): int
=======
     * @param bool $exit
     */
    public static function main($exit = true)
    {
        $command = new static;

        return $command->run($_SERVER['argv'], $exit);
    }

    /**
     * @param array $argv
     * @param bool  $exit
     *
     * @return int
     */
    public function run(array $argv, $exit = true)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->handleArguments($argv);

        $runner = $this->createRunner();

<<<<<<< HEAD
        if ($this->arguments['test'] instanceof Test) {
=======
        if (is_object($this->arguments['test']) &&
            $this->arguments['test'] instanceof PHPUnit_Framework_Test) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $suite = $this->arguments['test'];
        } else {
            $suite = $runner->getTest(
                $this->arguments['test'],
                $this->arguments['testFile'],
                $this->arguments['testSuffixes']
            );
        }

        if ($this->arguments['listGroups']) {
<<<<<<< HEAD
            return $this->handleListGroups($suite, $exit);
        }

        if ($this->arguments['listSuites']) {
            return $this->handleListSuites($exit);
        }

        if ($this->arguments['listTests']) {
            return $this->handleListTests($suite, $exit);
        }

        if ($this->arguments['listTestsXml']) {
            return $this->handleListTestsXml($suite, $this->arguments['listTestsXml'], $exit);
        }

        unset($this->arguments['test'], $this->arguments['testFile']);

        try {
            $result = $runner->doRun($suite, $this->arguments, $this->warnings, $exit);
        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
        }

        $return = TestRunner::FAILURE_EXIT;

        if (isset($result) && $result->wasSuccessful()) {
            $return = TestRunner::SUCCESS_EXIT;
        } elseif (!isset($result) || $result->errorCount() > 0) {
            $return = TestRunner::EXCEPTION_EXIT;
        }

        if ($exit) {
            exit($return);
        }

        return $return;
=======
            $this->printVersionString();

            print "Available test group(s):\n";

            $groups = $suite->getGroups();
            sort($groups);

            foreach ($groups as $group) {
                print " - $group\n";
            }

            if ($exit) {
                exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
            } else {
                return PHPUnit_TextUI_TestRunner::SUCCESS_EXIT;
            }
        }

        unset($this->arguments['test']);
        unset($this->arguments['testFile']);

        try {
            $result = $runner->doRun($suite, $this->arguments);
        } catch (PHPUnit_Framework_Exception $e) {
            print $e->getMessage() . "\n";
        }

        $ret = PHPUnit_TextUI_TestRunner::FAILURE_EXIT;

        if (isset($result) && $result->wasSuccessful()) {
            $ret = PHPUnit_TextUI_TestRunner::SUCCESS_EXIT;
        } elseif (!isset($result) || $result->errorCount() > 0) {
            $ret = PHPUnit_TextUI_TestRunner::EXCEPTION_EXIT;
        }

        if ($exit) {
            exit($ret);
        } else {
            return $ret;
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Create a TestRunner, override in subclasses.
<<<<<<< HEAD
     */
    protected function createRunner(): TestRunner
    {
        return new TestRunner($this->arguments['loader']);
=======
     *
     * @return PHPUnit_TextUI_TestRunner
     *
     * @since  Method available since Release 3.6.0
     */
    protected function createRunner()
    {
        return new PHPUnit_TextUI_TestRunner($this->arguments['loader']);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Handles the command-line arguments.
     *
<<<<<<< HEAD
     * A child class of PHPUnit\TextUI\Command can hook into the argument
=======
     * A child class of PHPUnit_TextUI_Command can hook into the argument
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * parsing by adding the switch(es) to the $longOptions array and point to a
     * callback method that handles the switch(es) in the child class like this
     *
     * <code>
     * <?php
<<<<<<< HEAD
     * class MyCommand extends PHPUnit\TextUI\Command
=======
     * class MyCommand extends PHPUnit_TextUI_Command
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * {
     *     public function __construct()
     *     {
     *         // my-switch won't accept a value, it's an on/off
     *         $this->longOptions['my-switch'] = 'myHandler';
     *         // my-secondswitch will accept a value - note the equals sign
     *         $this->longOptions['my-secondswitch='] = 'myOtherHandler';
     *     }
     *
     *     // --my-switch  -> myHandler()
     *     protected function myHandler()
     *     {
     *     }
     *
     *     // --my-secondswitch foo -> myOtherHandler('foo')
     *     protected function myOtherHandler ($value)
     *     {
     *     }
     *
     *     // You will also need this - the static keyword in the
<<<<<<< HEAD
     *     // PHPUnit\TextUI\Command will mean that it'll be
     *     // PHPUnit\TextUI\Command that gets instantiated,
=======
     *     // PHPUnit_TextUI_Command will mean that it'll be
     *     // PHPUnit_TextUI_Command that gets instantiated,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *     // not MyCommand
     *     public static function main($exit = true)
     *     {
     *         $command = new static;
     *
     *         return $command->run($_SERVER['argv'], $exit);
     *     }
     *
     * }
     * </code>
     *
<<<<<<< HEAD
     * @throws Exception
     */
    protected function handleArguments(array $argv): void
    {
        try {
            $this->options = Getopt::parse(
=======
     * @param array $argv
     */
    protected function handleArguments(array $argv)
    {
        if (defined('__PHPUNIT_PHAR__')) {
            $this->longOptions['check-version'] = null;
            $this->longOptions['selfupdate']    = null;
            $this->longOptions['self-update']   = null;
            $this->longOptions['selfupgrade']   = null;
            $this->longOptions['self-upgrade']  = null;
        }

        try {
            $this->options = PHPUnit_Util_Getopt::getopt(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $argv,
                'd:c:hv',
                array_keys($this->longOptions)
            );
<<<<<<< HEAD
        } catch (Exception $t) {
            $this->exitWithErrorMessage($t->getMessage());
=======
        } catch (PHPUnit_Framework_Exception $e) {
            $this->showError($e->getMessage());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        foreach ($this->options[0] as $option) {
            switch ($option[0]) {
                case '--colors':
<<<<<<< HEAD
                    $this->arguments['colors'] = $option[1] ?: ResultPrinter::COLOR_AUTO;

=======
                    $this->arguments['colors'] = $option[1] ?: PHPUnit_TextUI_ResultPrinter::COLOR_AUTO;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--bootstrap':
                    $this->arguments['bootstrap'] = $option[1];
<<<<<<< HEAD

                    break;

                case '--cache-result':
                    $this->arguments['cacheResult'] = true;

                    break;

                case '--do-not-cache-result':
                    $this->arguments['cacheResult'] = false;

                    break;

                case '--cache-result-file':
                    $this->arguments['cacheResultFile'] = $option[1];

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--columns':
                    if (is_numeric($option[1])) {
                        $this->arguments['columns'] = (int) $option[1];
<<<<<<< HEAD
                    } elseif ($option[1] === 'max') {
                        $this->arguments['columns'] = 'max';
                    }

=======
                    } elseif ($option[1] == 'max') {
                        $this->arguments['columns'] = 'max';
                    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case 'c':
                case '--configuration':
                    $this->arguments['configuration'] = $option[1];
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--coverage-clover':
                    $this->arguments['coverageClover'] = $option[1];
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--coverage-crap4j':
                    $this->arguments['coverageCrap4J'] = $option[1];
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--coverage-html':
                    $this->arguments['coverageHtml'] = $option[1];
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--coverage-php':
                    $this->arguments['coveragePHP'] = $option[1];
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--coverage-text':
                    if ($option[1] === null) {
                        $option[1] = 'php://stdout';
                    }

                    $this->arguments['coverageText']                   = $option[1];
                    $this->arguments['coverageTextShowUncoveredFiles'] = false;
                    $this->arguments['coverageTextShowOnlySummary']    = false;
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--coverage-xml':
                    $this->arguments['coverageXml'] = $option[1];
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case 'd':
                    $ini = explode('=', $option[1]);

                    if (isset($ini[0])) {
                        if (isset($ini[1])) {
                            ini_set($ini[0], $ini[1]);
                        } else {
<<<<<<< HEAD
                            ini_set($ini[0], '1');
                        }
                    }

=======
                            ini_set($ini[0], true);
                        }
                    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--debug':
                    $this->arguments['debug'] = true;
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case 'h':
                case '--help':
                    $this->showHelp();
<<<<<<< HEAD

                    exit(TestRunner::SUCCESS_EXIT);

=======
                    exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--filter':
                    $this->arguments['filter'] = $option[1];
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--testsuite':
                    $this->arguments['testsuite'] = $option[1];
<<<<<<< HEAD

                    break;

                case '--generate-configuration':
                    $this->printVersionString();

                    print 'Generating phpunit.xml in ' . getcwd() . PHP_EOL . PHP_EOL;

                    print 'Bootstrap script (relative to path shown above; default: vendor/autoload.php): ';
                    $bootstrapScript = trim(fgets(STDIN));

                    print 'Tests directory (relative to path shown above; default: tests): ';
                    $testsDirectory = trim(fgets(STDIN));

                    print 'Source directory (relative to path shown above; default: src): ';
                    $src = trim(fgets(STDIN));

                    print 'Cache directory (relative to path shown above; default: .phpunit.cache): ';
                    $cacheDirectory = trim(fgets(STDIN));

                    if ($bootstrapScript === '') {
                        $bootstrapScript = 'vendor/autoload.php';
                    }

                    if ($testsDirectory === '') {
                        $testsDirectory = 'tests';
                    }

                    if ($src === '') {
                        $src = 'src';
                    }

                    if ($cacheDirectory === '') {
                        $cacheDirectory = '.phpunit.cache';
                    }

                    $generator = new ConfigurationGenerator;

                    file_put_contents(
                        'phpunit.xml',
                        $generator->generateDefaultConfiguration(
                            Version::series(),
                            $bootstrapScript,
                            $testsDirectory,
                            $src,
                            $cacheDirectory
                        )
                    );

                    print PHP_EOL . 'Generated phpunit.xml in ' . getcwd() . PHP_EOL;
                    print 'Make sure to exclude the ' . $cacheDirectory . ' directory from version control.' . PHP_EOL;

                    exit(TestRunner::SUCCESS_EXIT);

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--group':
                    $this->arguments['groups'] = explode(',', $option[1]);
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--exclude-group':
                    $this->arguments['excludeGroups'] = explode(
                        ',',
                        $option[1]
                    );
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--test-suffix':
                    $this->arguments['testSuffixes'] = explode(
                        ',',
                        $option[1]
                    );
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--include-path':
                    $includePath = $option[1];
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--list-groups':
                    $this->arguments['listGroups'] = true;
<<<<<<< HEAD

                    break;

                case '--list-suites':
                    $this->arguments['listSuites'] = true;

                    break;

                case '--list-tests':
                    $this->arguments['listTests'] = true;

                    break;

                case '--list-tests-xml':
                    $this->arguments['listTestsXml'] = $option[1];

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--printer':
                    $this->arguments['printer'] = $option[1];
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--loader':
                    $this->arguments['loader'] = $option[1];
<<<<<<< HEAD

=======
                    break;

                case '--log-json':
                    $this->arguments['jsonLogfile'] = $option[1];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--log-junit':
                    $this->arguments['junitLogfile'] = $option[1];
<<<<<<< HEAD

                    break;

                case '--log-teamcity':
                    $this->arguments['teamcityLogfile'] = $option[1];

                    break;

                case '--order-by':
                    $this->handleOrderByOption($option[1]);

=======
                    break;

                case '--log-tap':
                    $this->arguments['tapLogfile'] = $option[1];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--process-isolation':
                    $this->arguments['processIsolation'] = true;
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--repeat':
                    $this->arguments['repeat'] = (int) $option[1];
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--stderr':
                    $this->arguments['stderr'] = true;
<<<<<<< HEAD

                    break;

                case '--stop-on-defect':
                    $this->arguments['stopOnDefect'] = true;

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--stop-on-error':
                    $this->arguments['stopOnError'] = true;
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--stop-on-failure':
                    $this->arguments['stopOnFailure'] = true;
<<<<<<< HEAD

                    break;

                case '--stop-on-warning':
                    $this->arguments['stopOnWarning'] = true;

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--stop-on-incomplete':
                    $this->arguments['stopOnIncomplete'] = true;
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--stop-on-risky':
                    $this->arguments['stopOnRisky'] = true;
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--stop-on-skipped':
                    $this->arguments['stopOnSkipped'] = true;
<<<<<<< HEAD

                    break;

                case '--fail-on-warning':
                    $this->arguments['failOnWarning'] = true;

                    break;

                case '--fail-on-risky':
                    $this->arguments['failOnRisky'] = true;

                    break;

                case '--teamcity':
                    $this->arguments['printer'] = TeamCity::class;

                    break;

                case '--testdox':
                    $this->arguments['printer'] = CliTestDoxPrinter::class;

                    break;

                case '--testdox-group':
                    $this->arguments['testdoxGroups'] = explode(
                        ',',
                        $option[1]
                    );

                    break;

                case '--testdox-exclude-group':
                    $this->arguments['testdoxExcludeGroups'] = explode(
                        ',',
                        $option[1]
                    );

=======
                    break;

                case '--tap':
                    $this->arguments['printer'] = 'PHPUnit_Util_Log_TAP';
                    break;

                case '--testdox':
                    $this->arguments['printer'] = 'PHPUnit_Util_TestDox_ResultPrinter_Text';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--testdox-html':
                    $this->arguments['testdoxHTMLFile'] = $option[1];
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--testdox-text':
                    $this->arguments['testdoxTextFile'] = $option[1];
<<<<<<< HEAD

                    break;

                case '--testdox-xml':
                    $this->arguments['testdoxXMLFile'] = $option[1];

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--no-configuration':
                    $this->arguments['useDefaultConfiguration'] = false;
<<<<<<< HEAD

                    break;

                case '--no-extensions':
                    $this->arguments['noExtensions'] = true;

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--no-coverage':
                    $this->arguments['noCoverage'] = true;
<<<<<<< HEAD

                    break;

                case '--no-logging':
                    $this->arguments['noLogging'] = true;

                    break;

                case '--no-interaction':
                    $this->arguments['noInteraction'] = true;

                    break;

                case '--globals-backup':
                    $this->arguments['backupGlobals'] = true;

=======
                    break;

                case '--no-globals-backup':
                    $this->arguments['backupGlobals'] = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--static-backup':
                    $this->arguments['backupStaticAttributes'] = true;
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case 'v':
                case '--verbose':
                    $this->arguments['verbose'] = true;
<<<<<<< HEAD

                    break;

                case '--atleast-version':
                    if (version_compare(Version::id(), $option[1], '>=')) {
                        exit(TestRunner::SUCCESS_EXIT);
                    }

                    exit(TestRunner::FAILURE_EXIT);

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--version':
                    $this->printVersionString();
<<<<<<< HEAD

                    exit(TestRunner::SUCCESS_EXIT);

                    break;

                case '--dont-report-useless-tests':
                    $this->arguments['reportUselessTests'] = false;

=======
                    exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
                    break;

                case '--report-useless-tests':
                    $this->arguments['reportUselessTests'] = true;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--strict-coverage':
                    $this->arguments['strictCoverage'] = true;
<<<<<<< HEAD

                    break;

                case '--disable-coverage-ignore':
                    $this->arguments['disableCodeCoverageIgnore'] = true;

                    break;

                case '--strict-global-state':
                    $this->arguments['beStrictAboutChangesToGlobalState'] = true;

=======
                    break;

                case '--strict-global-state':
                    $this->arguments['disallowChangesToGlobalState'] = true;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--disallow-test-output':
                    $this->arguments['disallowTestOutput'] = true;
<<<<<<< HEAD

                    break;

                case '--disallow-resource-usage':
                    $this->arguments['beStrictAboutResourceUsageDuringSmallTests'] = true;

                    break;

                case '--default-time-limit':
                    $this->arguments['defaultTimeLimit'] = (int) $option[1];

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--enforce-time-limit':
                    $this->arguments['enforceTimeLimit'] = true;
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--disallow-todo-tests':
                    $this->arguments['disallowTodoAnnotatedTests'] = true;
<<<<<<< HEAD

                    break;

                case '--reverse-list':
                    $this->arguments['reverseList'] = true;

=======
                    break;

                case '--strict':
                    $this->arguments['reportUselessTests']         = true;
                    $this->arguments['strictCoverage']             = true;
                    $this->arguments['disallowTestOutput']         = true;
                    $this->arguments['enforceTimeLimit']           = true;
                    $this->arguments['disallowTodoAnnotatedTests'] = true;
                    $this->arguments['deprecatedStrictModeOption'] = true;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--check-version':
                    $this->handleVersionCheck();
<<<<<<< HEAD

=======
                    break;

                case '--selfupdate':
                case '--self-update':
                    $this->handleSelfUpdate();
                    break;

                case '--selfupgrade':
                case '--self-upgrade':
                    $this->handleSelfUpdate(true);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                case '--whitelist':
                    $this->arguments['whitelist'] = $option[1];
<<<<<<< HEAD

                    break;

                case '--random-order':
                    $this->handleOrderByOption('random');

                    break;

                case '--random-order-seed':
                    $this->arguments['randomOrderSeed'] = (int) $option[1];

                    break;

                case '--resolve-dependencies':
                    $this->handleOrderByOption('depends');

                    break;

                case '--ignore-dependencies':
                    $this->handleOrderByOption('no-depends');

                    break;

                case '--reverse-order':
                    $this->handleOrderByOption('reverse');

                    break;

                case '--dump-xdebug-filter':
                    $this->arguments['xdebugFilterFile'] = $option[1];

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;

                default:
                    $optionName = str_replace('--', '', $option[0]);

<<<<<<< HEAD
                    $handler = null;

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    if (isset($this->longOptions[$optionName])) {
                        $handler = $this->longOptions[$optionName];
                    } elseif (isset($this->longOptions[$optionName . '='])) {
                        $handler = $this->longOptions[$optionName . '='];
                    }

<<<<<<< HEAD
                    if (isset($handler) && is_callable([$this, $handler])) {
                        $this->{$handler}($option[1]);
=======
                    if (isset($handler) && is_callable(array($this, $handler))) {
                        $this->$handler($option[1]);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    }
            }
        }

        $this->handleCustomTestSuite();

<<<<<<< HEAD
        if (!isset($this->arguments['testSuffixes'])) {
            $this->arguments['testSuffixes'] = ['Test.php', '.phpt'];
        }

        if (isset($this->options[1][0]) &&
            substr($this->options[1][0], -5, 5) !== '.phpt' &&
            substr($this->options[1][0], -4, 4) !== '.php' &&
            substr($this->options[1][0], -1, 1) !== '/' &&
            !is_dir($this->options[1][0])) {
            $this->warnings[] = 'Invocation with class name is deprecated';
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (!isset($this->arguments['test'])) {
            if (isset($this->options[1][0])) {
                $this->arguments['test'] = $this->options[1][0];
            }

            if (isset($this->options[1][1])) {
<<<<<<< HEAD
                $testFile = realpath($this->options[1][1]);

                if ($testFile === false) {
                    $this->exitWithErrorMessage(
                        sprintf(
                            'Cannot open file "%s".',
                            $this->options[1][1]
                        )
                    );
                }
                $this->arguments['testFile'] = $testFile;
=======
                $this->arguments['testFile'] = realpath($this->options[1][1]);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            } else {
                $this->arguments['testFile'] = '';
            }

            if (isset($this->arguments['test']) &&
                is_file($this->arguments['test']) &&
<<<<<<< HEAD
                strrpos($this->arguments['test'], '.') !== false &&
                substr($this->arguments['test'], -5, 5) !== '.phpt') {
                $this->arguments['testFile'] = realpath($this->arguments['test']);
                $this->arguments['test']     = substr($this->arguments['test'], 0, strrpos($this->arguments['test'], '.'));
            }

            if (isset($this->arguments['test']) &&
                is_string($this->arguments['test']) &&
                substr($this->arguments['test'], -5, 5) === '.phpt') {
                $suite = new TestSuite;
                $suite->addTestFile($this->arguments['test']);
                $this->arguments['test'] = $suite;
            }
=======
                substr($this->arguments['test'], -5, 5) != '.phpt') {
                $this->arguments['testFile'] = realpath($this->arguments['test']);
                $this->arguments['test']     = substr($this->arguments['test'], 0, strrpos($this->arguments['test'], '.'));
            }
        }

        if (!isset($this->arguments['testSuffixes'])) {
            $this->arguments['testSuffixes'] = array('Test.php', '.phpt');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if (isset($includePath)) {
            ini_set(
                'include_path',
                $includePath . PATH_SEPARATOR . ini_get('include_path')
            );
        }

        if ($this->arguments['loader'] !== null) {
            $this->arguments['loader'] = $this->handleLoader($this->arguments['loader']);
        }

        if (isset($this->arguments['configuration']) &&
            is_dir($this->arguments['configuration'])) {
            $configurationFile = $this->arguments['configuration'] . '/phpunit.xml';

            if (file_exists($configurationFile)) {
                $this->arguments['configuration'] = realpath(
                    $configurationFile
                );
            } elseif (file_exists($configurationFile . '.dist')) {
                $this->arguments['configuration'] = realpath(
                    $configurationFile . '.dist'
                );
            }
        } elseif (!isset($this->arguments['configuration']) &&
<<<<<<< HEAD
            $this->arguments['useDefaultConfiguration']) {
=======
                  $this->arguments['useDefaultConfiguration']) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if (file_exists('phpunit.xml')) {
                $this->arguments['configuration'] = realpath('phpunit.xml');
            } elseif (file_exists('phpunit.xml.dist')) {
                $this->arguments['configuration'] = realpath(
                    'phpunit.xml.dist'
                );
            }
        }

        if (isset($this->arguments['configuration'])) {
            try {
<<<<<<< HEAD
                $configuration = Configuration::getInstance(
                    $this->arguments['configuration']
                );
            } catch (Throwable $t) {
                print $t->getMessage() . PHP_EOL;

                exit(TestRunner::FAILURE_EXIT);
            }

            $phpunitConfiguration = $configuration->getPHPUnitConfiguration();
=======
                $configuration = PHPUnit_Util_Configuration::getInstance(
                    $this->arguments['configuration']
                );
            } catch (Throwable $e) {
                print $e->getMessage() . "\n";
                exit(PHPUnit_TextUI_TestRunner::FAILURE_EXIT);
            } catch (Exception $e) {
                print $e->getMessage() . "\n";
                exit(PHPUnit_TextUI_TestRunner::FAILURE_EXIT);
            }

            $phpunit = $configuration->getPHPUnitConfiguration();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            $configuration->handlePHPConfiguration();

            /*
             * Issue #1216
             */
            if (isset($this->arguments['bootstrap'])) {
                $this->handleBootstrap($this->arguments['bootstrap']);
<<<<<<< HEAD
            } elseif (isset($phpunitConfiguration['bootstrap'])) {
                $this->handleBootstrap($phpunitConfiguration['bootstrap']);
=======
            } elseif (isset($phpunit['bootstrap'])) {
                $this->handleBootstrap($phpunit['bootstrap']);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }

            /*
             * Issue #657
             */
<<<<<<< HEAD
            if (isset($phpunitConfiguration['stderr']) && !isset($this->arguments['stderr'])) {
                $this->arguments['stderr'] = $phpunitConfiguration['stderr'];
            }

            if (isset($phpunitConfiguration['extensionsDirectory']) && !isset($this->arguments['noExtensions']) && extension_loaded('phar')) {
                $this->handleExtensions($phpunitConfiguration['extensionsDirectory']);
            }

            if (isset($phpunitConfiguration['columns']) && !isset($this->arguments['columns'])) {
                $this->arguments['columns'] = $phpunitConfiguration['columns'];
            }

            if (!isset($this->arguments['printer']) && isset($phpunitConfiguration['printerClass'])) {
                $file = $phpunitConfiguration['printerFile'] ?? '';

                $this->arguments['printer'] = $this->handlePrinter(
                    $phpunitConfiguration['printerClass'],
=======
            if (isset($phpunit['stderr']) && ! isset($this->arguments['stderr'])) {
                $this->arguments['stderr'] = $phpunit['stderr'];
            }

            if (isset($phpunit['columns']) && ! isset($this->arguments['columns'])) {
                $this->arguments['columns'] = $phpunit['columns'];
            }

            if (isset($phpunit['printerClass'])) {
                if (isset($phpunit['printerFile'])) {
                    $file = $phpunit['printerFile'];
                } else {
                    $file = '';
                }

                $this->arguments['printer'] = $this->handlePrinter(
                    $phpunit['printerClass'],
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $file
                );
            }

<<<<<<< HEAD
            if (isset($phpunitConfiguration['testSuiteLoaderClass'])) {
                $file = $phpunitConfiguration['testSuiteLoaderFile'] ?? '';

                $this->arguments['loader'] = $this->handleLoader(
                    $phpunitConfiguration['testSuiteLoaderClass'],
=======
            if (isset($phpunit['testSuiteLoaderClass'])) {
                if (isset($phpunit['testSuiteLoaderFile'])) {
                    $file = $phpunit['testSuiteLoaderFile'];
                } else {
                    $file = '';
                }

                $this->arguments['loader'] = $this->handleLoader(
                    $phpunit['testSuiteLoaderClass'],
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $file
                );
            }

<<<<<<< HEAD
            if (!isset($this->arguments['testsuite']) && isset($phpunitConfiguration['defaultTestSuite'])) {
                $this->arguments['testsuite'] = $phpunitConfiguration['defaultTestSuite'];
            }

            if (!isset($this->arguments['test'])) {
                $testSuite = $configuration->getTestSuiteConfiguration($this->arguments['testsuite'] ?? '');
=======
            $browsers = $configuration->getSeleniumBrowserConfiguration();

            if (!empty($browsers)) {
                $this->arguments['deprecatedSeleniumConfiguration'] = true;

                if (class_exists('PHPUnit_Extensions_SeleniumTestCase')) {
                    PHPUnit_Extensions_SeleniumTestCase::$browsers = $browsers;
                }
            }

            if (!isset($this->arguments['test'])) {
                $testSuite = $configuration->getTestSuiteConfiguration(isset($this->arguments['testsuite']) ? $this->arguments['testsuite'] : null);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

                if ($testSuite !== null) {
                    $this->arguments['test'] = $testSuite;
                }
            }
        } elseif (isset($this->arguments['bootstrap'])) {
            $this->handleBootstrap($this->arguments['bootstrap']);
        }

        if (isset($this->arguments['printer']) &&
            is_string($this->arguments['printer'])) {
            $this->arguments['printer'] = $this->handlePrinter($this->arguments['printer']);
        }

<<<<<<< HEAD
        if (!isset($this->arguments['test'])) {
            $this->showHelp();

            exit(TestRunner::EXCEPTION_EXIT);
=======
        if (isset($this->arguments['test']) && is_string($this->arguments['test']) && substr($this->arguments['test'], -5, 5) == '.phpt') {
            $test = new PHPUnit_Extensions_PhptTestCase($this->arguments['test']);

            $this->arguments['test'] = new PHPUnit_Framework_TestSuite;
            $this->arguments['test']->addTest($test);
        }

        if (!isset($this->arguments['test']) ||
            (isset($this->arguments['testDatabaseLogRevision']) && !isset($this->arguments['testDatabaseDSN']))) {
            $this->showHelp();
            exit(PHPUnit_TextUI_TestRunner::EXCEPTION_EXIT);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
<<<<<<< HEAD
     * Handles the loading of the PHPUnit\Runner\TestSuiteLoader implementation.
     */
    protected function handleLoader(string $loaderClass, string $loaderFile = ''): ?TestSuiteLoader
    {
        if (!class_exists($loaderClass, false)) {
            if ($loaderFile == '') {
                $loaderFile = Filesystem::classNameToFilename(
=======
     * Handles the loading of the PHPUnit_Runner_TestSuiteLoader implementation.
     *
     * @param string $loaderClass
     * @param string $loaderFile
     *
     * @return PHPUnit_Runner_TestSuiteLoader
     */
    protected function handleLoader($loaderClass, $loaderFile = '')
    {
        if (!class_exists($loaderClass, false)) {
            if ($loaderFile == '') {
                $loaderFile = PHPUnit_Util_Filesystem::classNameToFilename(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $loaderClass
                );
            }

            $loaderFile = stream_resolve_include_path($loaderFile);

            if ($loaderFile) {
                require $loaderFile;
            }
        }

        if (class_exists($loaderClass, false)) {
<<<<<<< HEAD
            try {
                $class = new ReflectionClass($loaderClass);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
                    $e
                );
            }
            // @codeCoverageIgnoreEnd

            if ($class->implementsInterface(TestSuiteLoader::class) && $class->isInstantiable()) {
                $object = $class->newInstance();

                assert($object instanceof TestSuiteLoader);

                return $object;
            }
        }

        if ($loaderClass == StandardTestSuiteLoader::class) {
            return null;
        }

        $this->exitWithErrorMessage(
=======
            $class = new ReflectionClass($loaderClass);

            if ($class->implementsInterface('PHPUnit_Runner_TestSuiteLoader') &&
                $class->isInstantiable()) {
                return $class->newInstance();
            }
        }

        if ($loaderClass == 'PHPUnit_Runner_StandardTestSuiteLoader') {
            return;
        }

        $this->showError(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            sprintf(
                'Could not use "%s" as loader.',
                $loaderClass
            )
        );
<<<<<<< HEAD

        return null;
    }

    /**
     * Handles the loading of the PHPUnit\Util\Printer implementation.
     *
     * @return null|Printer|string
     */
    protected function handlePrinter(string $printerClass, string $printerFile = '')
    {
        if (!class_exists($printerClass, false)) {
            if ($printerFile == '') {
                $printerFile = Filesystem::classNameToFilename(
=======
    }

    /**
     * Handles the loading of the PHPUnit_Util_Printer implementation.
     *
     * @param string $printerClass
     * @param string $printerFile
     *
     * @return PHPUnit_Util_Printer|string
     */
    protected function handlePrinter($printerClass, $printerFile = '')
    {
        if (!class_exists($printerClass, false)) {
            if ($printerFile == '') {
                $printerFile = PHPUnit_Util_Filesystem::classNameToFilename(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $printerClass
                );
            }

            $printerFile = stream_resolve_include_path($printerFile);

            if ($printerFile) {
                require $printerFile;
            }
        }

<<<<<<< HEAD
        if (!class_exists($printerClass)) {
            $this->exitWithErrorMessage(
                sprintf(
                    'Could not use "%s" as printer: class does not exist',
                    $printerClass
                )
            );
        }

        try {
            $class = new ReflectionClass($printerClass);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
            // @codeCoverageIgnoreEnd
        }

        if (!$class->implementsInterface(TestListener::class)) {
            $this->exitWithErrorMessage(
                sprintf(
                    'Could not use "%s" as printer: class does not implement %s',
                    $printerClass,
                    TestListener::class
                )
            );
        }

        if (!$class->isSubclassOf(Printer::class)) {
            $this->exitWithErrorMessage(
                sprintf(
                    'Could not use "%s" as printer: class does not extend %s',
                    $printerClass,
                    Printer::class
                )
            );
        }

        if (!$class->isInstantiable()) {
            $this->exitWithErrorMessage(
                sprintf(
                    'Could not use "%s" as printer: class cannot be instantiated',
                    $printerClass
                )
            );
        }

        if ($class->isSubclassOf(ResultPrinter::class)) {
            return $printerClass;
        }

        $outputStream = isset($this->arguments['stderr']) ? 'php://stderr' : null;

        return $class->newInstance($outputStream);
=======
        if (class_exists($printerClass)) {
            $class = new ReflectionClass($printerClass);

            if ($class->implementsInterface('PHPUnit_Framework_TestListener') &&
                $class->isSubclassOf('PHPUnit_Util_Printer') &&
                $class->isInstantiable()) {
                if ($class->isSubclassOf('PHPUnit_TextUI_ResultPrinter')) {
                    return $printerClass;
                }

                $outputStream = isset($this->arguments['stderr']) ? 'php://stderr' : null;

                return $class->newInstance($outputStream);
            }
        }

        $this->showError(
            sprintf(
                'Could not use "%s" as printer.',
                $printerClass
            )
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Loads a bootstrap file.
<<<<<<< HEAD
     */
    protected function handleBootstrap(string $filename): void
    {
        try {
            FileLoader::checkAndLoad($filename);
        } catch (Exception $e) {
            $this->exitWithErrorMessage($e->getMessage());
        }
    }

    protected function handleVersionCheck(): void
=======
     *
     * @param string $filename
     */
    protected function handleBootstrap($filename)
    {
        try {
            PHPUnit_Util_Fileloader::checkAndLoad($filename);
        } catch (PHPUnit_Framework_Exception $e) {
            $this->showError($e->getMessage());
        }
    }

    /**
     * @since Method available since Release 4.0.0
     */
    protected function handleSelfUpdate($upgrade = false)
    {
        $this->printVersionString();

        $localFilename = realpath($_SERVER['argv'][0]);

        if (!is_writable($localFilename)) {
            print 'No write permission to update ' . $localFilename . "\n";
            exit(PHPUnit_TextUI_TestRunner::EXCEPTION_EXIT);
        }

        if (!extension_loaded('openssl')) {
            print "The OpenSSL extension is not loaded.\n";
            exit(PHPUnit_TextUI_TestRunner::EXCEPTION_EXIT);
        }

        if (!$upgrade) {
            $remoteFilename = sprintf(
                'https://phar.phpunit.de/phpunit-%s.phar',
                file_get_contents(
                    sprintf(
                        'https://phar.phpunit.de/latest-version-of/phpunit-%s',
                        PHPUnit_Runner_Version::series()
                    )
                )
            );
        } else {
            $remoteFilename = sprintf(
                'https://phar.phpunit.de/phpunit%s.phar',
                PHPUnit_Runner_Version::getReleaseChannel()
            );
        }

        $tempFilename = tempnam(sys_get_temp_dir(), 'phpunit') . '.phar';

        // Workaround for https://bugs.php.net/bug.php?id=65538
        $caFile = dirname($tempFilename) . '/ca.pem';
        copy(__PHPUNIT_PHAR_ROOT__ . '/ca.pem', $caFile);

        print 'Updating the PHPUnit PHAR ... ';

        $options = array(
            'ssl' => array(
                'allow_self_signed' => false,
                'cafile'            => $caFile,
                'verify_peer'       => true
            )
        );

        if (PHP_VERSION_ID < 50600) {
            $options['ssl']['CN_match']        = 'phar.phpunit.de';
            $options['ssl']['SNI_server_name'] = 'phar.phpunit.de';
        }

        file_put_contents(
            $tempFilename,
            file_get_contents(
                $remoteFilename,
                false,
                stream_context_create($options)
            )
        );

        chmod($tempFilename, 0777 & ~umask());

        try {
            $phar = new Phar($tempFilename);
            unset($phar);
            rename($tempFilename, $localFilename);
            unlink($caFile);
        } catch (Throwable $_e) {
            $e = $_e;
        } catch (Exception $_e) {
            $e = $_e;
        }

        if (isset($e)) {
            unlink($caFile);
            unlink($tempFilename);
            print " done\n\n" . $e->getMessage() . "\n";
            exit(2);
        }

        print " done\n";
        exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
    }

    /**
     * @since Method available since Release 4.8.0
     */
    protected function handleVersionCheck()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->printVersionString();

        $latestVersion = file_get_contents('https://phar.phpunit.de/latest-version-of/phpunit');
<<<<<<< HEAD
        $isOutdated    = version_compare($latestVersion, Version::id(), '>');

        if ($isOutdated) {
            printf(
                'You are not using the latest version of PHPUnit.' . PHP_EOL .
                'The latest version is PHPUnit %s.' . PHP_EOL,
                $latestVersion
            );
        } else {
            print 'You are using the latest version of PHPUnit.' . PHP_EOL;
        }

        exit(TestRunner::SUCCESS_EXIT);
=======
        $isOutdated    = version_compare($latestVersion, PHPUnit_Runner_Version::id(), '>');

        if ($isOutdated) {
            print "You are not using the latest version of PHPUnit.\n";
            print 'Use "phpunit --self-upgrade" to install PHPUnit ' . $latestVersion . "\n";
        } else {
            print "You are using the latest version of PHPUnit.\n";
        }

        exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Show the help message.
     */
<<<<<<< HEAD
    protected function showHelp(): void
    {
        $this->printVersionString();
        (new Help)->writeToConsole();
=======
    protected function showHelp()
    {
        $this->printVersionString();

        print <<<EOT
Usage: phpunit [options] UnitTest [UnitTest.php]
       phpunit [options] <directory>

Code Coverage Options:

  --coverage-clover <file>  Generate code coverage report in Clover XML format.
  --coverage-crap4j <file>  Generate code coverage report in Crap4J XML format.
  --coverage-html <dir>     Generate code coverage report in HTML format.
  --coverage-php <file>     Export PHP_CodeCoverage object to file.
  --coverage-text=<file>    Generate code coverage report in text format.
                            Default: Standard output.
  --coverage-xml <dir>      Generate code coverage report in PHPUnit XML format.

Logging Options:

  --log-junit <file>        Log test execution in JUnit XML format to file.
  --log-tap <file>          Log test execution in TAP format to file.
  --log-json <file>         Log test execution in JSON format.
  --testdox-html <file>     Write agile documentation in HTML format to file.
  --testdox-text <file>     Write agile documentation in Text format to file.

Test Selection Options:

  --filter <pattern>        Filter which tests to run.
  --testsuite <name>        Filter which testsuite to run.
  --group ...               Only runs tests from the specified group(s).
  --exclude-group ...       Exclude tests from the specified group(s).
  --list-groups             List available test groups.
  --test-suffix ...         Only search for test in files with specified
                            suffix(es). Default: Test.php,.phpt

Test Execution Options:

  --report-useless-tests    Be strict about tests that do not test anything.
  --strict-coverage         Be strict about unintentionally covered code.
  --strict-global-state     Be strict about changes to global state
  --disallow-test-output    Be strict about output during tests.
  --enforce-time-limit      Enforce time limit based on test size.
  --disallow-todo-tests     Disallow @todo-annotated tests.

  --process-isolation       Run each test in a separate PHP process.
  --no-globals-backup       Do not backup and restore \$GLOBALS for each test.
  --static-backup           Backup and restore static attributes for each test.

  --colors=<flag>           Use colors in output ("never", "auto" or "always").
  --columns <n>             Number of columns to use for progress output.
  --columns max             Use maximum number of columns for progress output.
  --stderr                  Write to STDERR instead of STDOUT.
  --stop-on-error           Stop execution upon first error.
  --stop-on-failure         Stop execution upon first error or failure.
  --stop-on-risky           Stop execution upon first risky test.
  --stop-on-skipped         Stop execution upon first skipped test.
  --stop-on-incomplete      Stop execution upon first incomplete test.
  -v|--verbose              Output more verbose information.
  --debug                   Display debugging information during test execution.

  --loader <loader>         TestSuiteLoader implementation to use.
  --repeat <times>          Runs the test(s) repeatedly.
  --tap                     Report test execution progress in TAP format.
  --testdox                 Report test execution progress in TestDox format.
  --printer <printer>       TestListener implementation to use.

Configuration Options:

  --bootstrap <file>        A "bootstrap" PHP file that is run before the tests.
  -c|--configuration <file> Read configuration from XML file.
  --no-configuration        Ignore default configuration file (phpunit.xml).
  --no-coverage             Ignore code coverage configuration.
  --include-path <path(s)>  Prepend PHP's include_path with given path(s).
  -d key[=value]            Sets a php.ini value.

Miscellaneous Options:

  -h|--help                 Prints this usage information.
  --version                 Prints the version and exits.

EOT;

        if (defined('__PHPUNIT_PHAR__')) {
            print "\n  --check-version           Check whether PHPUnit is the latest version.";
            print "\n  --self-update             Update PHPUnit to the latest version within the same\n                            release series.\n";
            print "\n  --self-upgrade            Upgrade PHPUnit to the latest version.\n";
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Custom callback for test suite discovery.
     */
<<<<<<< HEAD
    protected function handleCustomTestSuite(): void
    {
    }

    private function printVersionString(): void
=======
    protected function handleCustomTestSuite()
    {
    }

    private function printVersionString()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($this->versionStringPrinted) {
            return;
        }

<<<<<<< HEAD
        print Version::getVersionString() . PHP_EOL . PHP_EOL;
=======
        print PHPUnit_Runner_Version::getVersionString() . "\n\n";
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $this->versionStringPrinted = true;
    }

<<<<<<< HEAD
    private function exitWithErrorMessage(string $message): void
    {
        $this->printVersionString();

        print $message . PHP_EOL;

        exit(TestRunner::FAILURE_EXIT);
    }

    private function handleExtensions(string $directory): void
    {
        foreach ((new FileIteratorFacade)->getFilesAsArray($directory, '.phar') as $file) {
            if (!file_exists('phar://' . $file . '/manifest.xml')) {
                $this->arguments['notLoadedExtensions'][] = $file . ' is not an extension for PHPUnit';

                continue;
            }

            try {
                $applicationName = new ApplicationName('phpunit/phpunit');
                $version         = new PharIoVersion(Version::series());
                $manifest        = ManifestLoader::fromFile('phar://' . $file . '/manifest.xml');

                if (!$manifest->isExtensionFor($applicationName)) {
                    $this->arguments['notLoadedExtensions'][] = $file . ' is not an extension for PHPUnit';

                    continue;
                }

                if (!$manifest->isExtensionFor($applicationName, $version)) {
                    $this->arguments['notLoadedExtensions'][] = $file . ' is not compatible with this version of PHPUnit';

                    continue;
                }
            } catch (ManifestException $e) {
                $this->arguments['notLoadedExtensions'][] = $file . ': ' . $e->getMessage();

                continue;
            }

            require $file;

            $this->arguments['loadedExtensions'][] = $manifest->getName()->asString() . ' ' . $manifest->getVersion()->getVersionString();
        }
    }

    private function handleListGroups(TestSuite $suite, bool $exit): int
    {
        $this->printVersionString();

        $this->warnAboutConflictingOptions(
            'listGroups',
            [
                'filter',
                'groups',
                'excludeGroups',
                'testsuite',
            ]
        );

        print 'Available test group(s):' . PHP_EOL;

        $groups = $suite->getGroups();
        sort($groups);

        foreach ($groups as $group) {
            printf(
                ' - %s' . PHP_EOL,
                $group
            );
        }

        if ($exit) {
            exit(TestRunner::SUCCESS_EXIT);
        }

        return TestRunner::SUCCESS_EXIT;
    }

    /**
     * @throws \PHPUnit\Framework\Exception
     */
    private function handleListSuites(bool $exit): int
    {
        $this->printVersionString();

        $this->warnAboutConflictingOptions(
            'listSuites',
            [
                'filter',
                'groups',
                'excludeGroups',
                'testsuite',
            ]
        );

        print 'Available test suite(s):' . PHP_EOL;

        $configuration = Configuration::getInstance(
            $this->arguments['configuration']
        );

        foreach ($configuration->getTestSuiteNames() as $suiteName) {
            printf(
                ' - %s' . PHP_EOL,
                $suiteName
            );
        }

        if ($exit) {
            exit(TestRunner::SUCCESS_EXIT);
        }

        return TestRunner::SUCCESS_EXIT;
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    private function handleListTests(TestSuite $suite, bool $exit): int
    {
        $this->printVersionString();

        $this->warnAboutConflictingOptions(
            'listTests',
            [
                'filter',
                'groups',
                'excludeGroups',
            ]
        );

        $renderer = new TextTestListRenderer;

        print $renderer->render($suite);

        if ($exit) {
            exit(TestRunner::SUCCESS_EXIT);
        }

        return TestRunner::SUCCESS_EXIT;
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    private function handleListTestsXml(TestSuite $suite, string $target, bool $exit): int
    {
        $this->printVersionString();

        $this->warnAboutConflictingOptions(
            'listTestsXml',
            [
                'filter',
                'groups',
                'excludeGroups',
            ]
        );

        $renderer = new XmlTestListRenderer;

        file_put_contents($target, $renderer->render($suite));

        printf(
            'Wrote list of tests that would have been run to %s' . PHP_EOL,
            $target
        );

        if ($exit) {
            exit(TestRunner::SUCCESS_EXIT);
        }

        return TestRunner::SUCCESS_EXIT;
    }

    private function handleOrderByOption(string $value): void
    {
        foreach (explode(',', $value) as $order) {
            switch ($order) {
                case 'default':
                    $this->arguments['executionOrder']        = TestSuiteSorter::ORDER_DEFAULT;
                    $this->arguments['executionOrderDefects'] = TestSuiteSorter::ORDER_DEFAULT;
                    $this->arguments['resolveDependencies']   = true;

                    break;

                case 'defects':
                    $this->arguments['executionOrderDefects'] = TestSuiteSorter::ORDER_DEFECTS_FIRST;

                    break;

                case 'depends':
                    $this->arguments['resolveDependencies'] = true;

                    break;

                case 'duration':
                    $this->arguments['executionOrder'] = TestSuiteSorter::ORDER_DURATION;

                    break;

                case 'no-depends':
                    $this->arguments['resolveDependencies'] = false;

                    break;

                case 'random':
                    $this->arguments['executionOrder'] = TestSuiteSorter::ORDER_RANDOMIZED;

                    break;

                case 'reverse':
                    $this->arguments['executionOrder'] = TestSuiteSorter::ORDER_REVERSED;

                    break;

                case 'size':
                    $this->arguments['executionOrder'] = TestSuiteSorter::ORDER_SIZE;

                    break;

                default:
                    $this->exitWithErrorMessage("unrecognized --order-by option: {$order}");
            }
        }
    }

    /**
     * @psalm-param "listGroups"|"listSuites"|"listTests"|"listTestsXml"|"filter"|"groups"|"excludeGroups"|"testsuite" $key
     * @psalm-param list<"listGroups"|"listSuites"|"listTests"|"listTestsXml"|"filter"|"groups"|"excludeGroups"|"testsuite"> $keys
     */
    private function warnAboutConflictingOptions(string $key, array $keys): void
    {
        $warningPrinted = false;

        foreach ($keys as $_key) {
            if (!empty($this->arguments[$_key])) {
                printf(
                    'The %s and %s options cannot be combined, %s is ignored' . PHP_EOL,
                    $this->mapKeyToOptionForWarning($_key),
                    $this->mapKeyToOptionForWarning($key),
                    $this->mapKeyToOptionForWarning($_key)
                );

                $warningPrinted = true;
            }
        }

        if ($warningPrinted) {
            print PHP_EOL;
        }
    }

    /**
     * @psalm-param "listGroups"|"listSuites"|"listTests"|"listTestsXml"|"filter"|"groups"|"excludeGroups"|"testsuite" $key
     */
    private function mapKeyToOptionForWarning(string $key): string
    {
        switch ($key) {
            case 'listGroups':
                return '--list-groups';

            case 'listSuites':
                return '--list-suites';

            case 'listTests':
                return '--list-tests';

            case 'listTestsXml':
                return '--list-tests-xml';

            case 'filter':
                return '--filter';

            case 'groups':
                return '--group';

            case 'excludeGroups':
                return '--exclude-group';

            case 'testsuite':
                return '--testsuite';
        }
=======
    /**
     */
    private function showError($message)
    {
        $this->printVersionString();

        print $message . "\n";

        exit(PHPUnit_TextUI_TestRunner::FAILURE_EXIT);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
