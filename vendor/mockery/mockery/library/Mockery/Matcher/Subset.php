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

class Subset extends MatcherAbstract
{
<<<<<<< HEAD
    private $expected;
    private $strict = true;

    /**
     * @param array $expected Expected subset of data
     * @param bool $strict Whether to run a strict or loose comparison
     */
    public function __construct(array $expected, $strict = true)
    {
        $this->expected = $expected;
        $this->strict = $strict;
    }

    /**
     * @param array $expected Expected subset of data
     *
     * @return Subset
     */
    public static function strict(array $expected)
    {
        return new static($expected, true);
    }

    /**
     * @param array $expected Expected subset of data
     *
     * @return Subset
     */
    public static function loose(array $expected)
    {
        return new static($expected, false);
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Check if the actual value matches the expected.
     *
     * @param mixed $actual
     * @return bool
     */
    public function match(&$actual)
    {
<<<<<<< HEAD
        if (!is_array($actual)) {
            return false;
        }

        if ($this->strict) {
            return $actual === array_replace_recursive($actual, $this->expected);
        }

        return $actual == array_replace_recursive($actual, $this->expected);
=======
        foreach ($this->_expected as $k=>$v) {
            if (!array_key_exists($k, $actual)) {
                return false;
            }
            if ($actual[$k] !== $v) {
                return false;
            }
        }
        return true;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Return a string representation of this Matcher
     *
     * @return string
     */
    public function __toString()
    {
        $return = '<Subset[';
        $elements = array();
<<<<<<< HEAD
        foreach ($this->expected as $k=>$v) {
=======
        foreach ($this->_expected as $k=>$v) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $elements[] = $k . '=' . (string) $v;
        }
        $return .= implode(', ', $elements) . ']>';
        return $return;
    }
}
