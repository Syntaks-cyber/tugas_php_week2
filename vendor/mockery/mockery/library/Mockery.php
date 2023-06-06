<?php
/**
 * Mockery
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://github.com/padraic/mockery/blob/master/LICENSE
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to padraic@php.net so we can send you a copy immediately.
 *
 * @category   Mockery
 * @package    Mockery
<<<<<<< HEAD
 * @copyright  Copyright (c) 2010 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
 */

use Mockery\ClosureWrapper;
=======
 * @copyright  Copyright (c) 2010-2014 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
 */

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
use Mockery\ExpectationInterface;
use Mockery\Generator\CachingGenerator;
use Mockery\Generator\Generator;
use Mockery\Generator\MockConfigurationBuilder;
<<<<<<< HEAD
use Mockery\Generator\MockNameBuilder;
use Mockery\Generator\StringManipulationGenerator;
use Mockery\Loader\EvalLoader;
use Mockery\Loader\Loader;
use Mockery\Matcher\MatcherAbstract;
use Mockery\Reflector;
=======
use Mockery\Generator\StringManipulationGenerator;
use Mockery\Generator\StringManipulation\Pass\CallTypeHintPass;
use Mockery\Generator\StringManipulation\Pass\ClassNamePass;
use Mockery\Generator\StringManipulation\Pass\ClassPass;
use Mockery\Generator\StringManipulation\Pass\InstanceMockPass;
use Mockery\Generator\StringManipulation\Pass\InterfacePass;
use Mockery\Generator\StringManipulation\Pass\MethodDefinitionPass;
use Mockery\Generator\StringManipulation\Pass\RemoveBuiltinMethodsThatAreFinalPass;
use Mockery\Generator\StringManipulation\Pass\RemoveUnserializeForInternalSerializableClassesPass;
use Mockery\Loader\EvalLoader;
use Mockery\Loader\Loader;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

class Mockery
{
    const BLOCKS = 'Mockery_Forward_Blocks';

    /**
     * Global container to hold all mocks for the current unit test running.
     *
<<<<<<< HEAD
     * @var \Mockery\Container|null
=======
     * @var \Mockery\Container
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected static $_container = null;

    /**
     * Global configuration handler containing configuration options.
     *
     * @var \Mockery\Configuration
     */
    protected static $_config = null;

    /**
     * @var \Mockery\Generator\Generator
     */
    protected static $_generator;

    /**
     * @var \Mockery\Loader\Loader
     */
    protected static $_loader;

    /**
     * @var array
     */
<<<<<<< HEAD
    private static $_filesToCleanUp = [];
=======
    private static $_filesToCleanUp = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Defines the global helper functions
     *
     * @return void
     */
    public static function globalHelpers()
    {
<<<<<<< HEAD
        require_once __DIR__ . '/helpers.php';
    }

    /**
     * @return array
     *
     * @deprecated since 1.3.2 and will be removed in 2.0.
     */
    public static function builtInTypes()
    {
        $builtInTypes = array(
            'self',
            'array',
            'callable',
            // Up to php 7
            'bool',
            'float',
            'int',
            'string',
            'iterable',
            'void',
        );

        if (\PHP_VERSION_ID >= 70200) {
            $builtInTypes[] = 'object';
        }

        return $builtInTypes;
    }

