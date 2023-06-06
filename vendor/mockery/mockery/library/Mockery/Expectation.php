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

<<<<<<< HEAD
use Closure;
use Mockery\Matcher\NoArgs;
use Mockery\Matcher\AnyArgs;
use Mockery\Matcher\AndAnyOtherArgs;
use Mockery\Matcher\ArgumentListMatcher;
use Mockery\Matcher\MultiArgumentClosure;

class Expectation implements ExpectationInterface
{
    /**
     * Mock object to which this expectation belongs
     *
     * @var \Mockery\LegacyMockInterface
=======
class Expectation implements ExpectationInterface
{

    /**
     * Mock object to which this expectation belongs
     *
     * @var object
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected $_mock = null;

    /**
     * Method name
     *
     * @var string
     */
    protected $_name = null;

    /**
<<<<<<< HEAD
     * Exception message
     *
     * @var string|null
     */
    protected $_because = null;

    /**
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Arguments expected by this expectation
     *
     * @var array
     */
    protected $_expectedArgs = array();

    /**
     * Count validator store
     *
     * @var array
     */
    protected $_countValidators = array();

    /**
     * The count validator class to use
     *
     * @var string
     */
    protected $_countValidatorClass = 'Mockery\CountValidator\Exact';

    /**
     * Actual count of calls to this expectation
     *
     * @var int
     */
    protected $_actualCount = 0;

    /**
     * Value to return from this expectation
     *
     * @var mixed
     */
    protected $_returnValue = null;

    /**
     * Array of return values as a queue for multiple return sequence
     *
     * @var array
     */
    protected $_returnQueue = array();

    /**
     * Array of closures executed with given arguments to generate a result
     * to be returned
     *
     * @var array
     */
    protected $_closureQueue = array();

    /**
     * Array of values to be set when this expectation matches
     *
     * @var array
     */
    protected $_setQueue = array();

    /**
     * Integer representing the call order of this expectation
     *
     * @var int
     */
    protected $_orderNumber = null;

    /**
     * Integer representing the call order of this expectation on a global basis
     *
     * @var int
     */
    protected $_globalOrderNumber = null;

    /**
     * Flag indicating that an exception is expected to be throw (not returned)
     *
     * @var bool
     */
    protected $_throw = false;

    /**
     * Flag indicating whether the order of calling is determined locally or
     * globally
     *
     * @var bool
     */
    protected $_globally = false;

    /**
<<<<<<< HEAD
=======
     * Flag indicating we expect no arguments
     *
     * @var bool
     */
    protected $_noArgsExpectation = false;

    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Flag indicating if the return value should be obtained from the original
     * class method instead of returning predefined values from the return queue
     *
     * @var bool
     */
    protected $_passthru = false;

