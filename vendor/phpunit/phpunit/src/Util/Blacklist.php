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
use function class_exists;
use function defined;
use function dirname;
use function strpos;
use function sys_get_temp_dir;
use Composer\Autoload\ClassLoader;
use DeepCopy\DeepCopy;
use Doctrine\Instantiator\Instantiator;
use PharIo\Manifest\Manifest;
use PharIo\Version\Version as PharIoVersion;
use PHP_Token;
use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\Project;
use phpDocumentor\Reflection\Type;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophet;
use ReflectionClass;
use ReflectionException;
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;
use SebastianBergmann\Comparator\Comparator;
use SebastianBergmann\Diff\Diff;
use SebastianBergmann\Environment\Runtime;
use SebastianBergmann\Exporter\Exporter;
use SebastianBergmann\FileIterator\Facade as FileIteratorFacade;
use SebastianBergmann\GlobalState\Snapshot;
use SebastianBergmann\Invoker\Invoker;
use SebastianBergmann\ObjectEnumerator\Enumerator;
use SebastianBergmann\RecursionContext\Context;
use SebastianBergmann\ResourceOperations\ResourceOperations;
use SebastianBergmann\Timer\Timer;
use SebastianBergmann\Type\TypeName;
use SebastianBergmann\Version;
use Text_Template;
use TheSeer\Tokenizer\Tokenizer;
use Webmozart\Assert\Assert;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Blacklist
{
    /**
     * @var array<string,int>
     */
    public static $blacklistedClassNames = [
        // composer
        ClassLoader::class        => 1,

        // doctrine/instantiator
        Instantiator::class       => 1,

        // myclabs/deepcopy
        DeepCopy::class           => 1,

        // phar-io/manifest
        Manifest::class           => 1,

        // phar-io/version
        PharIoVersion::class      => 1,

        // phpdocumentor/reflection-common
        Project::class            => 1,

        // phpdocumentor/reflection-docblock
        DocBlock::class           => 1,

        // phpdocumentor/type-resolver
        Type::class               => 1,

        // phpspec/prophecy
        Prophet::class            => 1,

        // phpunit/phpunit
        TestCase::class           => 2,

        // phpunit/php-code-coverage
        CodeCoverage::class       => 1,

        // phpunit/php-file-iterator
        FileIteratorFacade::class => 1,

        // phpunit/php-invoker
        Invoker::class            => 1,

        // phpunit/php-text-template
        Text_Template::class      => 1,

        // phpunit/php-timer
        Timer::class              => 1,

        // phpunit/php-token-stream
        PHP_Token::class          => 1,

        // sebastian/code-unit-reverse-lookup
        Wizard::class             => 1,

        // sebastian/comparator
        Comparator::class         => 1,

        // sebastian/diff
        Diff::class               => 1,

        // sebastian/environment
        Runtime::class            => 1,

        // sebastian/exporter
        Exporter::class           => 1,

        // sebastian/global-state
        Snapshot::class           => 1,

        // sebastian/object-enumerator
        Enumerator::class         => 1,

        // sebastian/recursion-context
        Context::class            => 1,

        // sebastian/resource-operations
        ResourceOperations::class => 1,

        // sebastian/type
        TypeName::class           => 1,

        // sebastian/version
        Version::class            => 1,

        // theseer/tokenizer
        Tokenizer::class          => 1,

        // webmozart/assert
        Assert::class             => 1,
    ];

    /**
     * @var string[]
=======

/**
 * Utility class for blacklisting PHPUnit's own source code files.
 *
 * @since Class available since Release 4.0.0
 */
class PHPUnit_Util_Blacklist
{
    /**
     * @var array
     */
    public static $blacklistedClassNames = array(
        'File_Iterator'                              => 1,
        'PHP_CodeCoverage'                           => 1,
        'PHP_Invoker'                                => 1,
        'PHP_Timer'                                  => 1,
        'PHP_Token'                                  => 1,
        'PHPUnit_Framework_TestCase'                 => 2,
        'PHPUnit_Extensions_Database_TestCase'       => 2,
        'PHPUnit_Framework_MockObject_Generator'     => 2,
        'PHPUnit_Extensions_SeleniumTestCase'        => 2,
        'Text_Template'                              => 1,
        'Symfony\Component\Yaml\Yaml'                => 1,
        'SebastianBergmann\Diff\Diff'                => 1,
        'SebastianBergmann\Environment\Runtime'      => 1,
        'SebastianBergmann\Comparator\Comparator'    => 1,
        'SebastianBergmann\Exporter\Exporter'        => 1,
        'SebastianBergmann\GlobalState\Snapshot'     => 1,
        'SebastianBergmann\RecursionContext\Context' => 1,
        'SebastianBergmann\Version'                  => 1,
        'Composer\Autoload\ClassLoader'              => 1,
        'Doctrine\Instantiator\Instantiator'         => 1,
        'phpDocumentor\Reflection\DocBlock'          => 1,
        'Prophecy\Prophet'                           => 1
    );

    /**
     * @var array
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private static $directories;

    /**
<<<<<<< HEAD
     * @throws Exception
     *
     * @return string[]
     */
    public function getBlacklistedDirectories(): array
=======
     * @return array
     *
     * @since  Method available since Release 4.1.0
     */
    public function getBlacklistedDirectories()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->initialize();

        return self::$directories;
    }

    /**
<<<<<<< HEAD
     * @throws Exception
     */
    public function isBlacklisted(string $file): bool
=======
     * @param string $file
     *
     * @return bool
     */
    public function isBlacklisted($file)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (defined('PHPUNIT_TESTSUITE')) {
            return false;
        }

        $this->initialize();

        foreach (self::$directories as $directory) {
            if (strpos($file, $directory) === 0) {
                return true;
            }
        }

        return false;
    }

<<<<<<< HEAD
    /**
     * @throws Exception
     */
    private function initialize(): void
    {
        if (self::$directories === null) {
            self::$directories = [];
=======
    private function initialize()
    {
        if (self::$directories === null) {
            self::$directories = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            foreach (self::$blacklistedClassNames as $className => $parent) {
                if (!class_exists($className)) {
                    continue;
                }

<<<<<<< HEAD
                try {
                    $directory = (new ReflectionClass($className))->getFileName();
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
                $reflector = new ReflectionClass($className);
                $directory = $reflector->getFileName();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

                for ($i = 0; $i < $parent; $i++) {
                    $directory = dirname($directory);
                }

                self::$directories[] = $directory;
            }

            // Hide process isolation workaround on Windows.
<<<<<<< HEAD
            if (DIRECTORY_SEPARATOR === '\\') {
                // tempnam() prefix is limited to first 3 chars.
                // @see https://php.net/manual/en/function.tempnam.php
=======
            // @see PHPUnit_Util_PHP::factory()
            // @see PHPUnit_Util_PHP_Windows::process()
            if (DIRECTORY_SEPARATOR === '\\') {
                // tempnam() prefix is limited to first 3 chars.
                // @see http://php.net/manual/en/function.tempnam.php
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                self::$directories[] = sys_get_temp_dir() . '\\PHP';
            }
        }
    }
}
