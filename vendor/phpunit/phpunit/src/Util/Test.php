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

use const PHP_OS;
use const PHP_VERSION;
use function addcslashes;
use function array_flip;
use function array_key_exists;
use function array_keys;
use function array_merge;
use function array_unique;
use function array_unshift;
use function class_exists;
use function class_implements;
use function class_parents;
use function count;
use function explode;
use function extension_loaded;
use function function_exists;
use function get_class;
use function ini_get;
use function interface_exists;
use function is_array;
use function is_int;
use function method_exists;
use function phpversion;
use function preg_match;
use function preg_replace;
use function range;
use function sprintf;
use function str_replace;
use function strncmp;
use function strpos;
use function trait_exists;
use function version_compare;
use PHPUnit\Framework\CodeCoverageException;
use PHPUnit\Framework\InvalidCoversTargetException;
use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Warning;
use PHPUnit\Runner\Version;
use PHPUnit\Util\Annotation\Registry;
use ReflectionClass;
use ReflectionException;
use ReflectionFunction;
use ReflectionMethod;
use SebastianBergmann\Environment\OperatingSystem;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Test
{
    /**
     * @var int
     */
    public const UNKNOWN = -1;

    /**
     * @var int
     */
    public const SMALL = 0;

    /**
     * @var int
     */
    public const MEDIUM = 1;

    /**
     * @var int
     */
    public const LARGE = 2;

    /**
     * @var array
     */
    private static $hookMethods = [];

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function describe(\PHPUnit\Framework\Test $test): array
    {
        if ($test instanceof TestCase) {
            return [get_class($test), $test->getName()];
        }

        if ($test instanceof SelfDescribing) {
            return ['', $test->toString()];
        }

        return ['', get_class($test)];
    }

    public static function describeAsString(\PHPUnit\Framework\Test $test): string
    {
        if ($test instanceof SelfDescribing) {
            return $test->toString();
        }

        return get_class($test);
    }

    /**
     * @throws CodeCoverageException
     *
     * @return array|bool
     *
     * @psalm-param class-string $className
     */
    public static function getLinesToBeCovered(string $className, string $methodName)
=======

if (!function_exists('trait_exists')) {
    function trait_exists($traitname, $autoload = true)
    {
        return false;
    }
}

/**
 * Test helpers.
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Util_Test
{
    const REGEX_DATA_PROVIDER      = '/@dataProvider\s+([a-zA-Z0-9._:-\\\\x7f-\xff]+)/';
    const REGEX_TEST_WITH          = '/@testWith\s+/';
    const REGEX_EXPECTED_EXCEPTION = '(@expectedException\s+([:.\w\\\\x7f-\xff]+)(?:[\t ]+(\S*))?(?:[\t ]+(\S*))?\s*$)m';
    const REGEX_REQUIRES_VERSION   = '/@requires\s+(?P<name>PHP(?:Unit)?)\s+(?P<value>[\d\.-]+(dev|(RC|alpha|beta)[\d\.])?)[ \t]*\r?$/m';
    const REGEX_REQUIRES_OS        = '/@requires\s+OS\s+(?P<value>.+?)[ \t]*\r?$/m';
    const REGEX_REQUIRES           = '/@requires\s+(?P<name>function|extension)\s+(?P<value>([^ ]+?))[ \t]*\r?$/m';

    const UNKNOWN = -1;
    const SMALL   = 0;
    const MEDIUM  = 1;
    const LARGE   = 2;

    private static $annotationCache = array();

    private static $hookMethods = array();

    /**
     * @param PHPUnit_Framework_Test $test
     * @param bool                   $asString
     *
     * @return mixed
     */
    public static function describe(PHPUnit_Framework_Test $test, $asString = true)
    {
        if ($asString) {
            if ($test instanceof PHPUnit_Framework_SelfDescribing) {
                return $test->toString();
            } else {
                return get_class($test);
            }
        } else {
            if ($test instanceof PHPUnit_Framework_TestCase) {
                return array(
                  get_class($test), $test->getName()
                );
            } elseif ($test instanceof PHPUnit_Framework_SelfDescribing) {
                return array('', $test->toString());
            } else {
                return array('', get_class($test));
            }
        }
    }

    /**
     * @param string $className
     * @param string $methodName
     *
     * @return array|bool
     *
     * @throws PHPUnit_Framework_CodeCoverageException
     *
     * @since  Method available since Release 4.0.0
     */
    public static function getLinesToBeCovered($className, $methodName)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

<<<<<<< HEAD
        if (!self::shouldCoversAnnotationBeUsed($annotations)) {
=======
        if (isset($annotations['class']['coversNothing']) || isset($annotations['method']['coversNothing'])) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return false;
        }

        return self::getLinesToBeCoveredOrUsed($className, $methodName, 'covers');
    }

    /**
     * Returns lines of code specified with the @uses annotation.
     *
<<<<<<< HEAD
     * @throws CodeCoverageException
     *
     * @psalm-param class-string $className
     */
    public static function getLinesToBeUsed(string $className, string $methodName): array
=======
     * @param string $className
     * @param string $methodName
     *
     * @return array
     *
     * @since  Method available since Release 4.0.0
     */
    public static function getLinesToBeUsed($className, $methodName)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return self::getLinesToBeCoveredOrUsed($className, $methodName, 'uses');
    }

