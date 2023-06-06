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

use SebastianBergmann\ObjectReflector\ObjectReflector;
use SebastianBergmann\RecursionContext\Context;
=======

namespace SebastianBergmann\GlobalState;

use ReflectionClass;
use Serializable;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * A snapshot of global state.
 */
class Snapshot
{
    /**
     * @var Blacklist
     */
    private $blacklist;

    /**
     * @var array
     */
<<<<<<< HEAD
    private $globalVariables = [];
=======
    private $globalVariables = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $superGlobalArrays = [];
=======
    private $superGlobalArrays = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $superGlobalVariables = [];
=======
    private $superGlobalVariables = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $staticAttributes = [];
=======
    private $staticAttributes = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $iniSettings = [];
=======
    private $iniSettings = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $includedFiles = [];
=======
    private $includedFiles = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $constants = [];
=======
    private $constants = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $functions = [];
=======
    private $functions = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $interfaces = [];
=======
    private $interfaces = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $classes = [];
=======
    private $classes = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var array
     */
<<<<<<< HEAD
    private $traits = [];

    /**
     * Creates a snapshot of the current global state.
     */
    public function __construct(Blacklist $blacklist = null, bool $includeGlobalVariables = true, bool $includeStaticAttributes = true, bool $includeConstants = true, bool $includeFunctions = true, bool $includeClasses = true, bool $includeInterfaces = true, bool $includeTraits = true, bool $includeIniSettings = true, bool $includeIncludedFiles = true)
=======
    private $traits = array();

    /**
     * Creates a snapshot of the current global state.
     *
     * @param Blacklist $blacklist
     * @param bool      $includeGlobalVariables
     * @param bool      $includeStaticAttributes
     * @param bool      $includeConstants
     * @param bool      $includeFunctions
     * @param bool      $includeClasses
     * @param bool      $includeInterfaces
     * @param bool      $includeTraits
     * @param bool      $includeIniSettings
     * @param bool      $includeIncludedFiles
     */
    public function __construct(Blacklist $blacklist = null, $includeGlobalVariables = true, $includeStaticAttributes = true, $includeConstants = true, $includeFunctions = true, $includeClasses = true, $includeInterfaces = true, $includeTraits = true, $includeIniSettings = true, $includeIncludedFiles = true)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($blacklist === null) {
            $blacklist = new Blacklist;
        }

        $this->blacklist = $blacklist;

        if ($includeConstants) {
            $this->snapshotConstants();
        }

        if ($includeFunctions) {
            $this->snapshotFunctions();
        }

        if ($includeClasses || $includeStaticAttributes) {
            $this->snapshotClasses();
        }

        if ($includeInterfaces) {
            $this->snapshotInterfaces();
        }

        if ($includeGlobalVariables) {
            $this->setupSuperGlobalArrays();
            $this->snapshotGlobals();
        }

        if ($includeStaticAttributes) {
            $this->snapshotStaticAttributes();
        }

        if ($includeIniSettings) {
<<<<<<< HEAD
            $this->iniSettings = \ini_get_all(null, false);
        }

        if ($includeIncludedFiles) {
            $this->includedFiles = \get_included_files();
        }

        if ($includeTraits) {
            $this->traits = \get_declared_traits();
        }
    }

    public function blacklist(): Blacklist
=======
            $this->iniSettings = ini_get_all(null, false);
        }

        if ($includeIncludedFiles) {
            $this->includedFiles = get_included_files();
        }

        if (function_exists('get_declared_traits')) {
            $this->traits = get_declared_traits();
        }
    }

    /**
     * @return Blacklist
     */
    public function blacklist()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->blacklist;
    }

<<<<<<< HEAD
    public function globalVariables(): array
=======
    /**
     * @return array
     */
    public function globalVariables()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->globalVariables;
    }

<<<<<<< HEAD
    public function superGlobalVariables(): array
=======
    /**
     * @return array
     */
    public function superGlobalVariables()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->superGlobalVariables;
    }

<<<<<<< HEAD
    public function superGlobalArrays(): array
=======
    /**
     * Returns a list of all super-global variable arrays.
     *
     * @return array
     */
    public function superGlobalArrays()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->superGlobalArrays;
    }

<<<<<<< HEAD
    public function staticAttributes(): array
=======
    /**
     * @return array
     */
    public function staticAttributes()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->staticAttributes;
    }

<<<<<<< HEAD
    public function iniSettings(): array
=======
    /**
     * @return array
     */
    public function iniSettings()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->iniSettings;
    }

<<<<<<< HEAD
    public function includedFiles(): array
=======
    /**
     * @return array
     */
    public function includedFiles()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->includedFiles;
    }

<<<<<<< HEAD
    public function constants(): array
