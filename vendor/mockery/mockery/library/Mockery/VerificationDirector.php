<?php
<<<<<<< HEAD
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
 * @copyright  Copyright (c) 2010 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
 */
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

namespace Mockery;

class VerificationDirector
{
    private $receivedMethodCalls;
    private $expectation;

    public function __construct(ReceivedMethodCalls $receivedMethodCalls, VerificationExpectation $expectation)
    {
        $this->receivedMethodCalls = $receivedMethodCalls;
        $this->expectation = $expectation;
    }

    public function verify()
    {
        return $this->receivedMethodCalls->verify($this->expectation);
    }

<<<<<<< HEAD
    public function with(...$args)
    {
        return $this->cloneApplyAndVerify("with", $args);
    }

    public function withArgs($args)
=======
    public function with()
    {
        return $this->cloneApplyAndVerify("with", func_get_args());
    }

    public function withArgs(array $args)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->cloneApplyAndVerify("withArgs", array($args));
    }

    public function withNoArgs()
    {
        return $this->cloneApplyAndVerify("withNoArgs", array());
    }

    public function withAnyArgs()
    {
        return $this->cloneApplyAndVerify("withAnyArgs", array());
    }

    public function times($limit = null)
    {
        return $this->cloneWithoutCountValidatorsApplyAndVerify("times", array($limit));
    }

    public function once()
    {
        return $this->cloneWithoutCountValidatorsApplyAndVerify("once", array());
    }

    public function twice()
    {
        return $this->cloneWithoutCountValidatorsApplyAndVerify("twice", array());
    }

    public function atLeast()
    {
        return $this->cloneWithoutCountValidatorsApplyAndVerify("atLeast", array());
    }

    public function atMost()
    {
        return $this->cloneWithoutCountValidatorsApplyAndVerify("atMost", array());
    }

    public function between($minimum, $maximum)
    {
        return $this->cloneWithoutCountValidatorsApplyAndVerify("between", array($minimum, $maximum));
    }

    protected function cloneWithoutCountValidatorsApplyAndVerify($method, $args)
    {
        $expectation = clone $this->expectation;
        $expectation->clearCountValidators();
        call_user_func_array(array($expectation, $method), $args);
        $director = new VerificationDirector($this->receivedMethodCalls, $expectation);
        $director->verify();
        return $director;
    }

    protected function cloneApplyAndVerify($method, $args)
    {
        $expectation = clone $this->expectation;
        call_user_func_array(array($expectation, $method), $args);
        $director = new VerificationDirector($this->receivedMethodCalls, $expectation);
        $director->verify();
        return $director;
    }
}
