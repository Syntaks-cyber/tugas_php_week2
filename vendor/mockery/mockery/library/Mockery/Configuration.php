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

class Configuration
{
<<<<<<< HEAD
=======

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    /**
     * Boolean assertion of whether we can mock methods which do not actually
     * exist for the given class or object (ignored for unreal mocks)
     *
     * @var bool
     */
    protected $_allowMockingNonExistentMethod = true;

    /**
     * Boolean assertion of whether we ignore unnecessary mocking of methods,
     * i.e. when method expectations are made, set using a zeroOrMoreTimes()
     * constraint, and then never called. Essentially such expectations are
     * not required and are just taking up test space.
     *
     * @var bool
     */
    protected $_allowMockingMethodsUnnecessarily = true;

    /**
     * Parameter map for use with PHP internal classes.
     *
     * @var array
     */
    protected $_internalClassParamMap = array();

<<<<<<< HEAD
    protected $_constantsMap = array();

    /**
     * Boolean assertion is reflection caching enabled or not. It should be
     * always enabled, except when using PHPUnit's --static-backup option.
     *
     * @see https://github.com/mockery/mockery/issues/268
     */
    protected $_reflectionCacheEnabled = true;

    /**
     * Set boolean to allow/prevent mocking of non-existent methods
     *
     * @param bool $flag
=======
    /**
     * Set boolean to allow/prevent mocking of non-existent methods
     *
     * @param bool
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function allowMockingNonExistentMethods($flag = true)
    {
        $this->_allowMockingNonExistentMethod = (bool) $flag;
    }

    /**
     * Return flag indicating whether mocking non-existent methods allowed
     *
     * @return bool
     */
    public function mockingNonExistentMethodsAllowed()
    {
        return $this->_allowMockingNonExistentMethod;
    }

    /**
<<<<<<< HEAD
     * @deprecated
     *
     * Set boolean to allow/prevent unnecessary mocking of methods
     *
     * @param bool $flag
     */
    public function allowMockingMethodsUnnecessarily($flag = true)
    {
        trigger_error(sprintf("The %s method is deprecated and will be removed in a future version of Mockery", __METHOD__), E_USER_DEPRECATED);

=======
     * Set boolean to allow/prevent unnecessary mocking of methods
     *
     * @param bool
     */
    public function allowMockingMethodsUnnecessarily($flag = true)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->_allowMockingMethodsUnnecessarily = (bool) $flag;
    }

    /**
     * Return flag indicating whether mocking non-existent methods allowed
     *
     * @return bool
     */
    public function mockingMethodsUnnecessarilyAllowed()
    {
<<<<<<< HEAD
        trigger_error(sprintf("The %s method is deprecated and will be removed in a future version of Mockery", __METHOD__), E_USER_DEPRECATED);

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this->_allowMockingMethodsUnnecessarily;
    }

    /**
     * Set a parameter map (array of param signature strings) for the method
     * of an internal PHP class.
     *
     * @param string $class
     * @param string $method
     * @param array $map
     */
    public function setInternalClassMethodParamMap($class, $method, array $map)
    {
<<<<<<< HEAD
        if (\PHP_MAJOR_VERSION > 7) {
            throw new \LogicException('Internal class parameter overriding is not available in PHP 8. Incompatible signatures have been reclassified as fatal errors.');
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (!isset($this->_internalClassParamMap[strtolower($class)])) {
            $this->_internalClassParamMap[strtolower($class)] = array();
        }
        $this->_internalClassParamMap[strtolower($class)][strtolower($method)] = $map;
    }

    /**
<<<<<<< HEAD
     * Remove all overridden parameter maps from internal PHP classes.
=======
     * Remove all overriden parameter maps from internal PHP classes.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function resetInternalClassMethodParamMaps()
    {
        $this->_internalClassParamMap = array();
    }

    /**
     * Get the parameter map of an internal PHP class method
     *
<<<<<<< HEAD
     * @return array|null
=======
     * @return array
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getInternalClassMethodParamMap($class, $method)
    {
        if (isset($this->_internalClassParamMap[strtolower($class)][strtolower($method)])) {
            return $this->_internalClassParamMap[strtolower($class)][strtolower($method)];
        }
    }

    public function getInternalClassMethodParamMaps()
    {
        return $this->_internalClassParamMap;
    }
<<<<<<< HEAD

    public function setConstantsMap(array $map)
    {
        $this->_constantsMap = $map;
    }

    public function getConstantsMap()
    {
        return $this->_constantsMap;
    }

    /**
     * Disable reflection caching
     *
     * It should be always enabled, except when using
     * PHPUnit's --static-backup option.
     *
     * @see https://github.com/mockery/mockery/issues/268
     */
    public function disableReflectionCache()
    {
        $this->_reflectionCacheEnabled = false;
    }

    /**
     * Enable reflection caching
     *
     * It should be always enabled, except when using
     * PHPUnit's --static-backup option.
     *
     * @see https://github.com/mockery/mockery/issues/268
     */
    public function enableReflectionCache()
    {
        $this->_reflectionCacheEnabled = true;
    }

    /**
     * Is reflection cache enabled?
     */
    public function reflectionCacheEnabled()
    {
        return $this->_reflectionCacheEnabled;
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
