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

class CompositeExpectation implements ExpectationInterface
{
<<<<<<< HEAD
=======

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    /**
     * Stores an array of all expectations for this composite
     *
     * @var array
     */
    protected $_expectations = array();

    /**
     * Add an expectation to the composite
     *
     * @param \Mockery\Expectation|\Mockery\CompositeExpectation $expectation
     * @return void
     */
    public function add($expectation)
    {
        $this->_expectations[] = $expectation;
    }

    /**
<<<<<<< HEAD
     * @param mixed ...$args
     */
    public function andReturn(...$args)
    {
        return $this->__call(__FUNCTION__, $args);
    }

    /**
     * Set a return value, or sequential queue of return values
     *
     * @param mixed ...$args
     * @return self
     */
    public function andReturns(...$args)
    {
        return call_user_func_array([$this, 'andReturn'], $args);
=======
     * @param mixed ...
     */
    public function andReturn()
    {
        return $this->__call(__FUNCTION__, func_get_args());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Intercept any expectation calls and direct against all expectations
     *
     * @param string $method
     * @param array $args
     * @return self
     */
    public function __call($method, array $args)
    {
        foreach ($this->_expectations as $expectation) {
            call_user_func_array(array($expectation, $method), $args);
        }
        return $this;
    }

    /**
     * Return order number of the first expectation
     *
     * @return int
     */
    public function getOrderNumber()
    {
        reset($this->_expectations);
        $first = current($this->_expectations);
        return $first->getOrderNumber();
    }

    /**
     * Return the parent mock of the first expectation
     *
<<<<<<< HEAD
     * @return \Mockery\MockInterface|\Mockery\LegacyMockInterface
=======
     * @return \Mockery\MockInterface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getMock()
    {
        reset($this->_expectations);
        $first = current($this->_expectations);
        return $first->getMock();
    }

    /**
     * Mockery API alias to getMock
     *
<<<<<<< HEAD
     * @return \Mockery\LegacyMockInterface|\Mockery\MockInterface
=======
     * @return \Mockery\MockInterface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function mock()
    {
        return $this->getMock();
    }

    /**
     * Starts a new expectation addition on the first mock which is the primary
     * target outside of a demeter chain
     *
<<<<<<< HEAD
     * @param mixed ...$args
     * @return \Mockery\Expectation
     */
    public function shouldReceive(...$args)
    {
=======
     * @param mixed ...
     * @return \Mockery\Expectation
     */
    public function shouldReceive()
    {
        $args = func_get_args();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        reset($this->_expectations);
        $first = current($this->_expectations);
        return call_user_func_array(array($first->getMock(), 'shouldReceive'), $args);
    }

    /**
<<<<<<< HEAD
     * Starts a new expectation addition on the first mock which is the primary
     * target outside of a demeter chain
     *
     * @param mixed ...$args
     * @return \Mockery\Expectation
     */
    public function shouldNotReceive(...$args)
    {
        reset($this->_expectations);
        $first = current($this->_expectations);
        return call_user_func_array(array($first->getMock(), 'shouldNotReceive'), $args);
    }

    /**
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Return the string summary of this composite expectation
     *
     * @return string
     */
    public function __toString()
    {
        $return = '[';
        $parts = array();
        foreach ($this->_expectations as $exp) {
            $parts[] = (string) $exp;
        }
        $return .= implode(', ', $parts) . ']';
        return $return;
    }
}
