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
namespace PHPUnit\Util;

use const DIRECTORY_SEPARATOR;
use const PATH_SEPARATOR;
use const PHP_VERSION;
use function assert;
use function constant;
use function count;
use function define;
use function defined;
use function dirname;
use function explode;
use function file_exists;
use function file_get_contents;
use function getenv;
use function implode;
use function in_array;
use function ini_get;
use function ini_set;
use function is_numeric;
use function libxml_clear_errors;
use function libxml_get_errors;
use function libxml_use_internal_errors;
use function preg_match;
use function putenv;
use function realpath;
use function sprintf;
use function stream_resolve_include_path;
use function strlen;
use function strpos;
use function strtolower;
use function strtoupper;
use function substr;
use function trim;
use function version_compare;
use DOMDocument;
use DOMElement;
use DOMNodeList;
use DOMXPath;
use LibXMLError;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Runner\TestSuiteSorter;
use PHPUnit\TextUI\ResultPrinter;
use PHPUnit\Util\TestDox\CliTestDoxPrinter;
use SebastianBergmann\FileIterator\Facade as FileIteratorFacade;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Configuration
{
    /**
     * @var self[]
     */
    private static $instances = [];

    /**
     * @var DOMDocument
     */
    private $document;

    /**
     * @var DOMXPath
     */
    private $xpath;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var LibXMLError[]
     */
    private $errors = [];
=======

/**
 * Wrapper for the PHPUnit XML configuration file.
 *
 * Example XML configuration file:
 * <code>
 * <?xml version="1.0" encoding="utf-8" ?>
 *
 * <phpunit backupGlobals="true"
 *          backupStaticAttributes="false"
 *          bootstrap="/path/to/bootstrap.php"
 *          cacheTokens="false"
 *          columns="80"
 *          colors="false"
 *          stderr="false"
 *          convertErrorsToExceptions="true"
 *          convertNoticesToExceptions="true"
 *          convertWarningsToExceptions="true"
 *          forceCoversAnnotation="false"
 *          mapTestClassNameToCoveredClassName="false"
 *          printerClass="PHPUnit_TextUI_ResultPrinter"
 *          processIsolation="false"
 *          stopOnError="false"
 *          stopOnFailure="false"
 *          stopOnIncomplete="false"
 *          stopOnRisky="false"
 *          stopOnSkipped="false"
 *          testSuiteLoaderClass="PHPUnit_Runner_StandardTestSuiteLoader"
 *          timeoutForSmallTests="1"
 *          timeoutForMediumTests="10"
 *          timeoutForLargeTests="60"
 *          beStrictAboutTestsThatDoNotTestAnything="false"
 *          beStrictAboutOutputDuringTests="false"
 *          beStrictAboutTestSize="false"
 *          beStrictAboutTodoAnnotatedTests="false"
 *          checkForUnintentionallyCoveredCode="false"
 *          disallowChangesToGlobalState="false"
 *          verbose="false">
 *   <testsuites>
 *     <testsuite name="My Test Suite">
 *       <directory suffix="Test.php" phpVersion="5.3.0" phpVersionOperator=">=">/path/to/files</directory>
 *       <file phpVersion="5.3.0" phpVersionOperator=">=">/path/to/MyTest.php</file>
 *       <exclude>/path/to/files/exclude</exclude>
 *     </testsuite>
 *   </testsuites>
 *
 *   <groups>
 *     <include>
 *       <group>name</group>
 *     </include>
 *     <exclude>
 *       <group>name</group>
 *     </exclude>
 *   </groups>
 *
 *   <filter>
 *     <blacklist>
 *       <directory suffix=".php">/path/to/files</directory>
 *       <file>/path/to/file</file>
 *       <exclude>
 *         <directory suffix=".php">/path/to/files</directory>
 *         <file>/path/to/file</file>
 *       </exclude>
 *     </blacklist>
 *     <whitelist addUncoveredFilesFromWhitelist="true"
 *                processUncoveredFilesFromWhitelist="false">
 *       <directory suffix=".php">/path/to/files</directory>
 *       <file>/path/to/file</file>
 *       <exclude>
 *         <directory suffix=".php">/path/to/files</directory>
 *         <file>/path/to/file</file>
 *       </exclude>
 *     </whitelist>
 *   </filter>
 *
 *   <listeners>
 *     <listener class="MyListener" file="/optional/path/to/MyListener.php">
 *       <arguments>
 *         <array>
 *           <element key="0">
 *             <string>Sebastian</string>
 *           </element>
 *         </array>
 *         <integer>22</integer>
 *         <string>April</string>
 *         <double>19.78</double>
 *         <null/>
 *         <object class="stdClass"/>
 *         <file>MyRelativeFile.php</file>
 *         <directory>MyRelativeDir</directory>
 *       </arguments>
 *     </listener>
 *   </listeners>
 *
 *   <logging>
 *     <log type="coverage-html" target="/tmp/report" lowUpperBound="50" highLowerBound="90"/>
 *     <log type="coverage-clover" target="/tmp/clover.xml"/>
 *     <log type="coverage-crap4j" target="/tmp/crap.xml" threshold="30"/>
 *     <log type="json" target="/tmp/logfile.json"/>
 *     <log type="plain" target="/tmp/logfile.txt"/>
 *     <log type="tap" target="/tmp/logfile.tap"/>
 *     <log type="junit" target="/tmp/logfile.xml" logIncompleteSkipped="false"/>
 *     <log type="testdox-html" target="/tmp/testdox.html"/>
 *     <log type="testdox-text" target="/tmp/testdox.txt"/>
 *   </logging>
 *
 *   <php>
 *     <includePath>.</includePath>
 *     <ini name="foo" value="bar"/>
 *     <const name="foo" value="bar"/>
 *     <var name="foo" value="bar"/>
 *     <env name="foo" value="bar"/>
 *     <post name="foo" value="bar"/>
 *     <get name="foo" value="bar"/>
 *     <cookie name="foo" value="bar"/>
 *     <server name="foo" value="bar"/>
 *     <files name="foo" value="bar"/>
 *     <request name="foo" value="bar"/>
 *   </php>
 *
 *   <selenium>
 *     <browser name="Firefox on Linux"
 *              browser="*firefox /usr/lib/firefox/firefox-bin"
 *              host="my.linux.box"
 *              port="4444"
 *              timeout="30000"/>
 *   </selenium>
 * </phpunit>
 * </code>
 *
 * @since Class available since Release 3.2.0
 */
class PHPUnit_Util_Configuration
{
    private static $instances = array();

    protected $document;
    protected $xpath;
    protected $filename;

    /**
     * Loads a PHPUnit configuration file.
     *
     * @param string $filename
     */
    protected function __construct($filename)
    {
        $this->filename = $filename;
        $this->document = PHPUnit_Util_XML::loadFile($filename, false, true, true);
        $this->xpath    = new DOMXPath($this->document);
    }

    /**
     * @since  Method available since Release 3.4.0
     */
    final private function __clone()
    {
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns a PHPUnit configuration object.
     *
<<<<<<< HEAD
     * @throws Exception
     */
    public static function getInstance(string $filename): self
    {
        $realPath = realpath($filename);

        if ($realPath === false) {
            throw new Exception(
=======
     * @param string $filename
     *
     * @return PHPUnit_Util_Configuration
     *
     * @since  Method available since Release 3.4.0
     */
    public static function getInstance($filename)
    {
        $realpath = realpath($filename);

        if ($realpath === false) {
            throw new PHPUnit_Framework_Exception(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                sprintf(
                    'Could not read "%s".',
                    $filename
                )
            );
        }

<<<<<<< HEAD
        if (!isset(self::$instances[$realPath])) {
            self::$instances[$realPath] = new self($realPath);
        }

        return self::$instances[$realPath];
    }

    /**
     * Loads a PHPUnit configuration file.
     *
     * @throws Exception
     */
    private function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->document = Xml::loadFile($filename, false, true, true);
        $this->xpath    = new DOMXPath($this->document);

        $this->validateConfigurationAgainstSchema();
    }

    /**
     * @codeCoverageIgnore
     */
    private function __clone()
    {
    }

    public function hasValidationErrors(): bool
    {
        return count($this->errors) > 0;
    }

    public function getValidationErrors(): array
    {
        $result = [];

        foreach ($this->errors as $error) {
            if (!isset($result[$error->line])) {
                $result[$error->line] = [];
            }
            $result[$error->line][] = trim($error->message);
        }

        return $result;
    }

    /**
     * Returns the real path to the configuration file.
     */
    public function getFilename(): string
=======
        if (!isset(self::$instances[$realpath])) {
            self::$instances[$realpath] = new self($realpath);
        }

        return self::$instances[$realpath];
    }

    /**
     * Returns the realpath to the configuration file.
     *
     * @return string
     *
     * @since  Method available since Release 3.6.0
     */
    public function getFilename()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->filename;
    }

<<<<<<< HEAD
    public function getExtensionConfiguration(): array
    {
        $result = [];

        foreach ($this->xpath->query('extensions/extension') as $extension) {
            $result[] = $this->getElementConfigurationParameters($extension);
        }

        return $result;
    }

    /**
     * Returns the configuration for SUT filtering.
     */
    public function getFilterConfiguration(): array
    {
        $addUncoveredFilesFromWhitelist     = true;
        $processUncoveredFilesFromWhitelist = false;
        $includeDirectory                   = [];
        $includeFile                        = [];
        $excludeDirectory                   = [];
        $excludeFile                        = [];

        $tmp = $this->xpath->query('filter/whitelist');

        if ($tmp->length === 1) {
=======
    /**
     * Returns the configuration for SUT filtering.
     *
     * @return array
     *
     * @since  Method available since Release 3.2.1
     */
    public function getFilterConfiguration()
    {
        $addUncoveredFilesFromWhitelist     = true;
        $processUncoveredFilesFromWhitelist = false;

        $tmp = $this->xpath->query('filter/whitelist');

        if ($tmp->length == 1) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if ($tmp->item(0)->hasAttribute('addUncoveredFilesFromWhitelist')) {
                $addUncoveredFilesFromWhitelist = $this->getBoolean(
                    (string) $tmp->item(0)->getAttribute(
                        'addUncoveredFilesFromWhitelist'
                    ),
                    true
                );
            }

            if ($tmp->item(0)->hasAttribute('processUncoveredFilesFromWhitelist')) {
                $processUncoveredFilesFromWhitelist = $this->getBoolean(
                    (string) $tmp->item(0)->getAttribute(
                        'processUncoveredFilesFromWhitelist'
                    ),
                    false
                );
            }
<<<<<<< HEAD

            $includeDirectory = $this->readFilterDirectories(
                'filter/whitelist/directory'
            );

            $includeFile = $this->readFilterFiles(
                'filter/whitelist/file'
            );

            $excludeDirectory = $this->readFilterDirectories(
                'filter/whitelist/exclude/directory'
            );

            $excludeFile = $this->readFilterFiles(
                'filter/whitelist/exclude/file'
            );
        }

        return [
            'whitelist' => [
                'addUncoveredFilesFromWhitelist'     => $addUncoveredFilesFromWhitelist,
                'processUncoveredFilesFromWhitelist' => $processUncoveredFilesFromWhitelist,
                'include'                            => [
                    'directory' => $includeDirectory,
                    'file'      => $includeFile,
                ],
                'exclude'                            => [
                    'directory' => $excludeDirectory,
                    'file'      => $excludeFile,
                ],
            ],
        ];
=======
        }

        return array(
          'blacklist' => array(
            'include' => array(
              'directory' => $this->readFilterDirectories(
                  'filter/blacklist/directory'
              ),
              'file' => $this->readFilterFiles(
                  'filter/blacklist/file'
              )
            ),
            'exclude' => array(
              'directory' => $this->readFilterDirectories(
                  'filter/blacklist/exclude/directory'
              ),
              'file' => $this->readFilterFiles(
                  'filter/blacklist/exclude/file'
              )
            )
          ),
          'whitelist' => array(
            'addUncoveredFilesFromWhitelist'     => $addUncoveredFilesFromWhitelist,
            'processUncoveredFilesFromWhitelist' => $processUncoveredFilesFromWhitelist,
            'include'                            => array(
              'directory' => $this->readFilterDirectories(
                  'filter/whitelist/directory'
              ),
              'file' => $this->readFilterFiles(
                  'filter/whitelist/file'
              )
            ),
            'exclude' => array(
              'directory' => $this->readFilterDirectories(
                  'filter/whitelist/exclude/directory'
              ),
              'file' => $this->readFilterFiles(
                  'filter/whitelist/exclude/file'
              )
            )
          )
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the configuration for groups.
<<<<<<< HEAD
     */
    public function getGroupConfiguration(): array
    {
        return $this->parseGroupConfiguration('groups');
    }

    /**
     * Returns the configuration for testdox groups.
     */
    public function getTestdoxGroupConfiguration(): array
    {
        return $this->parseGroupConfiguration('testdoxGroups');
=======
     *
     * @return array
     *
     * @since  Method available since Release 3.2.1
     */
    public function getGroupConfiguration()
    {
        $groups = array(
          'include' => array(),
          'exclude' => array()
        );

        foreach ($this->xpath->query('groups/include/group') as $group) {
            $groups['include'][] = (string) $group->textContent;
        }

        foreach ($this->xpath->query('groups/exclude/group') as $group) {
            $groups['exclude'][] = (string) $group->textContent;
        }

        return $groups;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the configuration for listeners.
<<<<<<< HEAD
     */
    public function getListenerConfiguration(): array
    {
        $result = [];

        foreach ($this->xpath->query('listeners/listener') as $listener) {
            $result[] = $this->getElementConfigurationParameters($listener);
=======
     *
     * @return array
     *
     * @since  Method available since Release 3.4.0
     */
    public function getListenerConfiguration()
    {
        $result = array();

        foreach ($this->xpath->query('listeners/listener') as $listener) {
            $class     = (string) $listener->getAttribute('class');
            $file      = '';
            $arguments = array();

            if ($listener->getAttribute('file')) {
                $file = $this->toAbsolutePath(
                    (string) $listener->getAttribute('file'),
                    true
                );
            }

            foreach ($listener->childNodes as $node) {
                if ($node instanceof DOMElement && $node->tagName == 'arguments') {
                    foreach ($node->childNodes as $argument) {
                        if ($argument instanceof DOMElement) {
                            if ($argument->tagName == 'file' ||
                            $argument->tagName == 'directory') {
                                $arguments[] = $this->toAbsolutePath((string) $argument->textContent);
                            } else {
                                $arguments[] = PHPUnit_Util_XML::xmlToVariable($argument);
                            }
                        }
                    }
                }
            }

            $result[] = array(
              'class'     => $class,
              'file'      => $file,
              'arguments' => $arguments
            );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $result;
    }

    /**
     * Returns the logging configuration.
<<<<<<< HEAD
     */
    public function getLoggingConfiguration(): array
    {
        $result = [];

        foreach ($this->xpath->query('logging/log') as $log) {
            assert($log instanceof DOMElement);

=======
     *
     * @return array
     */
    public function getLoggingConfiguration()
    {
        $result = array();

        foreach ($this->xpath->query('logging/log') as $log) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $type   = (string) $log->getAttribute('type');
            $target = (string) $log->getAttribute('target');

            if (!$target) {
                continue;
            }

            $target = $this->toAbsolutePath($target);

<<<<<<< HEAD
            if ($type === 'coverage-html') {
=======
            if ($type == 'coverage-html') {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                if ($log->hasAttribute('lowUpperBound')) {
                    $result['lowUpperBound'] = $this->getInteger(
                        (string) $log->getAttribute('lowUpperBound'),
                        50
                    );
                }

                if ($log->hasAttribute('highLowerBound')) {
                    $result['highLowerBound'] = $this->getInteger(
                        (string) $log->getAttribute('highLowerBound'),
                        90
                    );
                }
<<<<<<< HEAD
            } elseif ($type === 'coverage-crap4j') {
=======
            } elseif ($type == 'coverage-crap4j') {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                if ($log->hasAttribute('threshold')) {
                    $result['crap4jThreshold'] = $this->getInteger(
                        (string) $log->getAttribute('threshold'),
                        30
                    );
                }
<<<<<<< HEAD
            } elseif ($type === 'coverage-text') {
=======
            } elseif ($type == 'junit') {
                if ($log->hasAttribute('logIncompleteSkipped')) {
                    $result['logIncompleteSkipped'] = $this->getBoolean(
                        (string) $log->getAttribute('logIncompleteSkipped'),
                        false
                    );
                }
            } elseif ($type == 'coverage-text') {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                if ($log->hasAttribute('showUncoveredFiles')) {
                    $result['coverageTextShowUncoveredFiles'] = $this->getBoolean(
                        (string) $log->getAttribute('showUncoveredFiles'),
                        false
                    );
                }
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                if ($log->hasAttribute('showOnlySummary')) {
                    $result['coverageTextShowOnlySummary'] = $this->getBoolean(
                        (string) $log->getAttribute('showOnlySummary'),
                        false
                    );
                }
            }

            $result[$type] = $target;
        }

        return $result;
    }

    /**
     * Returns the PHP configuration.
<<<<<<< HEAD
     */
    public function getPHPConfiguration(): array
    {
        $result = [
            'include_path' => [],
            'ini'          => [],
            'const'        => [],
            'var'          => [],
            'env'          => [],
            'post'         => [],
            'get'          => [],
            'cookie'       => [],
            'server'       => [],
            'files'        => [],
            'request'      => [],
        ];

        foreach ($this->xpath->query('php/includePath') as $includePath) {
            $path = (string) $includePath->textContent;

=======
     *
     * @return array
     *
     * @since  Method available since Release 3.2.1
     */
    public function getPHPConfiguration()
    {
        $result = array(
          'include_path' => array(),
          'ini'          => array(),
          'const'        => array(),
          'var'          => array(),
          'env'          => array(),
          'post'         => array(),
          'get'          => array(),
          'cookie'       => array(),
          'server'       => array(),
          'files'        => array(),
          'request'      => array()
        );

        foreach ($this->xpath->query('php/includePath') as $includePath) {
            $path = (string) $includePath->textContent;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if ($path) {
                $result['include_path'][] = $this->toAbsolutePath($path);
            }
        }

        foreach ($this->xpath->query('php/ini') as $ini) {
<<<<<<< HEAD
            assert($ini instanceof DOMElement);

            $name  = (string) $ini->getAttribute('name');
            $value = (string) $ini->getAttribute('value');

            $result['ini'][$name]['value'] = $value;
        }

        foreach ($this->xpath->query('php/const') as $const) {
            assert($const instanceof DOMElement);

            $name  = (string) $const->getAttribute('name');
            $value = (string) $const->getAttribute('value');

            $result['const'][$name]['value'] = $this->getBoolean($value, $value);
        }

        foreach (['var', 'env', 'post', 'get', 'cookie', 'server', 'files', 'request'] as $array) {
            foreach ($this->xpath->query('php/' . $array) as $var) {
                assert($var instanceof DOMElement);

                $name     = (string) $var->getAttribute('name');
                $value    = (string) $var->getAttribute('value');
                $verbatim = false;

                if ($var->hasAttribute('verbatim')) {
                    $verbatim                          = $this->getBoolean($var->getAttribute('verbatim'), false);
                    $result[$array][$name]['verbatim'] = $verbatim;
                }

                if ($var->hasAttribute('force')) {
                    $force                          = $this->getBoolean($var->getAttribute('force'), false);
                    $result[$array][$name]['force'] = $force;
                }

                if (!$verbatim) {
                    $value = $this->getBoolean($value, $value);
                }

                $result[$array][$name]['value'] = $value;
=======
            $name  = (string) $ini->getAttribute('name');
            $value = (string) $ini->getAttribute('value');

            $result['ini'][$name] = $value;
        }

        foreach ($this->xpath->query('php/const') as $const) {
            $name  = (string) $const->getAttribute('name');
            $value = (string) $const->getAttribute('value');

            $result['const'][$name] = $this->getBoolean($value, $value);
        }

        foreach (array('var', 'env', 'post', 'get', 'cookie', 'server', 'files', 'request') as $array) {
            foreach ($this->xpath->query('php/' . $array) as $var) {
                $name  = (string) $var->getAttribute('name');
                $value = (string) $var->getAttribute('value');

                $result[$array][$name] = $this->getBoolean($value, $value);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }

        return $result;
    }

    /**
     * Handles the PHP configuration.
<<<<<<< HEAD
     */
    public function handlePHPConfiguration(): void
    {
        $configuration = $this->getPHPConfiguration();

        if (!empty($configuration['include_path'])) {
=======
     *
     * @since  Method available since Release 3.2.20
     */
    public function handlePHPConfiguration()
    {
        $configuration = $this->getPHPConfiguration();

        if (! empty($configuration['include_path'])) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            ini_set(
                'include_path',
                implode(PATH_SEPARATOR, $configuration['include_path']) .
                PATH_SEPARATOR .
                ini_get('include_path')
            );
        }

<<<<<<< HEAD
        foreach ($configuration['ini'] as $name => $data) {
            $value = $data['value'];

            if (defined($value)) {
                $value = (string) constant($value);
=======
        foreach ($configuration['ini'] as $name => $value) {
            if (defined($value)) {
                $value = constant($value);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }

            ini_set($name, $value);
        }

<<<<<<< HEAD
        foreach ($configuration['const'] as $name => $data) {
            $value = $data['value'];

=======
        foreach ($configuration['const'] as $name => $value) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if (!defined($name)) {
                define($name, $value);
            }
        }

<<<<<<< HEAD
        foreach ($configuration['var'] as $name => $data) {
            $GLOBALS[$name] = $data['value'];
        }

        foreach ($configuration['server'] as $name => $data) {
            $_SERVER[$name] = $data['value'];
        }

        foreach (['post', 'get', 'cookie', 'files', 'request'] as $array) {
            $target = &$GLOBALS['_' . strtoupper($array)];

            foreach ($configuration[$array] as $name => $data) {
                $target[$name] = $data['value'];
            }
        }

        foreach ($configuration['env'] as $name => $data) {
            $value = $data['value'];
            $force = $data['force'] ?? false;

            if ($force || getenv($name) === false) {
                putenv("{$name}={$value}");
            }

            $value = getenv($name);

            if (!isset($_ENV[$name])) {
                $_ENV[$name] = $value;
            }

            if ($force) {
                $_ENV[$name] = $value;
            }
=======
        foreach (array('var', 'post', 'get', 'cookie', 'server', 'files', 'request') as $array) {
            // See https://github.com/sebastianbergmann/phpunit/issues/277
            switch ($array) {
                case 'var':
                    $target = &$GLOBALS;
                    break;

                case 'server':
                    $target = &$_SERVER;
                    break;

                default:
                    $target = &$GLOBALS['_' . strtoupper($array)];
                    break;
            }

            foreach ($configuration[$array] as $name => $value) {
                $target[$name] = $value;
            }
        }

        foreach ($configuration['env'] as $name => $value) {
            if (false === getenv($name)) {
                putenv("{$name}={$value}");
            }
            if (!isset($_ENV[$name])) {
                $_ENV[$name] = $value;
            }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * Returns the PHPUnit configuration.
<<<<<<< HEAD
     */
    public function getPHPUnitConfiguration(): array
    {
        $result = [];
=======
     *
     * @return array
     *
     * @since  Method available since Release 3.2.14
     */
    public function getPHPUnitConfiguration()
    {
        $result = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $root   = $this->document->documentElement;

        if ($root->hasAttribute('cacheTokens')) {
            $result['cacheTokens'] = $this->getBoolean(
                (string) $root->getAttribute('cacheTokens'),
                false
            );
        }

        if ($root->hasAttribute('columns')) {
            $columns = (string) $root->getAttribute('columns');

<<<<<<< HEAD
            if ($columns === 'max') {
=======
            if ($columns == 'max') {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $result['columns'] = 'max';
            } else {
                $result['columns'] = $this->getInteger($columns, 80);
            }
        }

        if ($root->hasAttribute('colors')) {
            /* only allow boolean for compatibility with previous versions
              'always' only allowed from command line */
            if ($this->getBoolean($root->getAttribute('colors'), false)) {
<<<<<<< HEAD
                $result['colors'] = ResultPrinter::COLOR_AUTO;
            } else {
                $result['colors'] = ResultPrinter::COLOR_NEVER;
=======
                $result['colors'] = PHPUnit_TextUI_ResultPrinter::COLOR_AUTO;
            } else {
                $result['colors'] = PHPUnit_TextUI_ResultPrinter::COLOR_NEVER;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }

        /*
<<<<<<< HEAD
         * @see https://github.com/sebastianbergmann/phpunit/issues/657
=======
         * Issue #657
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
         */
        if ($root->hasAttribute('stderr')) {
            $result['stderr'] = $this->getBoolean(
                (string) $root->getAttribute('stderr'),
                false
            );
        }

        if ($root->hasAttribute('backupGlobals')) {
            $result['backupGlobals'] = $this->getBoolean(
                (string) $root->getAttribute('backupGlobals'),
<<<<<<< HEAD
                false
=======
                true
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            );
        }

        if ($root->hasAttribute('backupStaticAttributes')) {
            $result['backupStaticAttributes'] = $this->getBoolean(
                (string) $root->getAttribute('backupStaticAttributes'),
                false
            );
        }

        if ($root->getAttribute('bootstrap')) {
            $result['bootstrap'] = $this->toAbsolutePath(
                (string) $root->getAttribute('bootstrap')
            );
        }

<<<<<<< HEAD
        if ($root->hasAttribute('convertDeprecationsToExceptions')) {
            $result['convertDeprecationsToExceptions'] = $this->getBoolean(
                (string) $root->getAttribute('convertDeprecationsToExceptions'),
                false
            );
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if ($root->hasAttribute('convertErrorsToExceptions')) {
            $result['convertErrorsToExceptions'] = $this->getBoolean(
                (string) $root->getAttribute('convertErrorsToExceptions'),
                true
            );
        }

        if ($root->hasAttribute('convertNoticesToExceptions')) {
            $result['convertNoticesToExceptions'] = $this->getBoolean(
                (string) $root->getAttribute('convertNoticesToExceptions'),
                true
            );
        }

        if ($root->hasAttribute('convertWarningsToExceptions')) {
            $result['convertWarningsToExceptions'] = $this->getBoolean(
                (string) $root->getAttribute('convertWarningsToExceptions'),
                true
            );
        }

        if ($root->hasAttribute('forceCoversAnnotation')) {
            $result['forceCoversAnnotation'] = $this->getBoolean(
                (string) $root->getAttribute('forceCoversAnnotation'),
                false
            );
        }

<<<<<<< HEAD
        if ($root->hasAttribute('disableCodeCoverageIgnore')) {
            $result['disableCodeCoverageIgnore'] = $this->getBoolean(
                (string) $root->getAttribute('disableCodeCoverageIgnore'),
=======
        if ($root->hasAttribute('mapTestClassNameToCoveredClassName')) {
            $result['mapTestClassNameToCoveredClassName'] = $this->getBoolean(
                (string) $root->getAttribute('mapTestClassNameToCoveredClassName'),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                false
            );
        }

        if ($root->hasAttribute('processIsolation')) {
            $result['processIsolation'] = $this->getBoolean(
                (string) $root->getAttribute('processIsolation'),
                false
            );
        }

<<<<<<< HEAD
        if ($root->hasAttribute('stopOnDefect')) {
            $result['stopOnDefect'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnDefect'),
                false
            );
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if ($root->hasAttribute('stopOnError')) {
            $result['stopOnError'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnError'),
                false
            );
        }

        if ($root->hasAttribute('stopOnFailure')) {
            $result['stopOnFailure'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnFailure'),
                false
            );
        }

<<<<<<< HEAD
        if ($root->hasAttribute('stopOnWarning')) {
            $result['stopOnWarning'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnWarning'),
                false
            );
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if ($root->hasAttribute('stopOnIncomplete')) {
            $result['stopOnIncomplete'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnIncomplete'),
                false
            );
        }

        if ($root->hasAttribute('stopOnRisky')) {
            $result['stopOnRisky'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnRisky'),
                false
            );
        }

        if ($root->hasAttribute('stopOnSkipped')) {
            $result['stopOnSkipped'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnSkipped'),
                false
            );
        }

<<<<<<< HEAD
        if ($root->hasAttribute('failOnWarning')) {
            $result['failOnWarning'] = $this->getBoolean(
                (string) $root->getAttribute('failOnWarning'),
                false
            );
        }

        if ($root->hasAttribute('failOnRisky')) {
            $result['failOnRisky'] = $this->getBoolean(
                (string) $root->getAttribute('failOnRisky'),
                false
            );
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if ($root->hasAttribute('testSuiteLoaderClass')) {
            $result['testSuiteLoaderClass'] = (string) $root->getAttribute(
                'testSuiteLoaderClass'
            );
        }

<<<<<<< HEAD
        if ($root->hasAttribute('defaultTestSuite')) {
            $result['defaultTestSuite'] = (string) $root->getAttribute(
                'defaultTestSuite'
            );
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if ($root->getAttribute('testSuiteLoaderFile')) {
            $result['testSuiteLoaderFile'] = $this->toAbsolutePath(
                (string) $root->getAttribute('testSuiteLoaderFile')
            );
        }

        if ($root->hasAttribute('printerClass')) {
            $result['printerClass'] = (string) $root->getAttribute(
                'printerClass'
            );
        }

        if ($root->getAttribute('printerFile')) {
            $result['printerFile'] = $this->toAbsolutePath(
                (string) $root->getAttribute('printerFile')
            );
        }

<<<<<<< HEAD
        if ($root->hasAttribute('beStrictAboutChangesToGlobalState')) {
            $result['beStrictAboutChangesToGlobalState'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutChangesToGlobalState'),
                false
            );
        }

        if ($root->hasAttribute('beStrictAboutOutputDuringTests')) {
            $result['disallowTestOutput'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutOutputDuringTests'),
                false
            );
        }

        if ($root->hasAttribute('beStrictAboutResourceUsageDuringSmallTests')) {
            $result['beStrictAboutResourceUsageDuringSmallTests'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutResourceUsageDuringSmallTests'),
                false
            );
        }

        if ($root->hasAttribute('beStrictAboutTestsThatDoNotTestAnything')) {
            $result['reportUselessTests'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutTestsThatDoNotTestAnything'),
                true
            );
        }

        if ($root->hasAttribute('beStrictAboutTodoAnnotatedTests')) {
            $result['disallowTodoAnnotatedTests'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutTodoAnnotatedTests'),
                false
            );
        }

        if ($root->hasAttribute('beStrictAboutCoversAnnotation')) {
            $result['strictCoverage'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutCoversAnnotation'),
                false
            );
        }

        if ($root->hasAttribute('defaultTimeLimit')) {
            $result['defaultTimeLimit'] = $this->getInteger(
                (string) $root->getAttribute('defaultTimeLimit'),
                1
            );
        }

        if ($root->hasAttribute('enforceTimeLimit')) {
            $result['enforceTimeLimit'] = $this->getBoolean(
                (string) $root->getAttribute('enforceTimeLimit'),
                false
            );
        }

        if ($root->hasAttribute('ignoreDeprecatedCodeUnitsFromCodeCoverage')) {
            $result['ignoreDeprecatedCodeUnitsFromCodeCoverage'] = $this->getBoolean(
                (string) $root->getAttribute('ignoreDeprecatedCodeUnitsFromCodeCoverage'),
                false
            );
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if ($root->hasAttribute('timeoutForSmallTests')) {
            $result['timeoutForSmallTests'] = $this->getInteger(
                (string) $root->getAttribute('timeoutForSmallTests'),
                1
            );
        }

        if ($root->hasAttribute('timeoutForMediumTests')) {
            $result['timeoutForMediumTests'] = $this->getInteger(
                (string) $root->getAttribute('timeoutForMediumTests'),
                10
            );
        }

        if ($root->hasAttribute('timeoutForLargeTests')) {
            $result['timeoutForLargeTests'] = $this->getInteger(
                (string) $root->getAttribute('timeoutForLargeTests'),
                60
            );
        }

<<<<<<< HEAD
        if ($root->hasAttribute('reverseDefectList')) {
            $result['reverseDefectList'] = $this->getBoolean(
                (string) $root->getAttribute('reverseDefectList'),
=======
        if ($root->hasAttribute('beStrictAboutTestsThatDoNotTestAnything')) {
            $result['reportUselessTests'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutTestsThatDoNotTestAnything'),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                false
            );
        }

<<<<<<< HEAD
=======
        if ($root->hasAttribute('checkForUnintentionallyCoveredCode')) {
            $result['strictCoverage'] = $this->getBoolean(
                (string) $root->getAttribute('checkForUnintentionallyCoveredCode'),
                false
            );
        }

        if ($root->hasAttribute('beStrictAboutOutputDuringTests')) {
            $result['disallowTestOutput'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutOutputDuringTests'),
                false
            );
        }

        if ($root->hasAttribute('beStrictAboutChangesToGlobalState')) {
            $result['disallowChangesToGlobalState'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutChangesToGlobalState'),
                false
            );
        }

        if ($root->hasAttribute('beStrictAboutTestSize')) {
            $result['enforceTimeLimit'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutTestSize'),
                false
            );
        }

        if ($root->hasAttribute('beStrictAboutTodoAnnotatedTests')) {
            $result['disallowTodoAnnotatedTests'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutTodoAnnotatedTests'),
                false
            );
        }

        if ($root->hasAttribute('strict')) {
            $flag = $this->getBoolean(
                (string) $root->getAttribute('strict'),
                false
            );

            $result['reportUselessTests']          = $flag;
            $result['strictCoverage']              = $flag;
            $result['disallowTestOutput']          = $flag;
            $result['enforceTimeLimit']            = $flag;
            $result['disallowTodoAnnotatedTests']  = $flag;
            $result['deprecatedStrictModeSetting'] = true;
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if ($root->hasAttribute('verbose')) {
            $result['verbose'] = $this->getBoolean(
                (string) $root->getAttribute('verbose'),
                false
            );
        }

<<<<<<< HEAD
        if ($root->hasAttribute('testdox')) {
            $testdox = $this->getBoolean(
                (string) $root->getAttribute('testdox'),
                false
            );

            if ($testdox) {
                if (isset($result['printerClass'])) {
                    $result['conflictBetweenPrinterClassAndTestdox'] = true;
                } else {
                    $result['printerClass'] = CliTestDoxPrinter::class;
                }
            }
        }

        if ($root->hasAttribute('registerMockObjectsFromTestArgumentsRecursively')) {
            $result['registerMockObjectsFromTestArgumentsRecursively'] = $this->getBoolean(
                (string) $root->getAttribute('registerMockObjectsFromTestArgumentsRecursively'),
                false
            );
        }

        if ($root->hasAttribute('extensionsDirectory')) {
            $result['extensionsDirectory'] = $this->toAbsolutePath(
                (string) $root->getAttribute(
                    'extensionsDirectory'
                )
            );
        }

        if ($root->hasAttribute('cacheResult')) {
            $result['cacheResult'] = $this->getBoolean(
                (string) $root->getAttribute('cacheResult'),
                true
            );
        }

        if ($root->hasAttribute('cacheResultFile')) {
            $result['cacheResultFile'] = $this->toAbsolutePath(
                (string) $root->getAttribute('cacheResultFile')
            );
        }

        if ($root->hasAttribute('executionOrder')) {
            foreach (explode(',', $root->getAttribute('executionOrder')) as $order) {
                switch ($order) {
                    case 'default':
                        $result['executionOrder']        = TestSuiteSorter::ORDER_DEFAULT;
                        $result['executionOrderDefects'] = TestSuiteSorter::ORDER_DEFAULT;
                        $result['resolveDependencies']   = false;

                        break;

                    case 'defects':
                        $result['executionOrderDefects'] = TestSuiteSorter::ORDER_DEFECTS_FIRST;

                        break;

                    case 'depends':
                        $result['resolveDependencies'] = true;

                        break;

                    case 'duration':
                        $result['executionOrder'] = TestSuiteSorter::ORDER_DURATION;

                        break;

                    case 'no-depends':
                        $result['resolveDependencies'] = false;

                        break;

                    case 'random':
                        $result['executionOrder'] = TestSuiteSorter::ORDER_RANDOMIZED;

                        break;

                    case 'reverse':
                        $result['executionOrder'] = TestSuiteSorter::ORDER_REVERSED;

                        break;

                    case 'size':
                        $result['executionOrder'] = TestSuiteSorter::ORDER_SIZE;

                        break;
                }
            }
        }

        if ($root->hasAttribute('resolveDependencies')) {
            $result['resolveDependencies'] = $this->getBoolean(
                (string) $root->getAttribute('resolveDependencies'),
                false
            );
        }

        if ($root->hasAttribute('noInteraction')) {
            $result['noInteraction'] = $this->getBoolean(
                (string) $root->getAttribute('noInteraction'),
                false
=======
        return $result;
    }

    /**
     * Returns the SeleniumTestCase browser configuration.
     *
     * @return array
     *
     * @since  Method available since Release 3.2.9
     */
    public function getSeleniumBrowserConfiguration()
    {
        $result = array();

        foreach ($this->xpath->query('selenium/browser') as $config) {
            $name    = (string) $config->getAttribute('name');
            $browser = (string) $config->getAttribute('browser');

            if ($config->hasAttribute('host')) {
                $host = (string) $config->getAttribute('host');
            } else {
                $host = 'localhost';
            }

            if ($config->hasAttribute('port')) {
                $port = $this->getInteger(
                    (string) $config->getAttribute('port'),
                    4444
                );
            } else {
                $port = 4444;
            }

            if ($config->hasAttribute('timeout')) {
                $timeout = $this->getInteger(
                    (string) $config->getAttribute('timeout'),
                    30000
                );
            } else {
                $timeout = 30000;
            }

            $result[] = array(
              'name'    => $name,
              'browser' => $browser,
              'host'    => $host,
              'port'    => $port,
              'timeout' => $timeout
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            );
        }

        return $result;
    }

    /**
     * Returns the test suite configuration.
     *
<<<<<<< HEAD
     * @throws Exception
     */
    public function getTestSuiteConfiguration(string $testSuiteFilter = ''): TestSuite
    {
        $testSuiteNodes = $this->xpath->query('testsuites/testsuite');

        if ($testSuiteNodes->length === 0) {
            $testSuiteNodes = $this->xpath->query('testsuite');
        }

        if ($testSuiteNodes->length === 1) {
            return $this->getTestSuite($testSuiteNodes->item(0), $testSuiteFilter);
        }

        $suite = new TestSuite;

        foreach ($testSuiteNodes as $testSuiteNode) {
            $suite->addTestSuite(
                $this->getTestSuite($testSuiteNode, $testSuiteFilter)
            );
        }

        return $suite;
    }

    /**
     * Returns the test suite names from the configuration.
     */
    public function getTestSuiteNames(): array
    {
        $names = [];

        foreach ($this->xpath->query('*/testsuite') as $node) {
            /* @var DOMElement $node */
            $names[] = $node->getAttribute('name');
        }

        return $names;
    }

    private function validateConfigurationAgainstSchema(): void
    {
        $original    = libxml_use_internal_errors(true);
        $xsdFilename = __DIR__ . '/../../phpunit.xsd';

        if (defined('__PHPUNIT_PHAR_ROOT__')) {
            $xsdFilename = __PHPUNIT_PHAR_ROOT__ . '/phpunit.xsd';
        }

        $this->document->schemaValidateSource(file_get_contents($xsdFilename));
        $this->errors = libxml_get_errors();
        libxml_clear_errors();
        libxml_use_internal_errors($original);
    }

    /**
     * Collects and returns the configuration arguments from the PHPUnit
     * XML configuration.
     */
    private function getConfigurationArguments(DOMNodeList $nodes): array
    {
        $arguments = [];

        if ($nodes->length === 0) {
            return $arguments;
        }

        foreach ($nodes as $node) {
            if (!$node instanceof DOMElement) {
                continue;
            }

            if ($node->tagName !== 'arguments') {
                continue;
            }

            foreach ($node->childNodes as $argument) {
                if (!$argument instanceof DOMElement) {
                    continue;
                }

                if ($argument->tagName === 'file' || $argument->tagName === 'directory') {
                    $arguments[] = $this->toAbsolutePath((string) $argument->textContent);
                } else {
                    $arguments[] = Xml::xmlToVariable($argument);
                }
            }
        }

        return $arguments;
    }

    /**
     * @throws \PHPUnit\Framework\Exception
     */
    private function getTestSuite(DOMElement $testSuiteNode, string $testSuiteFilter = ''): TestSuite
    {
        if ($testSuiteNode->hasAttribute('name')) {
            $suite = new TestSuite(
                (string) $testSuiteNode->getAttribute('name')
            );
        } else {
            $suite = new TestSuite;
        }

        $exclude = [];

        foreach ($testSuiteNode->getElementsByTagName('exclude') as $excludeNode) {
            $excludeFile = (string) $excludeNode->textContent;

=======
     * @return PHPUnit_Framework_TestSuite
     *
     * @since  Method available since Release 3.2.1
     */
    public function getTestSuiteConfiguration($testSuiteFilter = null)
    {
        $testSuiteNodes = $this->xpath->query('testsuites/testsuite');

        if ($testSuiteNodes->length == 0) {
            $testSuiteNodes = $this->xpath->query('testsuite');
        }

        if ($testSuiteNodes->length == 1) {
            return $this->getTestSuite($testSuiteNodes->item(0), $testSuiteFilter);
        }

        if ($testSuiteNodes->length > 1) {
            $suite = new PHPUnit_Framework_TestSuite;

            foreach ($testSuiteNodes as $testSuiteNode) {
                $suite->addTestSuite(
                    $this->getTestSuite($testSuiteNode, $testSuiteFilter)
                );
            }

            return $suite;
        }
    }

    /**
     * @param DOMElement $testSuiteNode
     *
     * @return PHPUnit_Framework_TestSuite
     *
     * @since  Method available since Release 3.4.0
     */
    protected function getTestSuite(DOMElement $testSuiteNode, $testSuiteFilter = null)
    {
        if ($testSuiteNode->hasAttribute('name')) {
            $suite = new PHPUnit_Framework_TestSuite(
                (string) $testSuiteNode->getAttribute('name')
            );
        } else {
            $suite = new PHPUnit_Framework_TestSuite;
        }

        $exclude = array();

        foreach ($testSuiteNode->getElementsByTagName('exclude') as $excludeNode) {
            $excludeFile = (string) $excludeNode->textContent;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if ($excludeFile) {
                $exclude[] = $this->toAbsolutePath($excludeFile);
            }
        }

<<<<<<< HEAD
        $fileIteratorFacade = new FileIteratorFacade;
        $testSuiteFilter    = $testSuiteFilter ? explode(',', $testSuiteFilter) : [];

        foreach ($testSuiteNode->getElementsByTagName('directory') as $directoryNode) {
            assert($directoryNode instanceof DOMElement);

            if (!empty($testSuiteFilter) && !in_array($directoryNode->parentNode->getAttribute('name'), $testSuiteFilter, true)) {
=======
        $fileIteratorFacade = new File_Iterator_Facade;

        foreach ($testSuiteNode->getElementsByTagName('directory') as $directoryNode) {
            if ($testSuiteFilter && $directoryNode->parentNode->getAttribute('name') != $testSuiteFilter) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                continue;
            }

            $directory = (string) $directoryNode->textContent;

            if (empty($directory)) {
                continue;
            }

<<<<<<< HEAD
            if (!$this->satisfiesPhpVersion($directoryNode)) {
                continue;
            }

            $files = $fileIteratorFacade->getFilesAsArray(
                $this->toAbsolutePath($directory),
                $directoryNode->hasAttribute('suffix') ? (string) $directoryNode->getAttribute('suffix') : 'Test.php',
                $directoryNode->hasAttribute('prefix') ? (string) $directoryNode->getAttribute('prefix') : '',
                $exclude
            );

=======
            if ($directoryNode->hasAttribute('phpVersion')) {
                $phpVersion = (string) $directoryNode->getAttribute('phpVersion');
            } else {
                $phpVersion = PHP_VERSION;
            }

            if ($directoryNode->hasAttribute('phpVersionOperator')) {
                $phpVersionOperator = (string) $directoryNode->getAttribute('phpVersionOperator');
            } else {
                $phpVersionOperator = '>=';
            }

            if (!version_compare(PHP_VERSION, $phpVersion, $phpVersionOperator)) {
                continue;
            }

            if ($directoryNode->hasAttribute('prefix')) {
                $prefix = (string) $directoryNode->getAttribute('prefix');
            } else {
                $prefix = '';
            }

            if ($directoryNode->hasAttribute('suffix')) {
                $suffix = (string) $directoryNode->getAttribute('suffix');
            } else {
                $suffix = 'Test.php';
            }

            $files = $fileIteratorFacade->getFilesAsArray(
                $this->toAbsolutePath($directory),
                $suffix,
                $prefix,
                $exclude
            );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $suite->addTestFiles($files);
        }

        foreach ($testSuiteNode->getElementsByTagName('file') as $fileNode) {
<<<<<<< HEAD
            assert($fileNode instanceof DOMElement);

            if (!empty($testSuiteFilter) && !in_array($fileNode->parentNode->getAttribute('name'), $testSuiteFilter, true)) {
=======
            if ($testSuiteFilter && $fileNode->parentNode->getAttribute('name') != $testSuiteFilter) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                continue;
            }

            $file = (string) $fileNode->textContent;

            if (empty($file)) {
                continue;
            }

<<<<<<< HEAD
=======
            // Get the absolute path to the file
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $file = $fileIteratorFacade->getFilesAsArray(
                $this->toAbsolutePath($file)
            );

            if (!isset($file[0])) {
                continue;
            }

            $file = $file[0];

<<<<<<< HEAD
            if (!$this->satisfiesPhpVersion($fileNode)) {
=======
            if ($fileNode->hasAttribute('phpVersion')) {
                $phpVersion = (string) $fileNode->getAttribute('phpVersion');
            } else {
                $phpVersion = PHP_VERSION;
            }

            if ($fileNode->hasAttribute('phpVersionOperator')) {
                $phpVersionOperator = (string) $fileNode->getAttribute('phpVersionOperator');
            } else {
                $phpVersionOperator = '>=';
            }

            if (!version_compare(PHP_VERSION, $phpVersion, $phpVersionOperator)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                continue;
            }

            $suite->addTestFile($file);
        }

        return $suite;
    }

<<<<<<< HEAD
    private function satisfiesPhpVersion(DOMElement $node): bool
    {
        $phpVersion         = PHP_VERSION;
        $phpVersionOperator = '>=';

        if ($node->hasAttribute('phpVersion')) {
            $phpVersion = (string) $node->getAttribute('phpVersion');
        }

        if ($node->hasAttribute('phpVersionOperator')) {
            $phpVersionOperator = (string) $node->getAttribute('phpVersionOperator');
        }

        return version_compare(PHP_VERSION, $phpVersion, (new VersionComparisonOperator($phpVersionOperator))->asString());
    }

    /**
     * if $value is 'false' or 'true', this returns the value that $value represents.
     * Otherwise, returns $default, which may be a string in rare cases.
     * See PHPUnit\Util\ConfigurationTest::testPHPConfigurationIsReadCorrectly.
     *
     * @param bool|string $default
     *
     * @return bool|string
     */
    private function getBoolean(string $value, $default)
    {
        if (strtolower($value) === 'false') {
            return false;
        }

        if (strtolower($value) === 'true') {
=======
    /**
     * @param string $value
     * @param bool   $default
     *
     * @return bool
     *
     * @since  Method available since Release 3.2.3
     */
    protected function getBoolean($value, $default)
    {
        if (strtolower($value) == 'false') {
            return false;
        } elseif (strtolower($value) == 'true') {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return true;
        }

        return $default;
    }

<<<<<<< HEAD
    private function getInteger(string $value, int $default): int
=======
    /**
     * @param string $value
     * @param bool   $default
     *
     * @return bool
     *
     * @since  Method available since Release 3.6.0
     */
    protected function getInteger($value, $default)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (is_numeric($value)) {
            return (int) $value;
        }

        return $default;
    }

<<<<<<< HEAD
    private function readFilterDirectories(string $query): array
    {
        $directories = [];

        foreach ($this->xpath->query($query) as $directoryNode) {
            assert($directoryNode instanceof DOMElement);

            $directoryPath = (string) $directoryNode->textContent;
=======
    /**
     * @param string $query
     *
     * @return array
     *
     * @since  Method available since Release 3.2.3
     */
    protected function readFilterDirectories($query)
    {
        $directories = array();

        foreach ($this->xpath->query($query) as $directory) {
            $directoryPath = (string) $directory->textContent;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            if (!$directoryPath) {
                continue;
            }

<<<<<<< HEAD
            $directories[] = [
                'path'   => $this->toAbsolutePath($directoryPath),
                'prefix' => $directoryNode->hasAttribute('prefix') ? (string) $directoryNode->getAttribute('prefix') : '',
                'suffix' => $directoryNode->hasAttribute('suffix') ? (string) $directoryNode->getAttribute('suffix') : '.php',
                'group'  => $directoryNode->hasAttribute('group') ? (string) $directoryNode->getAttribute('group') : 'DEFAULT',
            ];
=======
            if ($directory->hasAttribute('prefix')) {
                $prefix = (string) $directory->getAttribute('prefix');
            } else {
                $prefix = '';
            }

            if ($directory->hasAttribute('suffix')) {
                $suffix = (string) $directory->getAttribute('suffix');
            } else {
                $suffix = '.php';
            }

            if ($directory->hasAttribute('group')) {
                $group = (string) $directory->getAttribute('group');
            } else {
                $group = 'DEFAULT';
            }

            $directories[] = array(
              'path'   => $this->toAbsolutePath($directoryPath),
              'prefix' => $prefix,
              'suffix' => $suffix,
              'group'  => $group
            );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $directories;
    }

    /**
<<<<<<< HEAD
     * @return string[]
     */
    private function readFilterFiles(string $query): array
    {
        $files = [];
=======
     * @param string $query
     *
     * @return array
     *
     * @since  Method available since Release 3.2.3
     */
    protected function readFilterFiles($query)
    {
        $files = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        foreach ($this->xpath->query($query) as $file) {
            $filePath = (string) $file->textContent;

            if ($filePath) {
                $files[] = $this->toAbsolutePath($filePath);
            }
        }

        return $files;
    }

<<<<<<< HEAD
    private function toAbsolutePath(string $path, bool $useIncludePath = false): string
    {
        $path = trim($path);

        if (strpos($path, '/') === 0) {
=======
    /**
     * @param string $path
     * @param bool   $useIncludePath
     *
     * @return string
     *
     * @since  Method available since Release 3.5.0
     */
    protected function toAbsolutePath($path, $useIncludePath = false)
    {
        $path = trim($path);

        if ($path[0] === '/') {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return $path;
        }

        // Matches the following on Windows:
        //  - \\NetworkComputer\Path
        //  - \\.\D:
        //  - \\.\c:
        //  - C:\Windows
        //  - C:\windows
        //  - C:/windows
        //  - c:/windows
        if (defined('PHP_WINDOWS_VERSION_BUILD') &&
<<<<<<< HEAD
            ($path[0] === '\\' || (strlen($path) >= 3 && preg_match('#^[A-Z]\:[/\\\]#i', substr($path, 0, 3))))) {
            return $path;
        }

=======
            ($path[0] === '\\' ||
            (strlen($path) >= 3 && preg_match('#^[A-Z]\:[/\\\]#i', substr($path, 0, 3))))) {
            return $path;
        }

        // Stream
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (strpos($path, '://') !== false) {
            return $path;
        }

        $file = dirname($this->filename) . DIRECTORY_SEPARATOR . $path;

        if ($useIncludePath && !file_exists($file)) {
            $includePathFile = stream_resolve_include_path($path);

            if ($includePathFile) {
                $file = $includePathFile;
            }
        }

        return $file;
    }
<<<<<<< HEAD

    private function parseGroupConfiguration(string $root): array
    {
        $groups = [
            'include' => [],
            'exclude' => [],
        ];

        foreach ($this->xpath->query($root . '/include/group') as $group) {
            $groups['include'][] = (string) $group->textContent;
        }

        foreach ($this->xpath->query($root . '/exclude/group') as $group) {
            $groups['exclude'][] = (string) $group->textContent;
        }

        return $groups;
    }

    private function getElementConfigurationParameters(DOMElement $element): array
    {
        $class     = (string) $element->getAttribute('class');
        $file      = '';
        $arguments = $this->getConfigurationArguments($element->childNodes);

        if ($element->getAttribute('file')) {
            $file = $this->toAbsolutePath(
                (string) $element->getAttribute('file'),
                true
            );
        }

        return [
            'class'     => $class,
            'file'      => $file,
            'arguments' => $arguments,
        ];
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