    /**
     * Constructor
     *
<<<<<<< HEAD
     * @param \Mockery\LegacyMockInterface $mock
     * @param string $name
     */
    public function __construct(\Mockery\LegacyMockInterface $mock, $name)
    {
        $this->_mock = $mock;
        $this->_name = $name;
        $this->withAnyArgs();
=======
     * @param \Mockery\MockInterface $mock
     * @param string $name
     */
    public function __construct(\Mockery\MockInterface $mock, $name)
    {
        $this->_mock = $mock;
        $this->_name = $name;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Return a string with the method name and arguments formatted
     *
     * @param string $name Name of the expected method
     * @param array $args List of arguments to the method
     * @return string
     */
    public function __toString()
    {
        return \Mockery::formatArgs($this->_name, $this->_expectedArgs);
    }

    /**
     * Verify the current call, i.e. that the given arguments match those
     * of this expectation
     *
     * @param array $args
     * @return mixed
     */
    public function verifyCall(array $args)
    {
        $this->validateOrder();
        $this->_actualCount++;
        if (true === $this->_passthru) {
            return $this->_mock->mockery_callSubjectMethod($this->_name, $args);
        }
<<<<<<< HEAD

        $return = $this->_getReturnValue($args);
        $this->throwAsNecessary($return);
        $this->_setValues();

        return $return;
    }

    /**
     * Throws an exception if the expectation has been configured to do so
     *
     * @throws \Exception|\Throwable
     * @return void
     */
    private function throwAsNecessary($return)
    {
        if (!$this->_throw) {
            return;
        }

        $type = \PHP_VERSION_ID >= 70000 ? "\Throwable" : "\Exception";

        if ($return instanceof $type) {
            throw $return;
        }

        return;
=======
        $return = $this->_getReturnValue($args);
        if ($return instanceof \Exception && $this->_throw === true) {
            throw $return;
        }
        $this->_setValues();
        return $return;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Sets public properties with queued values to the mock object
     *
     * @param array $args
     * @return mixed
     */
    protected function _setValues()
    {
        $mockClass = get_class($this->_mock);
        $container = $this->_mock->mockery_getContainer();
<<<<<<< HEAD
        /** @var Mock[] $mocks */
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $mocks = $container->getMocks();
        foreach ($this->_setQueue as $name => &$values) {
            if (count($values) > 0) {
                $value = array_shift($values);
<<<<<<< HEAD
                $this->_mock->{$name} = $value;
                foreach ($mocks as $mock) {
                    if (is_a($mock, $mockClass) && $mock->mockery_isInstance()) {
=======
                foreach ($mocks as $mock) {
                    if (is_a($mock, $mockClass)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                        $mock->{$name} = $value;
                    }
                }
            }
        }
    }

    /**
     * Fetch the return value for the matching args
     *
     * @param array $args
     * @return mixed
     */
    protected function _getReturnValue(array $args)
    {
        if (count($this->_closureQueue) > 1) {
            return call_user_func_array(array_shift($this->_closureQueue), $args);
        } elseif (count($this->_closureQueue) > 0) {
            return call_user_func_array(current($this->_closureQueue), $args);
        } elseif (count($this->_returnQueue) > 1) {
            return array_shift($this->_returnQueue);
        } elseif (count($this->_returnQueue) > 0) {
            return current($this->_returnQueue);
        }

<<<<<<< HEAD
        return $this->_mock->mockery_returnValueForMethod($this->_name);
=======
        $rm = $this->_mock->mockery_getMethod($this->_name);
        if ($rm && version_compare(PHP_VERSION, '7.0.0-dev') >= 0 && $rm->hasReturnType()) {
            $type = (string) $rm->getReturnType();
            switch ($type) {
                case '':       return;
                case 'void':   return;
                case 'string': return '';
                case 'int':    return 0;
                case 'float':  return 0.0;
                case 'bool':   return false;
                case 'array':  return array();

                case 'callable':
                case 'Closure':
                    return function () {
                    };

                case 'Traversable':
                case 'Generator':
                    // Remove eval() when minimum version >=5.5
                    $generator = eval('return function () { yield; };');
                    return $generator();

                default:
                    return \Mockery::mock($type);
            }
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Checks if this expectation is eligible for additional calls
     *
     * @return bool
     */
    public function isEligible()
    {
        foreach ($this->_countValidators as $validator) {
            if (!$validator->isEligible($this->_actualCount)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check if there is a constraint on call count
     *
     * @return bool
     */
    public function isCallCountConstrained()
    {
        return (count($this->_countValidators) > 0);
    }

    /**
     * Verify call order
     *
     * @return void
     */
    public function validateOrder()
    {
        if ($this->_orderNumber) {
            $this->_mock->mockery_validateOrder((string) $this, $this->_orderNumber, $this->_mock);
        }
        if ($this->_globalOrderNumber) {
            $this->_mock->mockery_getContainer()
                ->mockery_validateOrder((string) $this, $this->_globalOrderNumber, $this->_mock);
        }
    }

    /**
     * Verify this expectation
     *
<<<<<<< HEAD
     * @return void
=======
     * @return bool
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function verify()
    {
        foreach ($this->_countValidators as $validator) {
            $validator->validate($this->_actualCount);
        }
    }

    /**
<<<<<<< HEAD
     * Check if the registered expectation is an ArgumentListMatcher
     * @return bool
     */
    private function isArgumentListMatcher()
    {
        return (count($this->_expectedArgs) === 1 && ($this->_expectedArgs[0] instanceof ArgumentListMatcher));
    }

    private function isAndAnyOtherArgumentsMatcher($expectedArg)
    {
        return $expectedArg instanceof AndAnyOtherArgs;
    }

    /**
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Check if passed arguments match an argument expectation
     *
     * @param array $args
     * @return bool
     */
    public function matchArgs(array $args)
    {
<<<<<<< HEAD
        if ($this->isArgumentListMatcher()) {
            return $this->_matchArg($this->_expectedArgs[0], $args);
        }
        $argCount = count($args);
        if ($argCount !== count((array) $this->_expectedArgs)) {
            $lastExpectedArgument = end($this->_expectedArgs);
            reset($this->_expectedArgs);

            if ($this->isAndAnyOtherArgumentsMatcher($lastExpectedArgument)) {
                $args = array_slice($args, 0, array_search($lastExpectedArgument, $this->_expectedArgs, true));
                return $this->_matchArgs($args);
            }

            return false;
        }

        return $this->_matchArgs($args);
    }

    /**
     * Check if the passed arguments match the expectations, one by one.
     *
     * @param array $args
     * @return bool
     */
    protected function _matchArgs($args)
    {
=======
        if (empty($this->_expectedArgs) && !$this->_noArgsExpectation) {
            return true;
        }
        $expected = is_array($this->_expectedArgs) ? count($this->_expectedArgs) : 0;
        if (count($args) !== $expected) {
            return false;
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $argCount = count($args);
        for ($i=0; $i<$argCount; $i++) {
            $param =& $args[$i];
            if (!$this->_matchArg($this->_expectedArgs[$i], $param)) {
                return false;
            }
        }
<<<<<<< HEAD
=======

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return true;
    }

    /**
     * Check if passed argument matches an argument expectation
     *
<<<<<<< HEAD
     * @param mixed $expected
     * @param mixed $actual
=======
     * @param array $args
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return bool
     */
    protected function _matchArg($expected, &$actual)
    {
        if ($expected === $actual) {
            return true;
        }
        if (!is_object($expected) && !is_object($actual) && $expected == $actual) {
            return true;
        }
<<<<<<< HEAD
=======
        if (is_string($expected) && !is_array($actual) && !is_object($actual)) {
            # push/pop an error handler here to to make sure no error/exception thrown if $expected is not a regex
            set_error_handler(function () {
            });
            $result = preg_match($expected, (string) $actual);
            restore_error_handler();

            if ($result) {
                return true;
            }
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (is_string($expected) && is_object($actual)) {
            $result = $actual instanceof $expected;
            if ($result) {
                return true;
            }
        }
        if ($expected instanceof \Mockery\Matcher\MatcherAbstract) {
            return $expected->match($actual);
        }
<<<<<<< HEAD
        if ($expected instanceof \Hamcrest\Matcher || $expected instanceof \Hamcrest_Matcher) {
=======
        if (is_a($expected, '\Hamcrest\Matcher') || is_a($expected, '\Hamcrest_Matcher')) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return $expected->matches($actual);
        }
        return false;
    }

    /**
     * Expected argument setter for the expectation
     *
<<<<<<< HEAD
     * @param mixed ...$args
     *
     * @return self
     */
    public function with(...$args)
    {
        return $this->withArgs($args);
=======
     * @param mixed ...
     * @return self
     */
    public function with()
    {
        return $this->withArgs(func_get_args());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Expected arguments for the expectation passed as an array
     *
<<<<<<< HEAD
     * @param array $arguments
     * @return self
     */
    private function withArgsInArray(array $arguments)
    {
        if (empty($arguments)) {
            return $this->withNoArgs();
        }
        $this->_expectedArgs = $arguments;
        return $this;
    }

    /**
     * Expected arguments have to be matched by the given closure.
     *
     * @param Closure $closure
     * @return self
     */
    private function withArgsMatchedByClosure(Closure $closure)
    {
        $this->_expectedArgs = [new MultiArgumentClosure($closure)];
        return $this;
    }

    /**
     * Expected arguments for the expectation passed as an array or a closure that matches each passed argument on
     * each function call.
     *
     * @param array|Closure $argsOrClosure
     * @return self
     */
    public function withArgs($argsOrClosure)
    {
        if (is_array($argsOrClosure)) {
            $this->withArgsInArray($argsOrClosure);
        } elseif ($argsOrClosure instanceof Closure) {
            $this->withArgsMatchedByClosure($argsOrClosure);
        } else {
            throw new \InvalidArgumentException(sprintf('Call to %s with an invalid argument (%s), only array and ' .
                'closure are allowed', __METHOD__, $argsOrClosure));
        }
=======
     * @param array $args
     * @return self
     */
    public function withArgs(array $args)
    {
        if (empty($args)) {
            return $this->withNoArgs();
        }
        $this->_expectedArgs = $args;
        $this->_noArgsExpectation = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this;
    }

    /**
     * Set with() as no arguments expected
     *
     * @return self
     */
    public function withNoArgs()
    {
<<<<<<< HEAD
        $this->_expectedArgs = [new NoArgs()];
=======
        $this->_noArgsExpectation = true;
        $this->_expectedArgs = null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this;
    }

    /**
     * Set expectation that any arguments are acceptable
     *
     * @return self
     */
    public function withAnyArgs()
    {
<<<<<<< HEAD
        $this->_expectedArgs = [new AnyArgs()];
        return $this;
    }

    /**
     * Expected arguments should partially match the real arguments
     *
     * @param mixed ...$expectedArgs
     * @return self
     */
    public function withSomeOfArgs(...$expectedArgs)
    {
        return $this->withArgs(function (...$args) use ($expectedArgs) {
            foreach ($expectedArgs as $expectedArg) {
                if (!in_array($expectedArg, $args, true)) {
                    return false;
                }
            }
            return true;
        });
    }

    /**
     * Set a return value, or sequential queue of return values
     *
     * @param mixed ...$args
     * @return self
     */
    public function andReturn(...$args)
    {
        $this->_returnQueue = $args;
=======
        $this->_expectedArgs = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this;
    }

    /**
     * Set a return value, or sequential queue of return values
     *
<<<<<<< HEAD
     * @param mixed ...$args
     * @return self
     */
    public function andReturns(...$args)
    {
        return call_user_func_array([$this, 'andReturn'], $args);
=======
     * @param mixed ...
     * @return self
     */
    public function andReturn()
    {
        $this->_returnQueue = func_get_args();
        return $this;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Return this mock, like a fluent interface
     *
     * @return self
     */
    public function andReturnSelf()
    {
        return $this->andReturn($this->_mock);
    }

    /**
     * Set a sequential queue of return values with an array
     *
     * @param array $values
     * @return self
     */
    public function andReturnValues(array $values)
    {
        call_user_func_array(array($this, 'andReturn'), $values);
        return $this;
    }

    /**
     * Set a closure or sequence of closures with which to generate return
     * values. The arguments passed to the expected method are passed to the
     * closures as parameters.
     *
<<<<<<< HEAD
     * @param callable ...$args
     * @return self
     */
    public function andReturnUsing(...$args)
    {
        $this->_closureQueue = $args;
        return $this;
    }

    /**
     * Sets up a closure to return the nth argument from the expected method call
     *
     * @param int $index
     * @return self
     */
    public function andReturnArg($index)
    {
        if (!is_int($index) || $index < 0) {
            throw new \InvalidArgumentException("Invalid argument index supplied. Index must be a positive integer.");
        }
        $closure = function (...$args) use ($index) {
            if (array_key_exists($index, $args)) {
                return $args[$index];
            }
            throw new \OutOfBoundsException("Cannot return an argument value. No argument exists for the index $index");
        };

        $this->_closureQueue = [$closure];
=======
     * @param callable ...
     * @return self
     */
    public function andReturnUsing()
    {
        $this->_closureQueue = func_get_args();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this;
    }

    /**
     * Return a self-returning black hole object.
     *
     * @return self
     */
    public function andReturnUndefined()
    {
<<<<<<< HEAD
        $this->andReturn(new \Mockery\Undefined());
=======
        $this->andReturn(new \Mockery\Undefined);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this;
    }

    /**
     * Return null. This is merely a language construct for Mock describing.
     *
     * @return self
     */
    public function andReturnNull()
    {
<<<<<<< HEAD
        return $this->andReturn(null);
    }

    public function andReturnFalse()
    {
        return $this->andReturn(false);
    }

    public function andReturnTrue()
    {
        return $this->andReturn(true);
=======
        return $this;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Set Exception class and arguments to that class to be thrown
     *
<<<<<<< HEAD
     * @param string|\Exception $exception
     * @param string $message
     * @param int $code
     * @param \Exception $previous
=======
     * @param string $exception
     * @param string $message
     * @param int $code
     * @param Exception $previous
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return self
     */
    public function andThrow($exception, $message = '', $code = 0, \Exception $previous = null)
    {
        $this->_throw = true;
        if (is_object($exception)) {
            $this->andReturn($exception);
        } else {
            $this->andReturn(new $exception($message, $code, $previous));
        }
        return $this;
    }

<<<<<<< HEAD
    public function andThrows($exception, $message = '', $code = 0, \Exception $previous = null)
    {
        return $this->andThrow($exception, $message, $code, $previous);
    }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    /**
     * Set Exception classes to be thrown
     *
     * @param array $exceptions
     * @return self
     */
    public function andThrowExceptions(array $exceptions)
    {
        $this->_throw = true;
        foreach ($exceptions as $exception) {
            if (!is_object($exception)) {
                throw new Exception('You must pass an array of exception objects to andThrowExceptions');
            }
        }
        return $this->andReturnValues($exceptions);
    }

    /**
     * Register values to be set to a public property each time this expectation occurs
     *
     * @param string $name
<<<<<<< HEAD
     * @param array ...$values
     * @return self
     */
    public function andSet($name, ...$values)
    {
=======
     * @param mixed $value
     * @return self
     */
    public function andSet($name, $value)
    {
        $values = func_get_args();
        array_shift($values);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->_setQueue[$name] = $values;
        return $this;
    }

    /**
     * Alias to andSet(). Allows the natural English construct
     * - set('foo', 'bar')->andReturn('bar')
     *
     * @param string $name
     * @param mixed $value
     * @return self
     */
    public function set($name, $value)
    {
        return call_user_func_array(array($this, 'andSet'), func_get_args());
    }

    /**
     * Indicates this expectation should occur zero or more times
     *
     * @return self
     */
    public function zeroOrMoreTimes()
    {
        $this->atLeast()->never();
    }

    /**
     * Indicates the number of times this expectation should occur
     *
     * @param int $limit
<<<<<<< HEAD
     * @throws \InvalidArgumentException
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return self
     */
    public function times($limit = null)
    {
        if (is_null($limit)) {
            return $this;
        }
<<<<<<< HEAD
        if (!is_int($limit)) {
            throw new \InvalidArgumentException('The passed Times limit should be an integer value');
        }
        $this->_countValidators[$this->_countValidatorClass] = new $this->_countValidatorClass($this, $limit);
=======
        $this->_countValidators[] = new $this->_countValidatorClass($this, $limit);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->_countValidatorClass = 'Mockery\CountValidator\Exact';
        return $this;
    }

    /**
     * Indicates that this expectation is never expected to be called
     *
     * @return self
     */
    public function never()
    {
        return $this->times(0);
    }

    /**
     * Indicates that this expectation is expected exactly once
     *
     * @return self
     */
    public function once()
    {
        return $this->times(1);
    }

    /**
     * Indicates that this expectation is expected exactly twice
     *
     * @return self
     */
    public function twice()
    {
        return $this->times(2);
    }

    /**
     * Sets next count validator to the AtLeast instance
     *
     * @return self
     */
    public function atLeast()
    {
        $this->_countValidatorClass = 'Mockery\CountValidator\AtLeast';
        return $this;
    }

    /**
     * Sets next count validator to the AtMost instance
     *
     * @return self
     */
    public function atMost()
    {
        $this->_countValidatorClass = 'Mockery\CountValidator\AtMost';
        return $this;
    }

    /**
     * Shorthand for setting minimum and maximum constraints on call counts
     *
     * @param int $minimum
     * @param int $maximum
     */
    public function between($minimum, $maximum)
    {
        return $this->atLeast()->times($minimum)->atMost()->times($maximum);
    }

<<<<<<< HEAD

    /**
     * Set the exception message
     *
     * @param string $message
     * @return $this
     */
    public function because($message)
    {
        $this->_because = $message;
        return $this;
    }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    /**
     * Indicates that this expectation must be called in a specific given order
     *
     * @param string $group Name of the ordered group
     * @return self
     */
    public function ordered($group = null)
    {
        if ($this->_globally) {
            $this->_globalOrderNumber = $this->_defineOrdered($group, $this->_mock->mockery_getContainer());
        } else {
            $this->_orderNumber = $this->_defineOrdered($group, $this->_mock);
        }
        $this->_globally = false;
        return $this;
    }

    /**
     * Indicates call order should apply globally
     *
     * @return self
     */
    public function globally()
    {
        $this->_globally = true;
        return $this;
    }

    /**
     * Setup the ordering tracking on the mock or mock container
     *
     * @param string $group
     * @param object $ordering
     * @return int
     */
    protected function _defineOrdered($group, $ordering)
    {
        $groups = $ordering->mockery_getGroups();
        if (is_null($group)) {
            $result = $ordering->mockery_allocateOrder();
        } elseif (isset($groups[$group])) {
            $result = $groups[$group];
        } else {
            $result = $ordering->mockery_allocateOrder();
            $ordering->mockery_setGroup($group, $result);
        }
        return $result;
    }

    /**
     * Return order number
     *
     * @return int
     */
    public function getOrderNumber()
    {
        return $this->_orderNumber;
    }

    /**
     * Mark this expectation as being a default
     *
     * @return self
     */
    public function byDefault()
    {
        $director = $this->_mock->mockery_getExpectationsFor($this->_name);
        if (!empty($director)) {
            $director->makeExpectationDefault($this);
        }
        return $this;
    }

    /**
     * Return the parent mock of the expectation
     *
<<<<<<< HEAD
     * @return \Mockery\LegacyMockInterface|\Mockery\MockInterface
=======
     * @return \Mockery\MockInterface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getMock()
    {
        return $this->_mock;
    }

    /**
     * Flag this expectation as calling the original class method with the
     * any provided arguments instead of using a return value queue.
     *
     * @return self
     */
    public function passthru()
    {
        if ($this->_mock instanceof Mock) {
            throw new Exception(
                'Mock Objects not created from a loaded/existing class are '
                . 'incapable of passing method calls through to a parent class'
            );
        }
        $this->_passthru = true;
        return $this;
    }

    /**
     * Cloning logic
     *
     */
    public function __clone()
    {
        $newValidators = array();
        $countValidators = $this->_countValidators;
        foreach ($countValidators as $validator) {
            $newValidators[] = clone $validator;
        }
        $this->_countValidators = $newValidators;
    }

    public function getName()
    {
        return $this->_name;
    }
<<<<<<< HEAD

    public function getExceptionMessage()
    {
        return $this->_because;
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
