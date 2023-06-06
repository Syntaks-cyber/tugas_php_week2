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

namespace Mockery\Matcher;

class AnyOf extends MatcherAbstract
{
    /**
     * Check if the actual value does not match the expected (in this
     * case it's specifically NOT expected).
     *
     * @param mixed $actual
     * @return bool
     */
    public function match(&$actual)
    {
<<<<<<< HEAD
        return in_array($actual, $this->_expected, true);
=======
        foreach ($this->_expected as $exp) {
            if ($actual === $exp || $actual == $exp) {
                return true;
            }
        }
        return false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Return a string representation of this Matcher
     *
     * @return string
     */
    public function __toString()
    {
        return '<AnyOf>';
    }
}
