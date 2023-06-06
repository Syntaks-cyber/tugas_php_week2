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

use ReflectionClass;

/**
 * An interface to define how a test suite should be loaded.
 */
interface TestSuiteLoader
{
    public function load(string $suiteClassName, string $suiteClassFile = ''): ReflectionClass;

    public function reload(ReflectionClass $aClass): ReflectionClass;
=======

/**
 * An interface to define how a test suite should be loaded.
 *
 * @since      Interface available since Release 2.0.0
 */
interface PHPUnit_Runner_TestSuiteLoader
{
    /**
     * @param string $suiteClassName
     * @param string $suiteClassFile
     *
     * @return ReflectionClass
     */
    public function load($suiteClassName, $suiteClassFile = '');

    /**
     * @param ReflectionClass $aClass
     *
     * @return ReflectionClass
     */
    public function reload(ReflectionClass $aClass);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