<<<<<<< HEAD
    public static function requiresCodeCoverageDataCollection(TestCase $test): bool
    {
        $annotations = $test->getAnnotations();

        // If there is no @covers annotation but a @coversNothing annotation on
        // the test method then code coverage data does not need to be collected
        if (isset($annotations['method']['coversNothing'])) {
            return false;
        }

        // If there is at least one @covers annotation then
        // code coverage data needs to be collected
        if (isset($annotations['method']['covers'])) {
            return true;
        }

        // If there is no @covers annotation but a @coversNothing annotation
        // then code coverage data does not need to be collected
        if (isset($annotations['class']['coversNothing'])) {
            return false;
        }

        // If there is no @coversNothing annotation then
        // code coverage data may be collected
        return true;
    }

    /**
     * @throws Exception
     *
     * @psalm-param class-string $className
     */
    public static function getRequirements(string $className, string $methodName): array
    {
        return self::mergeArraysRecursively(
            Registry::getInstance()->forClassName($className)->requirements(),
            Registry::getInstance()->forMethod($className, $methodName)->requirements()
        );
    }

    /**
     * Returns the missing requirements for a test.
     *
     * @throws Exception
     * @throws Warning
     *
     * @psalm-param class-string $className
     */
    public static function getMissingRequirements(string $className, string $methodName): array
    {
        $required = self::getRequirements($className, $methodName);
        $missing  = [];
        $hint     = null;

        if (!empty($required['PHP'])) {
            $operator = new VersionComparisonOperator(empty($required['PHP']['operator']) ? '>=' : $required['PHP']['operator']);

            if (!version_compare(PHP_VERSION, $required['PHP']['version'], $operator->asString())) {
                $missing[] = sprintf('PHP %s %s is required.', $operator->asString(), $required['PHP']['version']);
                $hint      = 'PHP';
            }
        } elseif (!empty($required['PHP_constraint'])) {
            $version = new \PharIo\Version\Version(self::sanitizeVersionNumber(PHP_VERSION));

            if (!$required['PHP_constraint']['constraint']->complies($version)) {
                $missing[] = sprintf(
                    'PHP version does not match the required constraint %s.',
                    $required['PHP_constraint']['constraint']->asString()
                );

                $hint = 'PHP_constraint';
            }
        }

        if (!empty($required['PHPUnit'])) {
            $phpunitVersion = Version::id();

            $operator = new VersionComparisonOperator(empty($required['PHPUnit']['operator']) ? '>=' : $required['PHPUnit']['operator']);

            if (!version_compare($phpunitVersion, $required['PHPUnit']['version'], $operator->asString())) {
                $missing[] = sprintf('PHPUnit %s %s is required.', $operator->asString(), $required['PHPUnit']['version']);
                $hint      = $hint ?? 'PHPUnit';
            }
        } elseif (!empty($required['PHPUnit_constraint'])) {
            $phpunitVersion = new \PharIo\Version\Version(self::sanitizeVersionNumber(Version::id()));

            if (!$required['PHPUnit_constraint']['constraint']->complies($phpunitVersion)) {
                $missing[] = sprintf(
                    'PHPUnit version does not match the required constraint %s.',
                    $required['PHPUnit_constraint']['constraint']->asString()
                );

                $hint = $hint ?? 'PHPUnit_constraint';
            }
        }

        if (!empty($required['OSFAMILY']) && $required['OSFAMILY'] !== (new OperatingSystem)->getFamily()) {
            $missing[] = sprintf('Operating system %s is required.', $required['OSFAMILY']);
            $hint      = $hint ?? 'OSFAMILY';
        }

        if (!empty($required['OS'])) {
            $requiredOsPattern = sprintf('/%s/i', addcslashes($required['OS'], '/'));

            if (!preg_match($requiredOsPattern, PHP_OS)) {
                $missing[] = sprintf('Operating system matching %s is required.', $requiredOsPattern);
                $hint      = $hint ?? 'OS';
            }
        }

        if (!empty($required['functions'])) {
            foreach ($required['functions'] as $function) {
                $pieces = explode('::', $function);

                if (count($pieces) === 2 && class_exists($pieces[0]) && method_exists($pieces[0], $pieces[1])) {
                    continue;
                }

                if (function_exists($function)) {
                    continue;
                }

                $missing[] = sprintf('Function %s is required.', $function);
                $hint      = $hint ?? 'function_' . $function;
            }
        }

        if (!empty($required['setting'])) {
            foreach ($required['setting'] as $setting => $value) {
                if (ini_get($setting) !== $value) {
                    $missing[] = sprintf('Setting "%s" must be "%s".', $setting, $value);
                    $hint      = $hint ?? '__SETTING_' . $setting;
                }
            }
        }

        if (!empty($required['extensions'])) {
            foreach ($required['extensions'] as $extension) {
                if (isset($required['extension_versions'][$extension])) {
                    continue;
                }

                if (!extension_loaded($extension)) {
                    $missing[] = sprintf('Extension %s is required.', $extension);
                    $hint      = $hint ?? 'extension_' . $extension;
                }
            }
        }

        if (!empty($required['extension_versions'])) {
            foreach ($required['extension_versions'] as $extension => $req) {
                $actualVersion = phpversion($extension);

                $operator = new VersionComparisonOperator(empty($req['operator']) ? '>=' : $req['operator']);

                if ($actualVersion === false || !version_compare($actualVersion, $req['version'], $operator->asString())) {
                    $missing[] = sprintf('Extension %s %s %s is required.', $extension, $operator->asString(), $req['version']);
                    $hint      = $hint ?? 'extension_' . $extension;
                }
            }
        }

        if ($hint && isset($required['__OFFSET'])) {
            array_unshift($missing, '__OFFSET_FILE=' . $required['__OFFSET']['__FILE']);
            array_unshift($missing, '__OFFSET_LINE=' . ($required['__OFFSET'][$hint] ?? 1));
        }

        return $missing;
    }

    /**
     * Returns the expected exception for a test.
     *
     * @return array|false
     *
     * @deprecated
     *
     * @codeCoverageIgnore
     *
     * @psalm-param class-string $className
     */
    public static function getExpectedException(string $className, string $methodName)
    {
        return Registry::getInstance()->forMethod($className, $methodName)->expectedException();
    }

    /**
     * Returns the provided data for a method.
     *
     * @throws Exception
     *
     * @psalm-param class-string $className
     */
    public static function getProvidedData(string $className, string $methodName): ?array
    {
        return Registry::getInstance()->forMethod($className, $methodName)->getProvidedData();
    }

    /**
     * @psalm-param class-string $className
     */
    public static function parseTestMethodAnnotations(string $className, ?string $methodName = ''): array
    {
        $registry = Registry::getInstance();

        if ($methodName !== null) {
            try {
                return [
                    'method' => $registry->forMethod($className, $methodName)->symbolAnnotations(),
                    'class'  => $registry->forClassName($className)->symbolAnnotations(),
                ];
            } catch (Exception $methodNotFound) {
                // ignored
            }
        }

        return [
            'method' => null,
            'class'  => $registry->forClassName($className)->symbolAnnotations(),
        ];
    }

    /**
     * @psalm-param class-string $className
     */
    public static function getInlineAnnotations(string $className, string $methodName): array
    {
        return Registry::getInstance()->forMethod($className, $methodName)->getInlineAnnotations();
    }

    /** @psalm-param class-string $className */
    public static function getBackupSettings(string $className, string $methodName): array
    {
        return [
            'backupGlobals'          => self::getBooleanAnnotationSetting(
                $className,
                $methodName,
                'backupGlobals'
            ),
            'backupStaticAttributes' => self::getBooleanAnnotationSetting(
                $className,
                $methodName,
                'backupStaticAttributes'
            ),
        ];
    }

    /** @psalm-param class-string $className */
    public static function getDependencies(string $className, string $methodName): array
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        $dependencies = $annotations['class']['depends'] ?? [];

        if (isset($annotations['method']['depends'])) {
            $dependencies = array_merge(
                $dependencies,
                $annotations['method']['depends']
            );
        }

        return array_unique($dependencies);
    }

    /** @psalm-param class-string $className */
    public static function getGroups(string $className, ?string $methodName = ''): array
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        $groups = [];

        if (isset($annotations['method']['author'])) {
            $groups[] = $annotations['method']['author'];
        } elseif (isset($annotations['class']['author'])) {
            $groups[] = $annotations['class']['author'];
        }

        if (isset($annotations['class']['group'])) {
            $groups[] = $annotations['class']['group'];
        }

        if (isset($annotations['method']['group'])) {
            $groups[] = $annotations['method']['group'];
        }

        if (isset($annotations['class']['ticket'])) {
            $groups[] = $annotations['class']['ticket'];
        }

        if (isset($annotations['method']['ticket'])) {
            $groups[] = $annotations['method']['ticket'];
        }

        foreach (['method', 'class'] as $element) {
            foreach (['small', 'medium', 'large'] as $size) {
                if (isset($annotations[$element][$size])) {
                    $groups[] = [$size];

                    break 2;
                }
            }
        }

        return array_unique(array_merge([], ...$groups));
    }

    /** @psalm-param class-string $className */
    public static function getSize(string $className, ?string $methodName): int
    {
        $groups = array_flip(self::getGroups($className, $methodName));

        if (isset($groups['large'])) {
            return self::LARGE;
        }

        if (isset($groups['medium'])) {
            return self::MEDIUM;
        }

        if (isset($groups['small'])) {
            return self::SMALL;
        }

        return self::UNKNOWN;
    }

    /** @psalm-param class-string $className */
    public static function getProcessIsolationSettings(string $className, string $methodName): bool
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        return isset($annotations['class']['runTestsInSeparateProcesses']) || isset($annotations['method']['runInSeparateProcess']);
    }

    /** @psalm-param class-string $className */
    public static function getClassProcessIsolationSettings(string $className, string $methodName): bool
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        return isset($annotations['class']['runClassInSeparateProcess']);
    }

    /** @psalm-param class-string $className */
    public static function getPreserveGlobalStateSettings(string $className, string $methodName): ?bool
    {
        return self::getBooleanAnnotationSetting(
            $className,
            $methodName,
            'preserveGlobalState'
        );
    }

    /** @psalm-param class-string $className */
    public static function getHookMethods(string $className): array
    {
        if (!class_exists($className, false)) {
            return self::emptyHookMethodsArray();
        }

        if (!isset(self::$hookMethods[$className])) {
            self::$hookMethods[$className] = self::emptyHookMethodsArray();

            try {
                foreach ((new Reflection)->methodsInTestClass(new ReflectionClass($className)) as $method) {
                    $docBlock = Registry::getInstance()->forMethod($className, $method->getName());

                    if ($method->isStatic()) {
                        if ($docBlock->isHookToBeExecutedBeforeClass()) {
                            array_unshift(
                                self::$hookMethods[$className]['beforeClass'],
                                $method->getName()
                            );
                        }

                        if ($docBlock->isHookToBeExecutedAfterClass()) {
                            self::$hookMethods[$className]['afterClass'][] = $method->getName();
                        }
                    }

                    if ($docBlock->isToBeExecutedBeforeTest()) {
                        array_unshift(
                            self::$hookMethods[$className]['before'],
                            $method->getName()
                        );
                    }

                    if ($docBlock->isToBeExecutedAfterTest()) {
                        self::$hookMethods[$className]['after'][] = $method->getName();
                    }
                }
            } catch (ReflectionException $e) {
            }
        }

        return self::$hookMethods[$className];
    }

    public static function isTestMethod(ReflectionMethod $method): bool
    {
        if (!$method->isPublic()) {
            return false;
        }

        if (strpos($method->getName(), 'test') === 0) {
            return true;
        }

        return array_key_exists(
            'test',
            Registry::getInstance()->forMethod(
                $method->getDeclaringClass()->getName(),
                $method->getName()
            )
            ->symbolAnnotations()
        );
    }

    /**
     * @throws CodeCoverageException
     *
     * @psalm-param class-string $className
     */
    private static function getLinesToBeCoveredOrUsed(string $className, string $methodName, string $mode): array
