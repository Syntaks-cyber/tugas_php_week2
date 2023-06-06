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
=======
 * @copyright  Copyright (c) 2010-2014 Pádraic Brady (http://blog.astrumfutura.com)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
 */

namespace Mockery;

use Mockery\Generator\Generator;
use Mockery\Generator\MockConfigurationBuilder;
use Mockery\Loader\Loader as LoaderInterface;

class Container
{
    const BLOCKS = \Mockery::BLOCKS;

    /**
     * Store of mock objects
     *
     * @var array
     */
    protected $_mocks = array();

    /**
     * Order number of allocation
     *
     * @var int
     */
    protected $_allocatedOrder = 0;

    /**
     * Current ordered number
     *
     * @var int
     */
    protected $_currentOrder = 0;

    /**
     * Ordered groups
     *
     * @var array
     */
    protected $_groups = array();

    /**
<<<<<<< HEAD
     * @var Generator
=======
     * @var Generator\Generator
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected $_generator;

    /**
     * @var LoaderInterface
     */
    protected $_loader;

    /**
     * @var array
     */
    protected $_namedMocks = array();

    public function __construct(Generator $generator = null, LoaderInterface $loader = null)
    {
        $this->_generator = $generator ?: \Mockery::getDefaultGenerator();
        $this->_loader = $loader ?: \Mockery::getDefaultLoader();
    }

    /**
     * Generates a new mock object for this container
     *
     * I apologies in advance for this. A God Method just fits the API which
     * doesn't require differentiating between classes, interfaces, abstracts,
     * names or partials - just so long as it's something that can be mocked.
     * I'll refactor it one day so it's easier to follow.
     *
<<<<<<< HEAD
     * @param array ...$args
     *
     * @return Mock
     * @throws Exception\RuntimeException
     */
    public function mock(...$args)
=======
     * @throws Exception\RuntimeException
     * @throws Exception
     * @return \Mockery\Mock
     */
    public function mock()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $expectationClosure = null;
        $quickdefs = array();
        $constructorArgs = null;
        $blocks = array();
<<<<<<< HEAD
        $class = null;
=======
        $args = func_get_args();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if (count($args) > 1) {
            $finalArg = end($args);
            reset($args);
            if (is_callable($finalArg) && is_object($finalArg)) {
                $expectationClosure = array_pop($args);
            }
        }

        $builder = new MockConfigurationBuilder();

        foreach ($args as $k => $arg) {
            if ($arg instanceof MockConfigurationBuilder) {
                $builder = $arg;
                unset($args[$k]);
            }
        }
        reset($args);

        $builder->setParameterOverrides(\Mockery::getConfiguration()->getInternalClassMethodParamMaps());
<<<<<<< HEAD
        $builder->setConstantsMap(\Mockery::getConfiguration()->getConstantsMap());

        while (count($args) > 0) {
            $arg = array_shift($args);
            // check for multiple interfaces
            if (is_string($arg)) {
                foreach (explode('|', $arg) as $type) {
                    if ($arg === 'null') {
                        // skip PHP 8 'null's
                    } elseif (strpos($type, ',') && !strpos($type, ']')) {
                        $interfaces = explode(',', str_replace(' ', '', $type));
                        $builder->addTargets($interfaces);
                    } elseif (substr($type, 0, 6) == 'alias:') {
                        $type = str_replace('alias:', '', $type);
                        $builder->addTarget('stdClass');
                        $builder->setName($type);
                    } elseif (substr($type, 0, 9) == 'overload:') {
                        $type = str_replace('overload:', '', $type);
                        $builder->setInstanceMock(true);
                        $builder->addTarget('stdClass');
                        $builder->setName($type);
                    } elseif (substr($type, strlen($type)-1, 1) == ']') {
                        $parts = explode('[', $type);
                        if (!class_exists($parts[0], true) && !interface_exists($parts[0], true)) {
                            throw new \Mockery\Exception('Can only create a partial mock from'
                            . ' an existing class or interface');
                        }
                        $class = $parts[0];
                        $parts[1] = str_replace(' ', '', $parts[1]);
                        $partialMethods = array_filter(explode(',', strtolower(rtrim($parts[1], ']'))));
                        $builder->addTarget($class);
                        foreach ($partialMethods as $partialMethod) {
                            if ($partialMethod[0] === '!') {
                                $builder->addBlackListedMethod(substr($partialMethod, 1));
                                continue;
                            }
                            $builder->addWhiteListedMethod($partialMethod);
                        }
                    } elseif (class_exists($type, true) || interface_exists($type, true) || trait_exists($type, true)) {
                        $builder->addTarget($type);
                    } elseif (!\Mockery::getConfiguration()->mockingNonExistentMethodsAllowed() && (!class_exists($type, true) && !interface_exists($type, true))) {
                        throw new \Mockery\Exception("Mockery can't find '$type' so can't mock it");
                    } else {
                        if (!$this->isValidClassName($type)) {
                            throw new \Mockery\Exception('Class name contains invalid characters');
                        }
                        $builder->addTarget($type);
                    }
                    break; // unions are "sum" types and not "intersections", and so we must only process the first part
                }
            } elseif (is_object($arg)) {
                $builder->addTarget($arg);
            } elseif (is_array($arg)) {
                if (!empty($arg) && array_keys($arg) !== range(0, count($arg) - 1)) {
                    // if associative array
                    if (array_key_exists(self::BLOCKS, $arg)) {
                        $blocks = $arg[self::BLOCKS];
                    }
                    unset($arg[self::BLOCKS]);
                    $quickdefs = $arg;
                } else {
                    $constructorArgs = $arg;
                }
            } else {
                throw new \Mockery\Exception(
                    'Unable to parse arguments sent to '
                    . get_class($this) . '::mock()'
                );
            }
=======

        while (count($args) > 0) {
            $arg = current($args);
            // check for multiple interfaces
            if (is_string($arg) && strpos($arg, ',') && !strpos($arg, ']')) {
                $interfaces = explode(',', str_replace(' ', '', $arg));
                foreach ($interfaces as $i) {
                    if (!interface_exists($i, true) && !class_exists($i, true)) {
                        throw new \Mockery\Exception(
                            'Class name follows the format for defining multiple'
                            . ' interfaces, however one or more of the interfaces'
                            . ' do not exist or are not included, or the base class'
                            . ' (which you may omit from the mock definition) does not exist'
                        );
                    }
                }
                $builder->addTargets($interfaces);
                array_shift($args);

                continue;
            } elseif (is_string($arg) && substr($arg, 0, 6) == 'alias:') {
                $name = array_shift($args);
                $name = str_replace('alias:', '', $name);
                $builder->addTarget('stdClass');
                $builder->setName($name);
                continue;
            } elseif (is_string($arg) && substr($arg, 0, 9) == 'overload:') {
                $name = array_shift($args);
                $name = str_replace('overload:', '', $name);
                $builder->setInstanceMock(true);
                $builder->addTarget('stdClass');
                $builder->setName($name);
                continue;
            } elseif (is_string($arg) && substr($arg, strlen($arg)-1, 1) == ']') {
                $parts = explode('[', $arg);
                if (!class_exists($parts[0], true) && !interface_exists($parts[0], true)) {
                    throw new \Mockery\Exception('Can only create a partial mock from'
                    . ' an existing class or interface');
                }
                $class = $parts[0];
                $parts[1] = str_replace(' ', '', $parts[1]);
                $partialMethods = explode(',', strtolower(rtrim($parts[1], ']')));
                $builder->addTarget($class);
                $builder->setWhiteListedMethods($partialMethods);
                array_shift($args);
                continue;
            } elseif (is_string($arg) && (class_exists($arg, true) || interface_exists($arg, true))) {
                $class = array_shift($args);
                $builder->addTarget($class);
                continue;
            } elseif (is_string($arg)) {
                $class = array_shift($args);
                $builder->addTarget($class);
                continue;
            } elseif (is_object($arg)) {
                $partial = array_shift($args);
                $builder->addTarget($partial);
                continue;
            } elseif (is_array($arg) && !empty($arg) && array_keys($arg) !== range(0, count($arg) - 1)) {
                // if associative array
                if (array_key_exists(self::BLOCKS, $arg)) {
                    $blocks = $arg[self::BLOCKS];
                }
                unset($arg[self::BLOCKS]);
                $quickdefs = array_shift($args);
                continue;
            } elseif (is_array($arg)) {
                $constructorArgs = array_shift($args);
                continue;
            }

            throw new \Mockery\Exception(
                'Unable to parse arguments sent to '
                . get_class($this) . '::mock()'
            );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $builder->addBlackListedMethods($blocks);

<<<<<<< HEAD
        if (defined('HHVM_VERSION')
            && ($class === 'Exception' || is_subclass_of($class, 'Exception'))) {
            $builder->addBlackListedMethod("setTraceOptions");
            $builder->addBlackListedMethod("getTraceOptions");
        }

        if (!is_null($constructorArgs)) {
            $builder->addBlackListedMethod("__construct"); // we need to pass through
        } else {
            $builder->setMockOriginalDestructor(true);
=======
        if (!is_null($constructorArgs)) {
            $builder->addBlackListedMethod("__construct"); // we need to pass through
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if (!empty($partialMethods) && $constructorArgs === null) {
            $constructorArgs = array();
        }

        $config = $builder->getMockConfiguration();

        $this->checkForNamedMockClashes($config);

        $def = $this->getGenerator()->generate($config);

        if (class_exists($def->getClassName(), $attemptAutoload = false)) {
            $rfc = new \ReflectionClass($def->getClassName());
<<<<<<< HEAD
            if (!$rfc->implementsInterface("Mockery\LegacyMockInterface")) {
=======
            if (!$rfc->implementsInterface("Mockery\MockInterface")) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                throw new \Mockery\Exception\RuntimeException("Could not load mock {$def->getClassName()}, class already exists");
            }
        }

        $this->getLoader()->load($def);

        $mock = $this->_getInstance($def->getClassName(), $constructorArgs);
<<<<<<< HEAD
        $mock->mockery_init($this, $config->getTargetObject(), $config->isInstanceMock());
=======
        $mock->mockery_init($this, $config->getTargetObject());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if (!empty($quickdefs)) {
            $mock->shouldReceive($quickdefs)->byDefault();
        }
        if (!empty($expectationClosure)) {
            $expectationClosure($mock);
        }
        $this->rememberMock($mock);
        return $mock;
    }

    public function instanceMock()
    {
    }

    public function getLoader()
    {
        return $this->_loader;
    }

    public function getGenerator()
    {
        return $this->_generator;
    }

    /**
     * @param string $method
<<<<<<< HEAD
     * @param string $parent
     * @return string|null
     */
    public function getKeyOfDemeterMockFor($method, $parent)
    {
        $keys = array_keys($this->_mocks);
        $match = preg_grep("/__demeter_" . md5($parent) . "_{$method}$/", $keys);
=======
     * @return string|null
     */
    public function getKeyOfDemeterMockFor($method)
    {
        $keys = array_keys($this->_mocks);
        $match = preg_grep("/__demeter_{$method}$/", $keys);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (count($match) == 1) {
            $res = array_values($match);
            if (count($res) > 0) {
                return $res[0];
            }
        }
        return null;
    }

    /**
     * @return array
     */
    public function getMocks()
    {
        return $this->_mocks;
    }

    /**
     *  Tear down tasks for this container
     *
     * @throws \Exception
     * @return void
     */
    public function mockery_teardown()
    {
        try {
            $this->mockery_verify();
        } catch (\Exception $e) {
            $this->mockery_close();
            throw $e;
        }
    }

    /**
     * Verify the container mocks
     *
     * @return void
     */
    public function mockery_verify()
    {
        foreach ($this->_mocks as $mock) {
            $mock->mockery_verify();
        }
    }

    /**
<<<<<<< HEAD
     * Retrieves all exceptions thrown by mocks
     *
     * @return array
     */
    public function mockery_thrownExceptions()
    {
        $e = [];

        foreach ($this->_mocks as $mock) {
            $e = array_merge($e, $mock->mockery_thrownExceptions());
        }

        return $e;
    }

    /**
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Reset the container to its original state
     *
     * @return void
     */
    public function mockery_close()
    {
        foreach ($this->_mocks as $mock) {
            $mock->mockery_teardown();
        }
        $this->_mocks = array();
    }

    /**
     * Fetch the next available allocation order number
     *
     * @return int
     */
    public function mockery_allocateOrder()
    {
        $this->_allocatedOrder += 1;
        return $this->_allocatedOrder;
    }

    /**
     * Set ordering for a group
     *
     * @param mixed $group
     * @param int $order
     */
    public function mockery_setGroup($group, $order)
    {
        $this->_groups[$group] = $order;
    }

    /**
     * Fetch array of ordered groups
     *
     * @return array
     */
    public function mockery_getGroups()
    {
        return $this->_groups;
    }

    /**
     * Set current ordered number
     *
     * @param int $order
     * @return int The current order number that was set
     */
    public function mockery_setCurrentOrder($order)
    {
        $this->_currentOrder = $order;
        return $this->_currentOrder;
    }

    /**
     * Get current ordered number
     *
     * @return int
     */
    public function mockery_getCurrentOrder()
    {
        return $this->_currentOrder;
    }

    /**
     * Validate the current mock's ordering
     *
     * @param string $method
     * @param int $order
     * @throws \Mockery\Exception
     * @return void
     */
<<<<<<< HEAD
    public function mockery_validateOrder($method, $order, \Mockery\LegacyMockInterface $mock)
=======
    public function mockery_validateOrder($method, $order, \Mockery\MockInterface $mock)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($order < $this->_currentOrder) {
            $exception = new \Mockery\Exception\InvalidOrderException(
                'Method ' . $method . ' called out of order: expected order '
                . $order . ', was ' . $this->_currentOrder
            );
            $exception->setMock($mock)
                ->setMethodName($method)
                ->setExpectedOrder($order)
                ->setActualOrder($this->_currentOrder);
            throw $exception;
        }
        $this->mockery_setCurrentOrder($order);
    }

    /**
     * Gets the count of expectations on the mocks
     *
     * @return int
     */
    public function mockery_getExpectationCount()
    {
        $count = 0;
        foreach ($this->_mocks as $mock) {
            $count += $mock->mockery_getExpectationCount();
        }
        return $count;
    }

    /**
     * Store a mock and set its container reference
     *
<<<<<<< HEAD
     * @param \Mockery\Mock $mock
     * @return \Mockery\LegacyMockInterface|\Mockery\MockInterface
     */
    public function rememberMock(\Mockery\LegacyMockInterface $mock)
=======
     * @param \Mockery\Mock
     * @return \Mockery\Mock
     */
    public function rememberMock(\Mockery\MockInterface $mock)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!isset($this->_mocks[get_class($mock)])) {
            $this->_mocks[get_class($mock)] = $mock;
        } else {
            /**
             * This condition triggers for an instance mock where origin mock
             * is already remembered
             */
            $this->_mocks[] = $mock;
        }
        return $mock;
    }

    /**
     * Retrieve the last remembered mock object, which is the same as saying
     * retrieve the current mock being programmed where you have yet to call
     * mock() to change it - thus why the method name is "self" since it will be
     * be used during the programming of the same mock.
     *
     * @return \Mockery\Mock
     */
    public function self()
    {
        $mocks = array_values($this->_mocks);
        $index = count($mocks) - 1;
        return $mocks[$index];
    }

    /**
     * Return a specific remembered mock according to the array index it
     * was stored to in this container instance
     *
     * @return \Mockery\Mock
     */
    public function fetchMock($reference)
    {
        if (isset($this->_mocks[$reference])) {
            return $this->_mocks[$reference];
        }
    }

    protected function _getInstance($mockName, $constructorArgs = null)
    {
        if ($constructorArgs !== null) {
            $r = new \ReflectionClass($mockName);
            return $r->newInstanceArgs($constructorArgs);
        }

        try {
<<<<<<< HEAD
            $instantiator = new Instantiator();
=======
            $instantiator = new Instantiator;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $instance = $instantiator->instantiate($mockName);
        } catch (\Exception $ex) {
            $internalMockName = $mockName . '_Internal';

            if (!class_exists($internalMockName)) {
                eval("class $internalMockName extends $mockName {" .
                        'public function __construct() {}' .
                    '}');
            }

            $instance = new $internalMockName();
        }

        return $instance;
    }

<<<<<<< HEAD
=======
    /**
     * Takes a class name and declares it
     *
     * @param string $fqcn
     */
    public function declareClass($fqcn)
    {
        if (false !== strpos($fqcn, '/')) {
            throw new \Mockery\Exception(
                'Class name contains a forward slash instead of backslash needed '
                . 'when employing namespaces'
            );
        }
        if (false !== strpos($fqcn, "\\")) {
            $parts = array_filter(explode("\\", $fqcn), function ($part) {
                return $part !== "";
            });
            $cl = array_pop($parts);
            $ns = implode("\\", $parts);
            eval(" namespace $ns { class $cl {} }");
        } else {
            eval(" class $fqcn {} ");
        }
    }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    protected function checkForNamedMockClashes($config)
    {
        $name = $config->getName();

        if (!$name) {
            return;
        }

        $hash = $config->getHash();

        if (isset($this->_namedMocks[$name])) {
            if ($hash !== $this->_namedMocks[$name]) {
                throw new \Mockery\Exception(
                    "The mock named '$name' has been already defined with a different mock configuration"
                );
            }
        }

        $this->_namedMocks[$name] = $hash;
    }
<<<<<<< HEAD

    /**
     * see http://php.net/manual/en/language.oop5.basic.php
     * @param string $className
     * @return bool
     */
    public function isValidClassName($className)
    {
        $pos = strpos($className, '\\');
        if ($pos === 0) {
            $className = substr($className, 1); // remove the first backslash
        }
        // all the namespaces and class name should match the regex
        $invalidNames = array_filter(explode('\\', $className), function ($name) {
            return !preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $name);
        });
        return empty($invalidNames);
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