    /**
     * @param string $type
     * @return bool
     *
     * @deprecated since 1.3.2 and will be removed in 2.0.
     */
    public static function isBuiltInType($type)
    {
        return in_array($type, \Mockery::builtInTypes());
=======
        require_once __DIR__.'/helpers.php';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Static shortcut to \Mockery\Container::mock().
     *
<<<<<<< HEAD
     * @param mixed ...$args
     *
     * @return \Mockery\MockInterface|\Mockery\LegacyMockInterface
     */
    public static function mock(...$args)
    {
=======
     * @return \Mockery\MockInterface
     */
    public static function mock()
    {
        $args = func_get_args();

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return call_user_func_array(array(self::getContainer(), 'mock'), $args);
    }

    /**
<<<<<<< HEAD
     * Static and semantic shortcut for getting a mock from the container
     * and applying the spy's expected behavior into it.
     *
     * @param mixed ...$args
     *
     * @return \Mockery\MockInterface|\Mockery\LegacyMockInterface
     */
    public static function spy(...$args)
    {
        if (count($args) && $args[0] instanceof \Closure) {
            $args[0] = new ClosureWrapper($args[0]);
        }

=======
     * @return \Mockery\MockInterface
     */
    public static function spy()
    {
        $args = func_get_args();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return call_user_func_array(array(self::getContainer(), 'mock'), $args)->shouldIgnoreMissing();
    }

    /**
<<<<<<< HEAD
     * Static and Semantic shortcut to \Mockery\Container::mock().
     *
     * @param mixed ...$args
     *
     * @return \Mockery\MockInterface|\Mockery\LegacyMockInterface
     */
    public static function instanceMock(...$args)
    {
=======
     * @return \Mockery\MockInterface
     */
    public static function instanceMock()
    {
        $args = func_get_args();

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return call_user_func_array(array(self::getContainer(), 'mock'), $args);
    }

    /**
     * Static shortcut to \Mockery\Container::mock(), first argument names the mock.
     *
<<<<<<< HEAD
     * @param mixed ...$args
     *
     * @return \Mockery\MockInterface|\Mockery\LegacyMockInterface
     */
    public static function namedMock(...$args)
    {
=======
     * @return \Mockery\MockInterface
     */
    public static function namedMock()
    {
        $args = func_get_args();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $name = array_shift($args);

        $builder = new MockConfigurationBuilder();
        $builder->setName($name);

        array_unshift($args, $builder);

        return call_user_func_array(array(self::getContainer(), 'mock'), $args);
    }

    /**
     * Static shortcut to \Mockery\Container::self().
     *
     * @throws LogicException
     *
<<<<<<< HEAD
     * @return \Mockery\MockInterface|\Mockery\LegacyMockInterface
=======
     * @return \Mockery\MockInterface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public static function self()
    {
        if (is_null(self::$_container)) {
            throw new \LogicException('You have not declared any mocks yet');
        }

        return self::$_container->self();
    }

    /**
     * Static shortcut to closing up and verifying all mocks in the global
     * container, and resetting the container static variable to null.
     *
     * @return void
     */
    public static function close()
    {
        foreach (self::$_filesToCleanUp as $fileName) {
            @unlink($fileName);
        }
<<<<<<< HEAD
        self::$_filesToCleanUp = [];
=======
        self::$_filesToCleanUp = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if (is_null(self::$_container)) {
            return;
        }

<<<<<<< HEAD
        $container = self::$_container;
        self::$_container = null;

        $container->mockery_teardown();
        $container->mockery_close();
=======
        self::$_container->mockery_teardown();
        self::$_container->mockery_close();
        self::$_container = null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Static fetching of a mock associated with a name or explicit class poser.
     *
<<<<<<< HEAD
     * @param string $name
=======
     * @param $name
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @return \Mockery\Mock
     */
    public static function fetchMock($name)
    {
<<<<<<< HEAD
        return self::getContainer()->fetchMock($name);
    }

    /**
     * Lazy loader and getter for
     * the container property.
     *
     * @return Mockery\Container
=======
        return self::$_container->fetchMock($name);
    }

    /**
     * Get the container.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public static function getContainer()
    {
        if (is_null(self::$_container)) {
            self::$_container = new Mockery\Container(self::getGenerator(), self::getLoader());
        }

        return self::$_container;
    }

    /**
<<<<<<< HEAD
     * Setter for the $_generator static property.
     *
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param \Mockery\Generator\Generator $generator
     */
    public static function setGenerator(Generator $generator)
    {
        self::$_generator = $generator;
    }

<<<<<<< HEAD
    /**
     * Lazy loader method and getter for
     * the generator property.
     *
     * @return Generator
     */
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public static function getGenerator()
    {
        if (is_null(self::$_generator)) {
            self::$_generator = self::getDefaultGenerator();
        }

        return self::$_generator;
    }

<<<<<<< HEAD
    /**
     * Creates and returns a default generator
     * used inside this class.
     *
     * @return CachingGenerator
     */
    public static function getDefaultGenerator()
    {
        return new CachingGenerator(StringManipulationGenerator::withDefaultPasses());
    }

    /**
     * Setter for the $_loader static property.
     *
=======
    public static function getDefaultGenerator()
    {
        $generator = new StringManipulationGenerator(array(
            new CallTypeHintPass(),
            new ClassPass(),
            new ClassNamePass(),
            new InstanceMockPass(),
            new InterfacePass(),
            new MethodDefinitionPass(),
            new RemoveUnserializeForInternalSerializableClassesPass(),
            new RemoveBuiltinMethodsThatAreFinalPass(),
        ));

        return new CachingGenerator($generator);
    }

    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param Loader $loader
     */
    public static function setLoader(Loader $loader)
    {
        self::$_loader = $loader;
    }

    /**
<<<<<<< HEAD
     * Lazy loader method and getter for
     * the $_loader property.
     *
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return Loader
     */
    public static function getLoader()
    {
        if (is_null(self::$_loader)) {
            self::$_loader = self::getDefaultLoader();
        }

        return self::$_loader;
    }

    /**
<<<<<<< HEAD
     * Gets an EvalLoader to be used as default.
     *
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return EvalLoader
     */
    public static function getDefaultLoader()
    {
        return new EvalLoader();
    }

    /**
     * Set the container.
     *
     * @param \Mockery\Container $container
     *
     * @return \Mockery\Container
     */
    public static function setContainer(Mockery\Container $container)
    {
        return self::$_container = $container;
    }

    /**
     * Reset the container to null.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public static function resetContainer()
    {
        self::$_container = null;
    }

    /**
     * Return instance of ANY matcher.
     *
     * @return \Mockery\Matcher\Any
     */
    public static function any()
    {
        return new \Mockery\Matcher\Any();
    }

    /**
<<<<<<< HEAD
     * Return instance of AndAnyOtherArgs matcher.
     *
     * An alternative name to `andAnyOtherArgs` so
     * the API stays closer to `any` as well.
     *
     * @return \Mockery\Matcher\AndAnyOtherArgs
     */
    public static function andAnyOthers()
    {
        return new \Mockery\Matcher\AndAnyOtherArgs();
    }

    /**
     * Return instance of AndAnyOtherArgs matcher.
     *
     * @return \Mockery\Matcher\AndAnyOtherArgs
     */
    public static function andAnyOtherArgs()
    {
        return new \Mockery\Matcher\AndAnyOtherArgs();
    }

    /**
     * Return instance of TYPE matcher.
     *
     * @param mixed $expected
=======
     * Return instance of TYPE matcher.
     *
     * @param $expected
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @return \Mockery\Matcher\Type
     */
    public static function type($expected)
    {
        return new \Mockery\Matcher\Type($expected);
    }

    /**
     * Return instance of DUCKTYPE matcher.
     *
<<<<<<< HEAD
     * @param array ...$args
     *
     * @return \Mockery\Matcher\Ducktype
     */
    public static function ducktype(...$args)
    {
        return new \Mockery\Matcher\Ducktype($args);
=======
     * @return \Mockery\Matcher\Ducktype
     */
    public static function ducktype()
    {
        return new \Mockery\Matcher\Ducktype(func_get_args());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Return instance of SUBSET matcher.
     *
     * @param array $part
<<<<<<< HEAD
     * @param bool $strict - (Optional) True for strict comparison, false for loose
     *
     * @return \Mockery\Matcher\Subset
     */
    public static function subset(array $part, $strict = true)
    {
        return new \Mockery\Matcher\Subset($part, $strict);
=======
     *
     * @return \Mockery\Matcher\Subset
     */
    public static function subset(array $part)
    {
        return new \Mockery\Matcher\Subset($part);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Return instance of CONTAINS matcher.
     *
<<<<<<< HEAD
     * @param array ...$args
     *
     * @return \Mockery\Matcher\Contains
     */
    public static function contains(...$args)
    {
        return new \Mockery\Matcher\Contains($args);
=======
     * @return \Mockery\Matcher\Contains
     */
    public static function contains()
    {
        return new \Mockery\Matcher\Contains(func_get_args());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Return instance of HASKEY matcher.
     *
<<<<<<< HEAD
     * @param mixed $key
=======
     * @param $key
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @return \Mockery\Matcher\HasKey
     */
    public static function hasKey($key)
    {
        return new \Mockery\Matcher\HasKey($key);
    }

    /**
     * Return instance of HASVALUE matcher.
     *
<<<<<<< HEAD
     * @param mixed $val
=======
     * @param $val
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @return \Mockery\Matcher\HasValue
     */
    public static function hasValue($val)
    {
        return new \Mockery\Matcher\HasValue($val);
    }

    /**
     * Return instance of CLOSURE matcher.
     *
<<<<<<< HEAD
     * @param $reference
     *
     * @return \Mockery\Matcher\Closure
     */
    public static function capture(&$reference)
    {
        $closure = function ($argument) use (&$reference) {
            $reference = $argument;
            return true;
        };

        return new \Mockery\Matcher\Closure($closure);
    }

    /**
     * Return instance of CLOSURE matcher.
     *
     * @param mixed $closure
=======
     * @param $closure
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @return \Mockery\Matcher\Closure
     */
    public static function on($closure)
    {
        return new \Mockery\Matcher\Closure($closure);
    }

    /**
     * Return instance of MUSTBE matcher.
     *
<<<<<<< HEAD
     * @param mixed $expected
=======
     * @param $expected
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @return \Mockery\Matcher\MustBe
     */
    public static function mustBe($expected)
    {
        return new \Mockery\Matcher\MustBe($expected);
    }

    /**
     * Return instance of NOT matcher.
     *
<<<<<<< HEAD
     * @param mixed $expected
=======
     * @param $expected
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @return \Mockery\Matcher\Not
     */
    public static function not($expected)
    {
        return new \Mockery\Matcher\Not($expected);
    }

    /**
     * Return instance of ANYOF matcher.
     *
<<<<<<< HEAD
     * @param array ...$args
     *
     * @return \Mockery\Matcher\AnyOf
     */
    public static function anyOf(...$args)
    {
        return new \Mockery\Matcher\AnyOf($args);
=======
     * @return \Mockery\Matcher\AnyOf
     */
    public static function anyOf()
    {
        return new \Mockery\Matcher\AnyOf(func_get_args());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Return instance of NOTANYOF matcher.
     *
<<<<<<< HEAD
     * @param array ...$args
     *
     * @return \Mockery\Matcher\NotAnyOf
     */
    public static function notAnyOf(...$args)
    {
        return new \Mockery\Matcher\NotAnyOf($args);
    }

    /**
     * Return instance of PATTERN matcher.
     *
     * @param mixed $expected
     *
     * @return \Mockery\Matcher\Pattern
     */
    public static function pattern($expected)
    {
        return new \Mockery\Matcher\Pattern($expected);
    }

    /**
     * Lazy loader and Getter for the global
     * configuration container.
     *
     * @return \Mockery\Configuration
=======
     * @return \Mockery\Matcher\NotAnyOf
     */
    public static function notAnyOf()
    {
        return new \Mockery\Matcher\NotAnyOf(func_get_args());
    }

    /**
     * Get the global configuration container.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public static function getConfiguration()
    {
        if (is_null(self::$_config)) {
            self::$_config = new \Mockery\Configuration();
        }

        return self::$_config;
    }

    /**
     * Utility method to format method name and arguments into a string.
     *
     * @param string $method
     * @param array $arguments
     *
     * @return string
     */
    public static function formatArgs($method, array $arguments = null)
    {
        if (is_null($arguments)) {
            return $method . '()';
        }

        $formattedArguments = array();
        foreach ($arguments as $argument) {
            $formattedArguments[] = self::formatArgument($argument);
        }

        return $method . '(' . implode(', ', $formattedArguments) . ')';
    }

<<<<<<< HEAD
    /**
     * Gets the string representation
     * of any passed argument.
     *
     * @param mixed $argument
     * @param int $depth
     *
     * @return mixed
     */
    private static function formatArgument($argument, $depth = 0)
    {
        if ($argument instanceof MatcherAbstract) {
            return (string) $argument;
        }

=======
    private static function formatArgument($argument, $depth = 0)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (is_object($argument)) {
            return 'object(' . get_class($argument) . ')';
        }

        if (is_int($argument) || is_float($argument)) {
            return $argument;
        }

        if (is_array($argument)) {
            if ($depth === 1) {
<<<<<<< HEAD
                $argument = '[...]';
            } else {
                $sample = array();
                foreach ($argument as $key => $value) {
                    $key = is_int($key) ? $key : "'$key'";
                    $value = self::formatArgument($value, $depth + 1);
                    $sample[] = "$key => $value";
                }

                $argument = "[" . implode(", ", $sample) . "]";
            }

            return ((strlen($argument) > 1000) ? substr($argument, 0, 1000) . '...]' : $argument);
=======
                $argument = 'array(...)';
            } else {
                $sample = array();
                foreach ($argument as $key => $value) {
                    $sample[$key] = self::formatArgument($value, $depth + 1);
                }
                $argument = preg_replace("{\s}", '', var_export($sample, true));
            }

            return ((strlen($argument) > 1000) ? substr($argument, 0, 1000).'...)' : $argument);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if (is_bool($argument)) {
            return $argument ? 'true' : 'false';
        }

        if (is_resource($argument)) {
            return 'resource(...)';
        }

        if (is_null($argument)) {
            return 'NULL';
        }

<<<<<<< HEAD
        return "'" . (string) $argument . "'";
=======
        $argument = (string) $argument;

        return $depth === 0 ? '"' . $argument . '"' : $argument;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Utility function to format objects to printable arrays.
     *
     * @param array $objects
     *
     * @return string
     */
    public static function formatObjects(array $objects = null)
    {
        static $formatting;

        if ($formatting) {
            return '[Recursion]';
        }

        if (is_null($objects)) {
            return '';
        }

        $objects = array_filter($objects, 'is_object');
        if (empty($objects)) {
            return '';
        }

        $formatting = true;
        $parts = array();

        foreach ($objects as $object) {
            $parts[get_class($object)] = self::objectToArray($object);
        }

        $formatting = false;

        return 'Objects: ( ' . var_export($parts, true) . ')';
    }

    /**
     * Utility function to turn public properties and public get* and is* method values into an array.
     *
<<<<<<< HEAD
     * @param object $object
=======
     * @param     $object
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param int $nesting
     *
     * @return array
     */
    private static function objectToArray($object, $nesting = 3)
    {
        if ($nesting == 0) {
            return array('...');
        }

        return array(
            'class' => get_class($object),
<<<<<<< HEAD
            'properties' => self::extractInstancePublicProperties($object, $nesting)
=======
            'properties' => self::extractInstancePublicProperties($object, $nesting),
            'getters' => self::extractGetters($object, $nesting)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );
    }

    /**
     * Returns all public instance properties.
     *
<<<<<<< HEAD
     * @param mixed $object
     * @param int $nesting
=======
     * @param $object
     * @param $nesting
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @return array
     */
    private static function extractInstancePublicProperties($object, $nesting)
    {
        $reflection = new \ReflectionClass(get_class($object));
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);
        $cleanedProperties = array();

        foreach ($properties as $publicProperty) {
            if (!$publicProperty->isStatic()) {
                $name = $publicProperty->getName();
                $cleanedProperties[$name] = self::cleanupNesting($object->$name, $nesting);
            }
        }

        return $cleanedProperties;
    }

    /**
<<<<<<< HEAD
     * Utility method used for recursively generating
     * an object or array representation.
     *
     * @param mixed $argument
     * @param int $nesting
     *
     * @return mixed
     */
=======
     * Returns all object getters.
     *
     * @param $object
     * @param $nesting
     *
     * @return array
     */
    private static function extractGetters($object, $nesting)
    {
        $reflection = new \ReflectionClass(get_class($object));
        $publicMethods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);
        $getters = array();

        foreach ($publicMethods as $publicMethod) {
            $name = $publicMethod->getName();
            $irrelevantName = (substr($name, 0, 3) !== 'get' && substr($name, 0, 2) !== 'is');
            $isStatic = $publicMethod->isStatic();
            $numberOfParameters = $publicMethod->getNumberOfParameters();

            if ($irrelevantName || $numberOfParameters != 0 || $isStatic) {
                continue;
            }

            try {
                $getters[$name] = self::cleanupNesting($object->$name(), $nesting);
            } catch (\Exception $e) {
                $getters[$name] = '!! ' . get_class($e) . ': ' . $e->getMessage() . ' !!';
            }
        }

        return $getters;
    }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    private static function cleanupNesting($argument, $nesting)
    {
        if (is_object($argument)) {
            $object = self::objectToArray($argument, $nesting - 1);
            $object['class'] = get_class($argument);

            return $object;
        }

        if (is_array($argument)) {
            return self::cleanupArray($argument, $nesting - 1);
        }

        return $argument;
    }

<<<<<<< HEAD
    /**
     * Utility method for recursively
     * gerating a representation
     * of the given array.
     *
     * @param array $argument
     * @param int $nesting
     *
     * @return mixed
     */
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    private static function cleanupArray($argument, $nesting = 3)
    {
        if ($nesting == 0) {
            return '...';
        }

        foreach ($argument as $key => $value) {
            if (is_array($value)) {
                $argument[$key] = self::cleanupArray($value, $nesting - 1);
            } elseif (is_object($value)) {
                $argument[$key] = self::objectToArray($value, $nesting - 1);
            }
        }

        return $argument;
    }

    /**
     * Utility function to parse shouldReceive() arguments and generate
     * expectations from such as needed.
     *
<<<<<<< HEAD
     * @param Mockery\LegacyMockInterface $mock
     * @param array ...$args
     * @param callable $add
     * @return \Mockery\CompositeExpectation
     */
    public static function parseShouldReturnArgs(\Mockery\LegacyMockInterface $mock, $args, $add)
=======
     * @param Mockery\MockInterface $mock
     * @param array $args
     * @param callable $add
     * @return \Mockery\CompositeExpectation
     */
    public static function parseShouldReturnArgs(\Mockery\MockInterface $mock, $args, $add)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $composite = new \Mockery\CompositeExpectation();

        foreach ($args as $arg) {
            if (is_array($arg)) {
                foreach ($arg as $k => $v) {
                    $expectation = self::buildDemeterChain($mock, $k, $add)->andReturn($v);
                    $composite->add($expectation);
                }
            } elseif (is_string($arg)) {
                $expectation = self::buildDemeterChain($mock, $arg, $add);
                $composite->add($expectation);
            }
        }

        return $composite;
    }

    /**
     * Sets up expectations on the members of the CompositeExpectation and
     * builds up any demeter chain that was passed to shouldReceive.
     *
<<<<<<< HEAD
     * @param \Mockery\LegacyMockInterface $mock
     * @param string $arg
     * @param callable $add
     * @throws Mockery\Exception
     * @return \Mockery\ExpectationInterface
     */
    protected static function buildDemeterChain(\Mockery\LegacyMockInterface $mock, $arg, $add)
=======
     * @param \Mockery\MockInterface $mock
     * @param string $arg
     * @param callable $add
     * @throws Mockery\Exception
     * @return \Mockery\ExpectationDirector
     */
    protected static function buildDemeterChain(\Mockery\MockInterface $mock, $arg, $add)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        /** @var Mockery\Container $container */
        $container = $mock->mockery_getContainer();
        $methodNames = explode('->', $arg);
        reset($methodNames);

        if (!\Mockery::getConfiguration()->mockingNonExistentMethodsAllowed()
            && !$mock->mockery_isAnonymous()
            && !in_array(current($methodNames), $mock->mockery_getMockableMethods())
        ) {
            throw new \Mockery\Exception(
                'Mockery\'s configuration currently forbids mocking the method '
                . current($methodNames) . ' as it does not exist on the class or object '
                . 'being mocked'
            );
        }

        /** @var ExpectationInterface|null $expectations */
        $expectations = null;

        /** @var Callable $nextExp */
        $nextExp = function ($method) use ($add) {
            return $add($method);
        };

<<<<<<< HEAD
        $parent = get_class($mock);

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        while (true) {
            $method = array_shift($methodNames);
            $expectations = $mock->mockery_getExpectationsFor($method);

            if (is_null($expectations) || self::noMoreElementsInChain($methodNames)) {
                $expectations = $nextExp($method);
                if (self::noMoreElementsInChain($methodNames)) {
                    break;
                }

<<<<<<< HEAD
                $mock = self::getNewDemeterMock($container, $parent, $method, $expectations);
            } else {
                $demeterMockKey = $container->getKeyOfDemeterMockFor($method, $parent);
=======
                $mock = self::getNewDemeterMock($container, $method, $expectations);
            } else {
                $demeterMockKey = $container->getKeyOfDemeterMockFor($method);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                if ($demeterMockKey) {
                    $mock = self::getExistingDemeterMock($container, $demeterMockKey);
                }
            }

<<<<<<< HEAD
            $parent .= '->' . $method;

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $nextExp = function ($n) use ($mock) {
                return $mock->shouldReceive($n);
            };
        }

        return $expectations;
    }

    /**
<<<<<<< HEAD
     * Gets a new demeter configured
     * mock from the container.
     *
     * @param \Mockery\Container $container
     * @param string $parent
=======
     * @param \Mockery\Container $container
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param string $method
     * @param Mockery\ExpectationInterface $exp
     *
     * @return \Mockery\Mock
     */
<<<<<<< HEAD
    private static function getNewDemeterMock(
        Mockery\Container $container,
        $parent,
        $method,
        Mockery\ExpectationInterface $exp
    ) {
        $newMockName = 'demeter_' . md5($parent) . '_' . $method;

        if (\PHP_VERSION_ID >= 70000) {
            $parRef = null;
            $parRefMethod = null;
            $parRefMethodRetType = null;

            $parentMock = $exp->getMock();
            if ($parentMock !== null) {
                $parRef = new ReflectionObject($parentMock);
            }

            if ($parRef !== null && $parRef->hasMethod($method)) {
                $parRefMethod = $parRef->getMethod($method);
                $parRefMethodRetType = Reflector::getReturnType($parRefMethod, true);

                if ($parRefMethodRetType !== null) {
                    $nameBuilder = new MockNameBuilder();
                    $nameBuilder->addPart('\\' . $newMockName);
                    $mock = self::namedMock($nameBuilder->build(), $parRefMethodRetType);
                    $exp->andReturn($mock);

                    return $mock;
                }
            }
        }

        $mock = $container->mock($newMockName);
=======
    private static function getNewDemeterMock(Mockery\Container $container,
        $method,
        Mockery\ExpectationInterface $exp
    ) {
        $mock = $container->mock('demeter_' . $method);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $exp->andReturn($mock);

        return $mock;
    }

    /**
<<<<<<< HEAD
     * Gets an specific demeter mock from
     * the ones kept by the container.
     *
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param \Mockery\Container $container
     * @param string $demeterMockKey
     *
     * @return mixed
     */
<<<<<<< HEAD
    private static function getExistingDemeterMock(
        Mockery\Container $container,
        $demeterMockKey
    ) {
=======
    private static function getExistingDemeterMock(Mockery\Container $container, $demeterMockKey)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $mocks = $container->getMocks();
        $mock = $mocks[$demeterMockKey];

        return $mock;
    }

    /**
<<<<<<< HEAD
     * Checks if the passed array representing a demeter
     * chain with the method names is empty.
     *
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param array $methodNames
     *
     * @return bool
     */
    private static function noMoreElementsInChain(array $methodNames)
    {
        return empty($methodNames);
    }

<<<<<<< HEAD
    public static function declareClass($fqn)
    {
        return static::declareType($fqn, "class");
    }

    public static function declareInterface($fqn)
    {
        return static::declareType($fqn, "interface");
    }

    private static function declareType($fqn, $type)
    {
        $targetCode = "<?php ";
        $shortName = $fqn;

        if (strpos($fqn, "\\")) {
            $parts = explode("\\", $fqn);

            $shortName = trim(array_pop($parts));
            $namespace = implode("\\", $parts);

            $targetCode.= "namespace $namespace;\n";
        }

        $targetCode.= "$type $shortName {} ";

        /*
         * We could eval here, but it doesn't play well with the way
         * PHPUnit tries to backup global state and the require definition
         * loader
         */
        $tmpfname = tempnam(sys_get_temp_dir(), "Mockery");
        file_put_contents($tmpfname, $targetCode);
        require $tmpfname;
        \Mockery::registerFileForCleanUp($tmpfname);
    }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    /**
     * Register a file to be deleted on tearDown.
     *
     * @param string $fileName
     */
    public static function registerFileForCleanUp($fileName)
    {
        self::$_filesToCleanUp[] = $fileName;
    }
}