=======
    /**
     * @param string $className
     * @param string $methodName
     * @param string $mode
     *
     * @return array
     *
     * @throws PHPUnit_Framework_CodeCoverageException
     *
     * @since  Method available since Release 4.2.0
     */
    private static function getLinesToBeCoveredOrUsed($className, $methodName, $mode)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        $classShortcut = null;

        if (!empty($annotations['class'][$mode . 'DefaultClass'])) {
            if (count($annotations['class'][$mode . 'DefaultClass']) > 1) {
<<<<<<< HEAD
                throw new CodeCoverageException(
=======
                throw new PHPUnit_Framework_CodeCoverageException(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    sprintf(
                        'More than one @%sClass annotation in class or interface "%s".',
                        $mode,
                        $className
                    )
                );
            }

            $classShortcut = $annotations['class'][$mode . 'DefaultClass'][0];
        }

<<<<<<< HEAD
        $list = $annotations['class'][$mode] ?? [];
=======
        $list = array();

        if (isset($annotations['class'][$mode])) {
            $list = $annotations['class'][$mode];
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if (isset($annotations['method'][$mode])) {
            $list = array_merge($list, $annotations['method'][$mode]);
        }

<<<<<<< HEAD
        $codeList = [];
=======
        $codeList = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        foreach (array_unique($list) as $element) {
            if ($classShortcut && strncmp($element, '::', 2) === 0) {
                $element = $classShortcut . $element;
            }

            $element = preg_replace('/[\s()]+$/', '', $element);
            $element = explode(' ', $element);
            $element = $element[0];

<<<<<<< HEAD
            if ($mode === 'covers' && interface_exists($element)) {
                throw new InvalidCoversTargetException(
                    sprintf(
                        'Trying to @cover interface "%s".',
                        $element
                    )
                );
            }

            $codeList[] = self::resolveElementToReflectionObjects($element);
        }

        return self::resolveReflectionObjectsToLines(array_merge([], ...$codeList));
    }

    private static function emptyHookMethodsArray(): array
    {
        return [
            'beforeClass' => ['setUpBeforeClass'],
            'before'      => ['setUp'],
            'after'       => ['tearDown'],
            'afterClass'  => ['tearDownAfterClass'],
        ];
    }

    /** @psalm-param class-string $className */
    private static function getBooleanAnnotationSetting(string $className, ?string $methodName, string $settingName): ?bool
=======
            $codeList = array_merge(
                $codeList,
                self::resolveElementToReflectionObjects($element)
            );
        }

        return self::resolveReflectionObjectsToLines($codeList);
    }

    /**
     * Returns the requirements for a test.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return array
     *
     * @since  Method available since Release 3.6.0
     */
    public static function getRequirements($className, $methodName)
    {
        $reflector  = new ReflectionClass($className);
        $docComment = $reflector->getDocComment();
        $reflector  = new ReflectionMethod($className, $methodName);
        $docComment .= "\n" . $reflector->getDocComment();
        $requires   = array();

        if ($count = preg_match_all(self::REGEX_REQUIRES_OS, $docComment, $matches)) {
            $requires['OS'] = sprintf(
                '/%s/i',
                addcslashes($matches['value'][$count - 1], '/')
            );
        }
        if ($count = preg_match_all(self::REGEX_REQUIRES_VERSION, $docComment, $matches)) {
            for ($i = 0; $i < $count; $i++) {
                $requires[$matches['name'][$i]] = $matches['value'][$i];
            }
        }

        // https://bugs.php.net/bug.php?id=63055
        $matches = array();

        if ($count = preg_match_all(self::REGEX_REQUIRES, $docComment, $matches)) {
            for ($i = 0; $i < $count; $i++) {
                $name = $matches['name'][$i] . 's';
                if (!isset($requires[$name])) {
                    $requires[$name] = array();
                }
                $requires[$name][] = $matches['value'][$i];
            }
        }

        return $requires;
    }

    /**
     * Returns the missing requirements for a test.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return array
     *
     * @since  Method available since Release 4.3.0
     */
    public static function getMissingRequirements($className, $methodName)
    {
        $required = static::getRequirements($className, $methodName);
        $missing  = array();

        if (!empty($required['PHP']) && version_compare(PHP_VERSION, $required['PHP'], '<')) {
            $missing[] = sprintf('PHP %s (or later) is required.', $required['PHP']);
        }

        if (!empty($required['PHPUnit'])) {
            $phpunitVersion = PHPUnit_Runner_Version::id();
            if (version_compare($phpunitVersion, $required['PHPUnit'], '<')) {
                $missing[] = sprintf('PHPUnit %s (or later) is required.', $required['PHPUnit']);
            }
        }

        if (!empty($required['OS']) && !preg_match($required['OS'], PHP_OS)) {
            $missing[] = sprintf('Operating system matching %s is required.', $required['OS']);
        }

        if (!empty($required['functions'])) {
            foreach ($required['functions'] as $function) {
                $pieces = explode('::', $function);
                if (2 === count($pieces) && method_exists($pieces[0], $pieces[1])) {
                    continue;
                }
                if (function_exists($function)) {
                    continue;
                }
                $missing[] = sprintf('Function %s is required.', $function);
            }
        }

        if (!empty($required['extensions'])) {
            foreach ($required['extensions'] as $extension) {
                if (!extension_loaded($extension)) {
                    $missing[] = sprintf('Extension %s is required.', $extension);
                }
            }
        }

        return $missing;
    }

    /**
     * Returns the expected exception for a test.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return array
     *
     * @since  Method available since Release 3.3.6
     */
    public static function getExpectedException($className, $methodName)
    {
        $reflector  = new ReflectionMethod($className, $methodName);
        $docComment = $reflector->getDocComment();
        $docComment = substr($docComment, 3, -2);

        if (preg_match(self::REGEX_EXPECTED_EXCEPTION, $docComment, $matches)) {
            $annotations = self::parseTestMethodAnnotations(
                $className,
                $methodName
            );

            $class         = $matches[1];
            $code          = null;
            $message       = '';
            $messageRegExp = '';

            if (isset($matches[2])) {
                $message = trim($matches[2]);
            } elseif (isset($annotations['method']['expectedExceptionMessage'])) {
                $message = self::parseAnnotationContent(
                    $annotations['method']['expectedExceptionMessage'][0]
                );
            }

            if (isset($annotations['method']['expectedExceptionMessageRegExp'])) {
                $messageRegExp = self::parseAnnotationContent(
                    $annotations['method']['expectedExceptionMessageRegExp'][0]
                );
            }

            if (isset($matches[3])) {
                $code = $matches[3];
            } elseif (isset($annotations['method']['expectedExceptionCode'])) {
                $code = self::parseAnnotationContent(
                    $annotations['method']['expectedExceptionCode'][0]
                );
            }

            if (is_numeric($code)) {
                $code = (int) $code;
            } elseif (is_string($code) && defined($code)) {
                $code = (int) constant($code);
            }

            return array(
              'class' => $class, 'code' => $code, 'message' => $message, 'message_regex' => $messageRegExp
            );
        }

        return false;
    }

    /**
     * Parse annotation content to use constant/class constant values
     *
     * Constants are specified using a starting '@'. For example: @ClassName::CONST_NAME
     *
     * If the constant is not found the string is used as is to ensure maximum BC.
     *
     * @param string $message
     *
     * @return string
     */
    private static function parseAnnotationContent($message)
    {
        if (strpos($message, '::') !== false && count(explode('::', $message)) == 2) {
            if (defined($message)) {
                $message = constant($message);
            }
        }

        return $message;
    }

    /**
     * Returns the provided data for a method.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return array|Iterator when a data provider is specified and exists
     *                        null           when no data provider is specified
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.2.0
     */
    public static function getProvidedData($className, $methodName)
    {
        $reflector  = new ReflectionMethod($className, $methodName);
        $docComment = $reflector->getDocComment();

        $data = self::getDataFromDataProviderAnnotation($docComment, $className, $methodName);

        if ($data === null) {
            $data = self::getDataFromTestWithAnnotation($docComment);
        }

        if (is_array($data) && empty($data)) {
            throw new PHPUnit_Framework_SkippedTestError;
        }

        if ($data !== null) {
            if (is_object($data)) {
                $data = iterator_to_array($data);
            }

            foreach ($data as $key => $value) {
                if (!is_array($value)) {
                    throw new PHPUnit_Framework_Exception(
                        sprintf(
                            'Data set %s is invalid.',
                            is_int($key) ? '#' . $key : '"' . $key . '"'
                        )
                    );
                }
            }
        }

        return $data;
    }

    /**
     * Returns the provided data for a method.
     *
     * @param string $docComment
     * @param string $className
     * @param string $methodName
     *
     * @return array|Iterator when a data provider is specified and exists
     *                        null           when no data provider is specified
     *
     * @throws PHPUnit_Framework_Exception
     */
    private static function getDataFromDataProviderAnnotation($docComment, $className, $methodName)
    {
        if (preg_match(self::REGEX_DATA_PROVIDER, $docComment, $matches)) {
            $dataProviderMethodNameNamespace = explode('\\', $matches[1]);
            $leaf                            = explode('::', array_pop($dataProviderMethodNameNamespace));
            $dataProviderMethodName          = array_pop($leaf);

            if (!empty($dataProviderMethodNameNamespace)) {
                $dataProviderMethodNameNamespace = implode('\\', $dataProviderMethodNameNamespace) . '\\';
            } else {
                $dataProviderMethodNameNamespace = '';
            }

            if (!empty($leaf)) {
                $dataProviderClassName = $dataProviderMethodNameNamespace . array_pop($leaf);
            } else {
                $dataProviderClassName = $className;
            }

            $dataProviderClass  = new ReflectionClass($dataProviderClassName);
            $dataProviderMethod = $dataProviderClass->getMethod(
                $dataProviderMethodName
            );

            if ($dataProviderMethod->isStatic()) {
                $object = null;
            } else {
                $object = $dataProviderClass->newInstance();
            }

            if ($dataProviderMethod->getNumberOfParameters() == 0) {
                $data = $dataProviderMethod->invoke($object);
            } else {
                $data = $dataProviderMethod->invoke($object, $methodName);
            }

            return $data;
        }
    }

    /**
     * @param string $docComment full docComment string
     *
     * @return array when @testWith annotation is defined
     *               null  when @testWith annotation is omitted
     *
     * @throws PHPUnit_Framework_Exception when @testWith annotation is defined but cannot be parsed
     */
    public static function getDataFromTestWithAnnotation($docComment)
    {
        $docComment = self::cleanUpMultiLineAnnotation($docComment);

        if (preg_match(self::REGEX_TEST_WITH, $docComment, $matches, PREG_OFFSET_CAPTURE)) {
            $offset            = strlen($matches[0][0]) + $matches[0][1];
            $annotationContent = substr($docComment, $offset);
            $data              = array();

            foreach (explode("\n", $annotationContent) as $candidateRow) {
                $candidateRow = trim($candidateRow);

                if ($candidateRow[0] !== '[') {
                    break;
                }

                $dataSet = json_decode($candidateRow, true);

                if (json_last_error() != JSON_ERROR_NONE) {
                    $error = function_exists('json_last_error_msg') ? json_last_error_msg() : json_last_error();

                    throw new PHPUnit_Framework_Exception(
                        'The dataset for the @testWith annotation cannot be parsed: ' . $error
                    );
                }

                $data[] = $dataSet;
            }

            if (!$data) {
                throw new PHPUnit_Framework_Exception('The dataset for the @testWith annotation cannot be parsed.');
            }

            return $data;
        }
    }

    private static function cleanUpMultiLineAnnotation($docComment)
    {
        //removing initial '   * ' for docComment
        $docComment = preg_replace('/' . '\n' . '\s*' . '\*' . '\s?' . '/', "\n", $docComment);
        $docComment = substr($docComment, 0, -1);
        $docComment = rtrim($docComment, "\n");

        return $docComment;
    }

    /**
     * @param string $className
     * @param string $methodName
     *
     * @return array
     *
     * @throws ReflectionException
     *
     * @since  Method available since Release 3.4.0
     */
    public static function parseTestMethodAnnotations($className, $methodName = '')
    {
        if (!isset(self::$annotationCache[$className])) {
            $class                             = new ReflectionClass($className);
            self::$annotationCache[$className] = self::parseAnnotations($class->getDocComment());
        }

        if (!empty($methodName) && !isset(self::$annotationCache[$className . '::' . $methodName])) {
            try {
                $method      = new ReflectionMethod($className, $methodName);
                $annotations = self::parseAnnotations($method->getDocComment());
            } catch (ReflectionException $e) {
                $annotations = array();
            }
            self::$annotationCache[$className . '::' . $methodName] = $annotations;
        }

        return array(
          'class'  => self::$annotationCache[$className],
          'method' => !empty($methodName) ? self::$annotationCache[$className . '::' . $methodName] : array()
        );
    }

    /**
     * @param string $docblock
     *
     * @return array
     *
     * @since  Method available since Release 3.4.0
     */
    private static function parseAnnotations($docblock)
    {
        $annotations = array();
        // Strip away the docblock header and footer to ease parsing of one line annotations
        $docblock = substr($docblock, 3, -2);

        if (preg_match_all('/@(?P<name>[A-Za-z_-]+)(?:[ \t]+(?P<value>.*?))?[ \t]*\r?$/m', $docblock, $matches)) {
            $numMatches = count($matches[0]);

            for ($i = 0; $i < $numMatches; ++$i) {
                $annotations[$matches['name'][$i]][] = $matches['value'][$i];
            }
        }

        return $annotations;
    }

    /**
     * Returns the backup settings for a test.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return array
     *
     * @since  Method available since Release 3.4.0
     */
    public static function getBackupSettings($className, $methodName)
    {
        return array(
          'backupGlobals' => self::getBooleanAnnotationSetting(
              $className,
              $methodName,
              'backupGlobals'
          ),
          'backupStaticAttributes' => self::getBooleanAnnotationSetting(
              $className,
              $methodName,
              'backupStaticAttributes'
          )
        );
    }

    /**
     * Returns the dependencies for a test class or method.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return array
     *
     * @since  Method available since Release 3.4.0
     */
    public static function getDependencies($className, $methodName)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