=======
    /**
     * @return array
     */
    public function constants()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->constants;
    }

<<<<<<< HEAD
    public function functions(): array
=======
    /**
     * @return array
     */
    public function functions()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->functions;
    }

<<<<<<< HEAD
    public function interfaces(): array
=======
    /**
     * @return array
     */
    public function interfaces()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->interfaces;
    }

<<<<<<< HEAD
    public function classes(): array
=======
    /**
     * @return array
     */
    public function classes()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->classes;
    }

<<<<<<< HEAD
    public function traits(): array
=======
    /**
     * @return array
     */
    public function traits()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->traits;
    }

    /**
     * Creates a snapshot user-defined constants.
     */
<<<<<<< HEAD
    private function snapshotConstants(): void
    {
        $constants = \get_defined_constants(true);
=======
    private function snapshotConstants()
    {
        $constants = get_defined_constants(true);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if (isset($constants['user'])) {
            $this->constants = $constants['user'];
        }
    }

    /**
     * Creates a snapshot user-defined functions.
     */
<<<<<<< HEAD
    private function snapshotFunctions(): void
    {
        $functions = \get_defined_functions();
=======
    private function snapshotFunctions()
    {
        $functions = get_defined_functions();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $this->functions = $functions['user'];
    }

    /**
     * Creates a snapshot user-defined classes.
     */
<<<<<<< HEAD
    private function snapshotClasses(): void
    {
        foreach (\array_reverse(\get_declared_classes()) as $className) {
            $class = new \ReflectionClass($className);
=======
    private function snapshotClasses()
    {
        foreach (array_reverse(get_declared_classes()) as $className) {
            $class = new ReflectionClass($className);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            if (!$class->isUserDefined()) {
                break;
            }

            $this->classes[] = $className;
        }

<<<<<<< HEAD
        $this->classes = \array_reverse($this->classes);
=======
        $this->classes = array_reverse($this->classes);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Creates a snapshot user-defined interfaces.
     */
<<<<<<< HEAD
    private function snapshotInterfaces(): void
    {
        foreach (\array_reverse(\get_declared_interfaces()) as $interfaceName) {
            $class = new \ReflectionClass($interfaceName);
=======
    private function snapshotInterfaces()
    {
        foreach (array_reverse(get_declared_interfaces()) as $interfaceName) {
            $class = new ReflectionClass($interfaceName);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            if (!$class->isUserDefined()) {
                break;
            }

            $this->interfaces[] = $interfaceName;
        }

<<<<<<< HEAD
        $this->interfaces = \array_reverse($this->interfaces);
=======
        $this->interfaces = array_reverse($this->interfaces);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Creates a snapshot of all global and super-global variables.
     */
<<<<<<< HEAD
    private function snapshotGlobals(): void
=======
    private function snapshotGlobals()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $superGlobalArrays = $this->superGlobalArrays();

        foreach ($superGlobalArrays as $superGlobalArray) {
            $this->snapshotSuperGlobalArray($superGlobalArray);
        }

<<<<<<< HEAD
        foreach (\array_keys($GLOBALS) as $key) {
            if ($key !== 'GLOBALS' &&
                !\in_array($key, $superGlobalArrays) &&
                $this->canBeSerialized($GLOBALS[$key]) &&
                !$this->blacklist->isGlobalVariableBlacklisted($key)) {
                /* @noinspection UnserializeExploitsInspection */
                $this->globalVariables[$key] = \unserialize(\serialize($GLOBALS[$key]));
=======
        foreach (array_keys($GLOBALS) as $key) {
            if ($key != 'GLOBALS' &&
                !in_array($key, $superGlobalArrays) &&
                $this->canBeSerialized($GLOBALS[$key]) &&
                !$this->blacklist->isGlobalVariableBlacklisted($key)) {
                $this->globalVariables[$key] = unserialize(serialize($GLOBALS[$key]));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }
    }

    /**
     * Creates a snapshot a super-global variable array.
<<<<<<< HEAD
     */
    private function snapshotSuperGlobalArray(string $superGlobalArray): void
    {
        $this->superGlobalVariables[$superGlobalArray] = [];

        if (isset($GLOBALS[$superGlobalArray]) && \is_array($GLOBALS[$superGlobalArray])) {
            foreach ($GLOBALS[$superGlobalArray] as $key => $value) {
                /* @noinspection UnserializeExploitsInspection */
                $this->superGlobalVariables[$superGlobalArray][$key] = \unserialize(\serialize($value));
=======
     *
     * @param $superGlobalArray
     */
    private function snapshotSuperGlobalArray($superGlobalArray)
    {
        $this->superGlobalVariables[$superGlobalArray] = array();

        if (isset($GLOBALS[$superGlobalArray]) && is_array($GLOBALS[$superGlobalArray])) {
            foreach ($GLOBALS[$superGlobalArray] as $key => $value) {
                $this->superGlobalVariables[$superGlobalArray][$key] = unserialize(serialize($value));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }
    }

    /**
     * Creates a snapshot of all static attributes in user-defined classes.
     */
<<<<<<< HEAD
    private function snapshotStaticAttributes(): void
    {
        foreach ($this->classes as $className) {
            $class    = new \ReflectionClass($className);
            $snapshot = [];
=======
    private function snapshotStaticAttributes()
    {
        foreach ($this->classes as $className) {
            $class    = new ReflectionClass($className);
            $snapshot = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            foreach ($class->getProperties() as $attribute) {
                if ($attribute->isStatic()) {
                    $name = $attribute->getName();

                    if ($this->blacklist->isStaticAttributeBlacklisted($className, $name)) {
                        continue;
                    }

                    $attribute->setAccessible(true);
                    $value = $attribute->getValue();

                    if ($this->canBeSerialized($value)) {
<<<<<<< HEAD
                        /* @noinspection UnserializeExploitsInspection */
                        $snapshot[$name] = \unserialize(\serialize($value));
=======
                        $snapshot[$name] = unserialize(serialize($value));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    }
                }
            }

            if (!empty($snapshot)) {
                $this->staticAttributes[$className] = $snapshot;
            }
        }
    }

    /**
     * Returns a list of all super-global variable arrays.
<<<<<<< HEAD
     */
    private function setupSuperGlobalArrays(): void
    {
        $this->superGlobalArrays = [
=======
     *
     * @return array
     */
    private function setupSuperGlobalArrays()
    {
        $this->superGlobalArrays = array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            '_ENV',
            '_POST',
            '_GET',
            '_COOKIE',
            '_SERVER',
            '_FILES',
<<<<<<< HEAD
            '_REQUEST',
        ];
    }

    private function canBeSerialized($variable): bool
    {
        if (\is_scalar($variable) || $variable === null) {
            return true;
        }

        if (\is_resource($variable)) {
            return false;
        }

        foreach ($this->enumerateObjectsAndResources($variable) as $value) {
            if (\is_resource($value)) {
                return false;
            }

            if (\is_object($value)) {
                $class = new \ReflectionClass($value);

                if ($class->isAnonymous()) {
                    return false;
                }

                try {
                    @\serialize($value);
                } catch (\Throwable $t) {
                    return false;
                }
            }
        }

        return true;
    }

    private function enumerateObjectsAndResources($variable): array
    {
        if (isset(\func_get_args()[1])) {
            $processed = \func_get_args()[1];
        } else {
            $processed = new Context;
        }

        $result = [];

        if ($processed->contains($variable)) {
            return $result;
        }

        $array = $variable;
        $processed->add($variable);

        if (\is_array($variable)) {
            foreach ($array as $element) {
                if (!\is_array($element) && !\is_object($element) && !\is_resource($element)) {
                    continue;
                }

                if (!\is_resource($element)) {
                    /** @noinspection SlowArrayOperationsInLoopInspection */
                    $result = \array_merge(
                        $result,
                        $this->enumerateObjectsAndResources($element, $processed)
                    );
                } else {
                    $result[] = $element;
                }
            }
        } else {
            $result[] = $variable;

            foreach ((new ObjectReflector)->getAttributes($variable) as $value) {
                if (!\is_array($value) && !\is_object($value) && !\is_resource($value)) {
                    continue;
                }

                if (!\is_resource($value)) {
                    /** @noinspection SlowArrayOperationsInLoopInspection */
                    $result = \array_merge(
                        $result,
                        $this->enumerateObjectsAndResources($value, $processed)
                    );
                } else {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }
=======
            '_REQUEST'
        );

        if (ini_get('register_long_arrays') == '1') {
            $this->superGlobalArrays = array_merge(
                $this->superGlobalArrays,
                array(
                    'HTTP_ENV_VARS',
                    'HTTP_POST_VARS',
                    'HTTP_GET_VARS',
                    'HTTP_COOKIE_VARS',
                    'HTTP_SERVER_VARS',
                    'HTTP_POST_FILES'
                )
            );
        }
    }

    /**
     * @param  mixed $variable
     * @return bool
     * @todo   Implement this properly
     */
    private function canBeSerialized($variable)
    {
        if (!is_object($variable)) {
            return !is_resource($variable);
        }

        if ($variable instanceof \stdClass) {
            return true;
        }

        $class = new ReflectionClass($variable);

        do {
            if ($class->isInternal()) {
                return $variable instanceof Serializable;
            }
        } while ($class = $class->getParentClass());

        return true;
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
