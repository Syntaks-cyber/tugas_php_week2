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

=======
 * @copyright  Copyright (c) 2010-2014 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
 */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
namespace Mockery;

interface ExpectationInterface
{
    /**
     * @return int
     */
    public function getOrderNumber();

    /**
<<<<<<< HEAD
     * @return LegacyMockInterface|MockInterface
=======
     * @return MockInterface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getMock();

    /**
<<<<<<< HEAD
     * @param array ...$args
     * @return self
     */
    public function andReturn(...$args);

    /**
     * @return self
     */
    public function andReturns();
=======
     * @return self
     */
    public function andReturn();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