<<<<<<< HEAD
        if (isset($annotations['method'][$settingName])) {
            if ($annotations['method'][$settingName][0] === 'enabled') {
                return true;
            }

            if ($annotations['method'][$settingName][0] === 'disabled') {
                return false;
            }
        }

        if (isset($annotations['class'][$settingName])) {
            if ($annotations['class'][$settingName][0] === 'enabled') {
                return true;
            }

            if ($annotations['class'][$settingName][0] === 'disabled') {
                return false;
            }
        }

        return null;
    }

    /**
     * @throws InvalidCoversTargetException
     */
    private static function resolveElementToReflectionObjects(string $element): array
    {
        $codeToCoverList = [];

        if (function_exists($element) && strpos($element, '\\') !== false) {
            try {
                $codeToCoverList[] = new ReflectionFunction($element);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
                    $e
                );
            }
            // @codeCoverageIgnoreEnd
        } elseif (strpos($element, '::') !== false) {
            [$className, $methodName] = explode('::', $element);

            if (isset($methodName[0]) && $methodName[0] === '<') {
                $classes = [$className];

                foreach ($classes as $className) {
                    if (!class_exists($className) &&
                        !interface_exists($className) &&
                        !trait_exists($className)) {
                        throw new InvalidCoversTargetException(
=======
        $dependencies = array();

        if (isset($annotations['class']['depends'])) {
            $dependencies = $annotations['class']['depends'];
        }

        if (isset($annotations['method']['depends'])) {
            $dependencies = array_merge(
                $dependencies,
                $annotations['method']['depends']
            );
        }

        return array_unique($dependencies);
    }

    /**
     * Returns the error handler settings for a test.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return bool
     *
     * @since  Method available since Release 3.4.0
     */
    public static function getErrorHandlerSettings($className, $methodName)
    {
        return self::getBooleanAnnotationSetting(
            $className,
            $methodName,
            'errorHandler'
        );
    }

    /**
     * Returns the groups for a test class or method.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return array
     *
     * @since  Method available since Release 3.2.0
     */
    public static function getGroups($className, $methodName = '')
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        $groups = array();

        if (isset($annotations['method']['author'])) {
            $groups = $annotations['method']['author'];
        } elseif (isset($annotations['class']['author'])) {
            $groups = $annotations['class']['author'];
        }

        if (isset($annotations['class']['group'])) {
            $groups = array_merge($groups, $annotations['class']['group']);
        }

        if (isset($annotations['method']['group'])) {
            $groups = array_merge($groups, $annotations['method']['group']);
        }

        if (isset($annotations['class']['ticket'])) {
            $groups = array_merge($groups, $annotations['class']['ticket']);
        }

        if (isset($annotations['method']['ticket'])) {
            $groups = array_merge($groups, $annotations['method']['ticket']);
        }

        foreach (array('method', 'class') as $element) {
            foreach (array('small', 'medium', 'large') as $size) {
                if (isset($annotations[$element][$size])) {
                    $groups[] = $size;
                    break 2;
                }

                if (isset($annotations[$element][$size])) {
                    $groups[] = $size;
                    break 2;
                }
            }
        }

        return array_unique($groups);
    }

    /**
     * Returns the size of the test.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return int
     *
     * @since  Method available since Release 3.6.0
     */
    public static function getSize($className, $methodName)
    {
        $groups = array_flip(self::getGroups($className, $methodName));
        $size   = self::UNKNOWN;
        $class  = new ReflectionClass($className);

        if (isset($groups['large']) ||
            (class_exists('PHPUnit_Extensions_Database_TestCase', false) &&
             $class->isSubclassOf('PHPUnit_Extensions_Database_TestCase')) ||
            (class_exists('PHPUnit_Extensions_SeleniumTestCase', false) &&
             $class->isSubclassOf('PHPUnit_Extensions_SeleniumTestCase'))) {
            $size = self::LARGE;
        } elseif (isset($groups['medium'])) {
            $size = self::MEDIUM;
        } elseif (isset($groups['small'])) {
            $size = self::SMALL;
        }

        return $size;
    }

    /**
     * Returns the tickets for a test class or method.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return array
     *
     * @since  Method available since Release 3.4.0
     */
    public static function getTickets($className, $methodName)
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        $tickets = array();

        if (isset($annotations['class']['ticket'])) {
            $tickets = $annotations['class']['ticket'];
        }

        if (isset($annotations['method']['ticket'])) {
            $tickets = array_merge($tickets, $annotations['method']['ticket']);
        }

        return array_unique($tickets);
    }

    /**
     * Returns the process isolation settings for a test.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return bool
     *
     * @since  Method available since Release 3.4.1
     */
    public static function getProcessIsolationSettings($className, $methodName)
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        if (isset($annotations['class']['runTestsInSeparateProcesses']) ||
            isset($annotations['method']['runInSeparateProcess'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Returns the preserve global state settings for a test.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return bool
     *
     * @since  Method available since Release 3.4.0
     */
    public static function getPreserveGlobalStateSettings($className, $methodName)
    {
        return self::getBooleanAnnotationSetting(
            $className,
            $methodName,
            'preserveGlobalState'
        );
    }

    /**
     * @param string $className
     *
     * @return array
     *
     * @since  Method available since Release 4.0.8
     */
    public static function getHookMethods($className)
    {
        if (!class_exists($className, false)) {
            return self::emptyHookMethodsArray();
        }

        if (!isset(self::$hookMethods[$className])) {
            self::$hookMethods[$className] = self::emptyHookMethodsArray();

            try {
                $class = new ReflectionClass($className);

                foreach ($class->getMethods() as $method) {
                    if (self::isBeforeClassMethod($method)) {
                        self::$hookMethods[$className]['beforeClass'][] = $method->getName();
                    }

                    if (self::isBeforeMethod($method)) {
                        self::$hookMethods[$className]['before'][] = $method->getName();
                    }

                    if (self::isAfterMethod($method)) {
                        self::$hookMethods[$className]['after'][] = $method->getName();
                    }

                    if (self::isAfterClassMethod($method)) {
                        self::$hookMethods[$className]['afterClass'][] = $method->getName();
                    }
                }
            } catch (ReflectionException $e) {
            }
        }

        return self::$hookMethods[$className];
    }

    /**
     * @return array
     *
     * @since  Method available since Release 4.0.9
     */
    private static function emptyHookMethodsArray()
    {
        return array(
            'beforeClass' => array('setUpBeforeClass'),
            'before'      => array('setUp'),
            'after'       => array('tearDown'),
            'afterClass'  => array('tearDownAfterClass')
        );
    }

    /**
     * @param string $className
     * @param string $methodName
     * @param string $settingName
     *
     * @return bool
     *
     * @since  Method available since Release 3.4.0
     */
    private static function getBooleanAnnotationSetting($className, $methodName, $settingName)
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        $result = null;

        if (isset($annotations['class'][$settingName])) {
            if ($annotations['class'][$settingName][0] == 'enabled') {
                $result = true;
            } elseif ($annotations['class'][$settingName][0] == 'disabled') {
                $result = false;
            }
        }

        if (isset($annotations['method'][$settingName])) {
            if ($annotations['method'][$settingName][0] == 'enabled') {
                $result = true;
            } elseif ($annotations['method'][$settingName][0] == 'disabled') {
                $result = false;
            }
        }

        return $result;
    }

    /**
     * @param string $element
     *
     * @return array
     *
     * @throws PHPUnit_Framework_InvalidCoversTargetException
     *
     * @since  Method available since Release 4.0.0
     */
    private static function resolveElementToReflectionObjects($element)
    {
        $codeToCoverList = array();

        if (strpos($element, '\\') !== false && function_exists($element)) {
            $codeToCoverList[] = new ReflectionFunction($element);
        } elseif (strpos($element, '::') !== false) {
            list($className, $methodName) = explode('::', $element);

            if (isset($methodName[0]) && $methodName[0] == '<') {
                $classes = array($className);

                foreach ($classes as $className) {
                    if (!class_exists($className) &&
                        !interface_exists($className)) {
                        throw new PHPUnit_Framework_InvalidCoversTargetException(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                            sprintf(
                                'Trying to @cover or @use not existing class or ' .
                                'interface "%s".',
                                $className
                            )
                        );
                    }

<<<<<<< HEAD
                    try {
                        $methods = (new ReflectionClass($className))->getMethods();
                        // @codeCoverageIgnoreStart
                    } catch (ReflectionException $e) {
                        throw new Exception(
                            $e->getMessage(),
                            $e->getCode(),
                            $e
                        );
                    }
                    // @codeCoverageIgnoreEnd

                    $inverse    = isset($methodName[1]) && $methodName[1] === '!';
                    $visibility = 'isPublic';
=======
                    $class   = new ReflectionClass($className);
                    $methods = $class->getMethods();
                    $inverse = isset($methodName[1]) && $methodName[1] == '!';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

                    if (strpos($methodName, 'protected')) {
                        $visibility = 'isProtected';
                    } elseif (strpos($methodName, 'private')) {
                        $visibility = 'isPrivate';
<<<<<<< HEAD
                    }

                    foreach ($methods as $method) {
                        if ($inverse && !$method->{$visibility}()) {
                            $codeToCoverList[] = $method;
                        } elseif (!$inverse && $method->{$visibility}()) {
=======
                    } elseif (strpos($methodName, 'public')) {
                        $visibility = 'isPublic';
                    }

                    foreach ($methods as $method) {
                        if ($inverse && !$method->$visibility()) {
                            $codeToCoverList[] = $method;
                        } elseif (!$inverse && $method->$visibility()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                            $codeToCoverList[] = $method;
                        }
                    }
                }
            } else {
<<<<<<< HEAD
                $classes = [$className];

                foreach ($classes as $className) {
                    if ($className === '' && function_exists($methodName)) {
                        try {
                            $codeToCoverList[] = new ReflectionFunction(
                                $methodName
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
                    } else {
                        if (!((class_exists($className) || interface_exists($className) || trait_exists($className)) &&
                            method_exists($className, $methodName))) {
                            throw new InvalidCoversTargetException(
=======
                $classes = array($className);

                foreach ($classes as $className) {
                    if ($className == '' && function_exists($methodName)) {
                        $codeToCoverList[] = new ReflectionFunction(
                            $methodName
                        );
                    } else {
                        if (!((class_exists($className) ||
                               interface_exists($className) ||
                               trait_exists($className)) &&
                              method_exists($className, $methodName))) {
                            throw new PHPUnit_Framework_InvalidCoversTargetException(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                                sprintf(
                                    'Trying to @cover or @use not existing method "%s::%s".',
                                    $className,
                                    $methodName
                                )
                            );
                        }

<<<<<<< HEAD
                        try {
                            $codeToCoverList[] = new ReflectionMethod(
                                $className,
                                $methodName
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
                        $codeToCoverList[] = new ReflectionMethod(
                            $className,
                            $methodName
                        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    }
                }
            }
        } else {
            $extended = false;

            if (strpos($element, '<extended>') !== false) {
                $element  = str_replace('<extended>', '', $element);
                $extended = true;
            }

<<<<<<< HEAD
            $classes = [$element];
=======
            $classes = array($element);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            if ($extended) {
                $classes = array_merge(
                    $classes,
                    class_implements($element),
                    class_parents($element)
                );
            }

            foreach ($classes as $className) {
                if (!class_exists($className) &&
                    !interface_exists($className) &&
                    !trait_exists($className)) {
<<<<<<< HEAD
                    throw new InvalidCoversTargetException(
=======
                    throw new PHPUnit_Framework_InvalidCoversTargetException(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                        sprintf(
                            'Trying to @cover or @use not existing class or ' .
                            'interface "%s".',
                            $className
                        )
                    );
                }

<<<<<<< HEAD
                try {
                    $codeToCoverList[] = new ReflectionClass($className);
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
                $codeToCoverList[] = new ReflectionClass($className);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }

        return $codeToCoverList;
    }

<<<<<<< HEAD
    private static function resolveReflectionObjectsToLines(array $reflectors): array
    {
        $result = [];

        foreach ($reflectors as $reflector) {
            if ($reflector instanceof ReflectionClass) {
                foreach ($reflector->getTraits() as $trait) {
                    $reflectors[] = $trait;
                }
            }
        }
=======
    /**
     * @param array $reflectors
     *
     * @return array
     */
    private static function resolveReflectionObjectsToLines(array $reflectors)
    {
        $result = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        foreach ($reflectors as $reflector) {
            $filename = $reflector->getFileName();

            if (!isset($result[$filename])) {
<<<<<<< HEAD
                $result[$filename] = [];
            }

            $result[$filename] = array_merge(
                $result[$filename],
                range($reflector->getStartLine(), $reflector->getEndLine())
            );
        }

        foreach ($result as $filename => $lineNumbers) {
            $result[$filename] = array_keys(array_flip($lineNumbers));
        }

=======
                $result[$filename] = array();
            }

            $result[$filename] = array_unique(
                array_merge(
                    $result[$filename],
                    range($reflector->getStartLine(), $reflector->getEndLine())
                )
            );
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $result;
    }

    /**
<<<<<<< HEAD
     * Trims any extensions from version string that follows after
     * the <major>.<minor>[.<patch>] format.
     */
    private static function sanitizeVersionNumber(string $version)
    {
        return preg_replace(
            '/^(\d+\.\d+(?:.\d+)?).*$/',
            '$1',
            $version
        );
    }

    private static function shouldCoversAnnotationBeUsed(array $annotations): bool
    {
        if (isset($annotations['method']['coversNothing'])) {
            return false;
        }

        if (isset($annotations['method']['covers'])) {
            return true;
        }

        if (isset($annotations['class']['coversNothing'])) {
            return false;
        }

        return true;
    }

    /**
     * Merge two arrays together.
     *
     * If an integer key exists in both arrays and preserveNumericKeys is false, the value
     * from the second array will be appended to the first array. If both values are arrays, they
     * are merged together, else the value of the second array overwrites the one of the first array.
     *
     * This implementation is copied from https://github.com/zendframework/zend-stdlib/blob/76b653c5e99b40eccf5966e3122c90615134ae46/src/ArrayUtils.php
     *
     * Zend Framework (http://framework.zend.com/)
     *
     * @see      http://github.com/zendframework/zf2 for the canonical source repository
     *
     * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
     * @license   http://framework.zend.com/license/new-bsd New BSD License
     */
    private static function mergeArraysRecursively(array $a, array $b): array
    {
        foreach ($b as $key => $value) {
            if (array_key_exists($key, $a)) {
                if (is_int($key)) {
                    $a[] = $value;
                } elseif (is_array($value) && is_array($a[$key])) {
                    $a[$key] = self::mergeArraysRecursively($a[$key], $value);
                } else {
                    $a[$key] = $value;
                }
            } else {
                $a[$key] = $value;
            }
        }

        return $a;
=======
     * @param ReflectionMethod $method
     *
     * @return bool
     *
     * @since  Method available since Release 4.0.8
     */
    private static function isBeforeClassMethod(ReflectionMethod $method)
    {
        return $method->isStatic() && strpos($method->getDocComment(), '@beforeClass') !== false;
    }

    /**
     * @param ReflectionMethod $method
     *
     * @return bool
     *
     * @since  Method available since Release 4.0.8
     */
    private static function isBeforeMethod(ReflectionMethod $method)
    {
        return preg_match('/@before\b/', $method->getDocComment());
    }

    /**
     * @param ReflectionMethod $method
     *
     * @return bool
     *
     * @since  Method available since Release 4.0.8
     */
    private static function isAfterClassMethod(ReflectionMethod $method)
    {
        return $method->isStatic() && strpos($method->getDocComment(), '@afterClass') !== false;
    }

    /**
     * @param ReflectionMethod $method
     *
     * @return bool
     *
     * @since  Method available since Release 4.0.8
     */
    private static function isAfterMethod(ReflectionMethod $method)
    {
        return preg_match('/@after\b/', $method->getDocComment());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
