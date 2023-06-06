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

use function array_diff;
use function array_values;
use function class_exists;
use function get_declared_classes;
use function realpath;
use function sprintf;
use function str_replace;
use function strlen;
use function substr;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\FileLoader;
use PHPUnit\Util\Filesystem;
use ReflectionClass;
use ReflectionException;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class StandardTestSuiteLoader implements TestSuiteLoader
{
    /**
     * @throws \PHPUnit\Framework\Exception
     * @throws Exception
     */
    public function load(string $suiteClassName, string $suiteClassFile = ''): ReflectionClass
    {
        $suiteClassName = str_replace('.php', '', $suiteClassName);
        $filename       = null;

        if (empty($suiteClassFile)) {
            $suiteClassFile = Filesystem::classNameToFilename(
=======

/**
 * The standard test suite loader.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Runner_StandardTestSuiteLoader implements PHPUnit_Runner_TestSuiteLoader
{
    /**
     * @param string $suiteClassName
     * @param string $suiteClassFile
     *
     * @return ReflectionClass
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function load($suiteClassName, $suiteClassFile = '')
    {
        $suiteClassName = str_replace('.php', '', $suiteClassName);

        if (empty($suiteClassFile)) {
            $suiteClassFile = PHPUnit_Util_Filesystem::classNameToFilename(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $suiteClassName
            );
        }

        if (!class_exists($suiteClassName, false)) {
            $loadedClasses = get_declared_classes();

<<<<<<< HEAD
            $filename = FileLoader::checkAndLoad($suiteClassFile);
=======
            $filename = PHPUnit_Util_Fileloader::checkAndLoad($suiteClassFile);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            $loadedClasses = array_values(
                array_diff(get_declared_classes(), $loadedClasses)
            );
        }

<<<<<<< HEAD
        if (!empty($loadedClasses) && !class_exists($suiteClassName, false)) {
            $offset = 0 - strlen($suiteClassName);

            foreach ($loadedClasses as $loadedClass) {
                try {
                    $class = new ReflectionClass($loadedClass);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd

                if (substr($loadedClass, $offset) === $suiteClassName &&
                    $class->getFileName() == $filename) {
                    $suiteClassName = $loadedClass;

=======
        if (!class_exists($suiteClassName, false) && !empty($loadedClasses)) {
            $offset = 0 - strlen($suiteClassName);

            foreach ($loadedClasses as $loadedClass) {
                $class = new ReflectionClass($loadedClass);
                if (substr($loadedClass, $offset) === $suiteClassName &&
                    $class->getFileName() == $filename) {
                    $suiteClassName = $loadedClass;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    break;
                }
            }
        }

<<<<<<< HEAD
        if (!empty($loadedClasses) && !class_exists($suiteClassName, false)) {
            $testCaseClass = TestCase::class;

            foreach ($loadedClasses as $loadedClass) {
                try {
                    $class = new ReflectionClass($loadedClass);
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
                        $e
                    );
                }
                // @codeCoverageIgnoreEnd

                $classFile = $class->getFileName();

                if ($class->isSubclassOf($testCaseClass) && !$class->isAbstract()) {
=======
        if (!class_exists($suiteClassName, false) && !empty($loadedClasses)) {
            $testCaseClass = 'PHPUnit_Framework_TestCase';

            foreach ($loadedClasses as $loadedClass) {
                $class     = new ReflectionClass($loadedClass);
                $classFile = $class->getFileName();

                if ($class->isSubclassOf($testCaseClass) &&
                    !$class->isAbstract()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $suiteClassName = $loadedClass;
                    $testCaseClass  = $loadedClass;

                    if ($classFile == realpath($suiteClassFile)) {
                        break;
                    }
                }

                if ($class->hasMethod('suite')) {
<<<<<<< HEAD
                    try {
                        $method = $class->getMethod('suite');
                        // @codeCoverageIgnoreStart
                    } catch (ReflectionException $e) {
                        throw new Exception(
                            $e->getMessage(),
                            $e->getCode(),
                            $e
                        );
                    }
                    // @codeCoverageIgnoreEnd

                    if (!$method->isAbstract() && $method->isPublic() && $method->isStatic()) {
=======
                    $method = $class->getMethod('suite');

                    if (!$method->isAbstract() &&
                        $method->isPublic() &&
                        $method->isStatic()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                        $suiteClassName = $loadedClass;

                        if ($classFile == realpath($suiteClassFile)) {
                            break;
                        }
                    }
                }
            }
        }

        if (class_exists($suiteClassName, false)) {
<<<<<<< HEAD
            try {
                $class = new ReflectionClass($suiteClassName);
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
            $class = new ReflectionClass($suiteClassName);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            if ($class->getFileName() == realpath($suiteClassFile)) {
                return $class;
            }
        }

<<<<<<< HEAD
        throw new Exception(
=======
        throw new PHPUnit_Framework_Exception(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            sprintf(
                "Class '%s' could not be found in '%s'.",
                $suiteClassName,
                $suiteClassFile
            )
        );
    }

<<<<<<< HEAD
    public function reload(ReflectionClass $aClass): ReflectionClass
=======
    /**
     * @param ReflectionClass $aClass
     *
     * @return ReflectionClass
     */
    public function reload(ReflectionClass $aClass)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $aClass;
    }
}
