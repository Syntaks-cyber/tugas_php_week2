<<<<<<< HEAD
<?php declare(strict_types=1);
/*
 * This file is part of sebastian/global-state.
=======
<?php
/*
 * This file is part of the GlobalState package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
namespace SebastianBergmann\GlobalState;

/**
 * A blacklist for global state elements that should not be snapshotted.
 */
final class Blacklist
=======

namespace SebastianBergmann\GlobalState;

use ReflectionClass;

/**
 * A blacklist for global state elements that should not be snapshotted.
 */
class Blacklist
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var array
     */
<<<<<<< HEAD
    private $globalVariables = [];

    /**
     * @var string[]
     */
    private $classes = [];

    /**
     * @var string[]
     */
    private $classNamePrefixes = [];

    /**
     * @var string[]
     */
    private $parentClasses = [];

    /**
     * @var string[]
     */
    private $interfaces = [];
=======
    private $globalVariables = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $staticAttributes = [];

    public function addGlobalVariable(string $variableName): void
=======
    private $classes = array();

    /**
     * @var array
     */
    private $classNamePrefixes = array();

    /**
     * @var array
     */
    private $parentClasses = array();

    /**
     * @var array
     */
    private $interfaces = array();

    /**
     * @var array
     */
    private $staticAttributes = array();

    /**
     * @param string $variableName
     */
    public function addGlobalVariable($variableName)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->globalVariables[$variableName] = true;
    }

<<<<<<< HEAD
    public function addClass(string $className): void
=======
    /**
     * @param string $className
     */
    public function addClass($className)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->classes[] = $className;
    }

<<<<<<< HEAD
    public function addSubclassesOf(string $className): void
=======
    /**
     * @param string $className
     */
    public function addSubclassesOf($className)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->parentClasses[] = $className;
    }

<<<<<<< HEAD
    public function addImplementorsOf(string $interfaceName): void
=======
    /**
     * @param string $interfaceName
     */
    public function addImplementorsOf($interfaceName)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->interfaces[] = $interfaceName;
    }

<<<<<<< HEAD
    public function addClassNamePrefix(string $classNamePrefix): void
=======
    /**
     * @param string $classNamePrefix
     */
    public function addClassNamePrefix($classNamePrefix)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->classNamePrefixes[] = $classNamePrefix;
    }

<<<<<<< HEAD
    public function addStaticAttribute(string $className, string $attributeName): void
    {
        if (!isset($this->staticAttributes[$className])) {
            $this->staticAttributes[$className] = [];
=======
    /**
     * @param string $className
     * @param string $attributeName
     */
    public function addStaticAttribute($className, $attributeName)
    {
        if (!isset($this->staticAttributes[$className])) {
            $this->staticAttributes[$className] = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $this->staticAttributes[$className][$attributeName] = true;
    }

<<<<<<< HEAD
    public function isGlobalVariableBlacklisted(string $variableName): bool
=======
    /**
     * @param  string $variableName
     * @return bool
     */
    public function isGlobalVariableBlacklisted($variableName)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return isset($this->globalVariables[$variableName]);
    }

<<<<<<< HEAD
    public function isStaticAttributeBlacklisted(string $className, string $attributeName): bool
    {
        if (\in_array($className, $this->classes)) {
=======
    /**
     * @param  string $className
     * @param  string $attributeName
     * @return bool
     */
    public function isStaticAttributeBlacklisted($className, $attributeName)
    {
        if (in_array($className, $this->classes)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return true;
        }

        foreach ($this->classNamePrefixes as $prefix) {
<<<<<<< HEAD
            if (\strpos($className, $prefix) === 0) {
=======
            if (strpos($className, $prefix) === 0) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                return true;
            }
        }

<<<<<<< HEAD
        $class = new \ReflectionClass($className);
=======
        $class = new ReflectionClass($className);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        foreach ($this->parentClasses as $type) {
            if ($class->isSubclassOf($type)) {
                return true;
            }
        }

        foreach ($this->interfaces as $type) {
            if ($class->implementsInterface($type)) {
                return true;
            }
        }

        if (isset($this->staticAttributes[$className][$attributeName])) {
            return true;
        }

        return false;
    }
}
