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

namespace Mockery\Generator;

use Mockery\Reflector;

class Parameter
{
    /** @var int */
    private static $parameterCounter = 0;

    /** @var \ReflectionParameter */
=======

namespace Mockery\Generator;

class Parameter
{
    private static $parameterCounter;

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    private $rfp;

    public function __construct(\ReflectionParameter $rfp)
    {
        $this->rfp = $rfp;
    }

    public function __call($method, array $args)
    {
        return call_user_func_array(array($this->rfp, $method), $args);
    }

<<<<<<< HEAD
    /**
     * Get the reflection class for the parameter type, if it exists.
     *
     * This will be null if there was no type, or it was a scalar or a union.
     *
     * @return \ReflectionClass|null
     *
     * @deprecated since 1.3.3 and will be removed in 2.0.
     */
    public function getClass()
    {
        $typeHint = Reflector::getTypeHint($this->rfp, true);

        return \class_exists($typeHint) ? DefinedTargetClass::factory($typeHint, false) : null;
    }

    /**
     * Get the string representation for the paramater type.
     *
     * @return string|null
     */
    public function getTypeHint()
    {
        return Reflector::getTypeHint($this->rfp);
    }

    /**
     * Get the string representation for the paramater type.
     *
     * @return string
     *
     * @deprecated since 1.3.2 and will be removed in 2.0. Use getTypeHint() instead.
     */
    public function getTypeHintAsString()
    {
        return (string) Reflector::getTypeHint($this->rfp, true);
    }

    /**
     * Get the name of the parameter.
     *
     * Some internal classes have funny looking definitions!
     *
     * @return string
=======
    public function getClass()
    {
        return new DefinedTargetClass($this->rfp->getClass());
    }

    public function getTypeHintAsString()
    {
        if (method_exists($this->rfp, 'getTypehintText')) {
            // Available in HHVM
            $typehint = $this->rfp->getTypehintText();

            // not exhaustive, but will do for now
            if (in_array($typehint, array('int', 'integer', 'float', 'string', 'bool', 'boolean'))) {
                return '';
            }

            return $typehint;
        }

        if ($this->rfp->isArray()) {
            return 'array';
        }

        /*
         * PHP < 5.4.1 has some strange behaviour with a typehint of self and
         * subclass signatures, so we risk the regexp instead
         */
        if ((version_compare(PHP_VERSION, '5.4.1') >= 0)) {
            try {
                if ($this->rfp->getClass()) {
                    return $this->getOptionalSign() . $this->rfp->getClass()->getName();
                }
            } catch (\ReflectionException $re) {
                // noop
            }
        }

        if (version_compare(PHP_VERSION, '7.0.0-dev') >= 0 && $this->rfp->hasType()) {
            return $this->getOptionalSign() . $this->rfp->getType();
        }

        if (preg_match('/^Parameter #[0-9]+ \[ \<(required|optional)\> (?<typehint>\S+ )?.*\$' . $this->rfp->getName() . ' .*\]$/', $this->rfp->__toString(), $typehintMatch)) {
            if (!empty($typehintMatch['typehint'])) {
                return $typehintMatch['typehint'];
            }
        }

        return '';
    }

    private function getOptionalSign()
    {
        if (version_compare(PHP_VERSION, '7.1.0-dev', '>=') && $this->rfp->allowsNull() && !$this->rfp->isVariadic()) {
            return '?';
        }

        return '';
    }

    /**
     * Some internal classes have funny looking definitions...
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getName()
    {
        $name = $this->rfp->getName();
        if (!$name || $name == '...') {
<<<<<<< HEAD
            $name = 'arg' . self::$parameterCounter++;
=======
            $name = 'arg' . static::$parameterCounter++;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $name;
    }

<<<<<<< HEAD
    /**
     * Determine if the parameter is an array.
     *
     * @return bool
     */
    public function isArray()
    {
        return Reflector::isArray($this->rfp);
    }

    /**
     * Determine if the parameter is variadic.
     *
     * @return bool
     */
    public function isVariadic()
    {
        return $this->rfp->isVariadic();
=======

    /**
     * Variadics only introduced in 5.6
     */
    public function isVariadic()
    {
        return version_compare(PHP_VERSION, '5.6.0') >= 0 && $this->rfp->isVariadic();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
