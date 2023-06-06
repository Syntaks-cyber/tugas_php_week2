<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/**
 * ParameterBag is a container for key/value pairs.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
 *
 * @implements \IteratorAggregate<string, mixed>
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class ParameterBag implements \IteratorAggregate, \Countable
{
    /**
     * Parameter storage.
<<<<<<< HEAD
     */
    protected $parameters;

    public function __construct(array $parameters = [])
=======
     *
     * @var array
     */
    protected $parameters;

    /**
     * Constructor.
     *
     * @param array $parameters An array of parameters
     */
    public function __construct(array $parameters = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->parameters = $parameters;
    }

    /**
     * Returns the parameters.
     *
<<<<<<< HEAD
     * @param string|null $key The name of the parameter to return or null to get them all
     *
     * @return array
     */
    public function all(/* string $key = null */)
    {
        $key = \func_num_args() > 0 ? func_get_arg(0) : null;

        if (null === $key) {
            return $this->parameters;
        }

        if (!\is_array($value = $this->parameters[$key] ?? [])) {
            throw new BadRequestException(sprintf('Unexpected value for parameter "%s": expecting "array", got "%s".', $key, get_debug_type($value)));
        }

        return $value;
=======
     * @return array An array of parameters
     */
    public function all()
    {
        return $this->parameters;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the parameter keys.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array An array of parameter keys
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function keys()
    {
        return array_keys($this->parameters);
    }

    /**
     * Replaces the current parameters by a new set.
<<<<<<< HEAD
     */
    public function replace(array $parameters = [])
=======
     *
     * @param array $parameters An array of parameters
     */
    public function replace(array $parameters = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->parameters = $parameters;
    }

    /**
     * Adds parameters.
<<<<<<< HEAD
     */
    public function add(array $parameters = [])
=======
     *
     * @param array $parameters An array of parameters
     */
    public function add(array $parameters = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->parameters = array_replace($this->parameters, $parameters);
    }

    /**
     * Returns a parameter by name.
     *
<<<<<<< HEAD
     * @param mixed $default The default value if the parameter key does not exist
     *
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return \array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
=======
     * @param string $key     The key
     * @param mixed  $default The default value if the parameter key does not exist
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Sets a parameter by name.
     *
<<<<<<< HEAD
     * @param mixed $value The value
     */
    public function set(string $key, $value)
=======
     * @param string $key   The key
     * @param mixed  $value The value
     */
    public function set($key, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->parameters[$key] = $value;
    }

    /**
     * Returns true if the parameter is defined.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function has(string $key)
    {
        return \array_key_exists($key, $this->parameters);
=======
     * @param string $key The key
     *
     * @return bool true if the parameter exists, false otherwise
     */
    public function has($key)
    {
        return array_key_exists($key, $this->parameters);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Removes a parameter.
<<<<<<< HEAD
     */
    public function remove(string $key)
=======
     *
     * @param string $key The key
     */
    public function remove($key)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        unset($this->parameters[$key]);
    }

    /**
     * Returns the alphabetic characters of the parameter value.
     *
<<<<<<< HEAD
     * @return string
     */
    public function getAlpha(string $key, string $default = '')
=======
     * @param string $key     The parameter key
     * @param string $default The default value if the parameter key does not exist
     *
     * @return string The filtered value
     */
    public function getAlpha($key, $default = '')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return preg_replace('/[^[:alpha:]]/', '', $this->get($key, $default));
    }

    /**
     * Returns the alphabetic characters and digits of the parameter value.
     *
<<<<<<< HEAD
     * @return string
     */
    public function getAlnum(string $key, string $default = '')
=======
     * @param string $key     The parameter key
     * @param string $default The default value if the parameter key does not exist
     *
     * @return string The filtered value
     */
    public function getAlnum($key, $default = '')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return preg_replace('/[^[:alnum:]]/', '', $this->get($key, $default));
    }

    /**
     * Returns the digits of the parameter value.
     *
<<<<<<< HEAD
     * @return string
     */
    public function getDigits(string $key, string $default = '')
    {
        // we need to remove - and + because they're allowed in the filter
        return str_replace(['-', '+'], '', $this->filter($key, $default, \FILTER_SANITIZE_NUMBER_INT));
=======
     * @param string $key     The parameter key
     * @param string $default The default value if the parameter key does not exist
     *
     * @return string The filtered value
     */
    public function getDigits($key, $default = '')
    {
        // we need to remove - and + because they're allowed in the filter
        return str_replace(array('-', '+'), '', $this->filter($key, $default, FILTER_SANITIZE_NUMBER_INT));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the parameter value converted to integer.
     *
<<<<<<< HEAD
     * @return int
     */
    public function getInt(string $key, int $default = 0)
=======
     * @param string $key     The parameter key
     * @param int    $default The default value if the parameter key does not exist
     *
     * @return int The filtered value
     */
    public function getInt($key, $default = 0)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return (int) $this->get($key, $default);
    }

    /**
     * Returns the parameter value converted to boolean.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function getBoolean(string $key, bool $default = false)
    {
        return $this->filter($key, $default, \FILTER_VALIDATE_BOOLEAN);
=======
     * @param string $key     The parameter key
     * @param mixed  $default The default value if the parameter key does not exist
     *
     * @return bool The filtered value
     */
    public function getBoolean($key, $default = false)
    {
        return $this->filter($key, $default, FILTER_VALIDATE_BOOLEAN);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Filter key.
     *
<<<<<<< HEAD
     * @param mixed $default Default = null
     * @param int   $filter  FILTER_* constant
     * @param mixed $options Filter options
     *
     * @see https://php.net/filter-var
     *
     * @return mixed
     */
    public function filter(string $key, $default = null, int $filter = \FILTER_DEFAULT, $options = [])
=======
     * @param string $key     Key
     * @param mixed  $default Default = null
     * @param int    $filter  FILTER_* constant
     * @param mixed  $options Filter options
     *
     * @see http://php.net/manual/en/function.filter-var.php
     *
     * @return mixed
     */
    public function filter($key, $default = null, $filter = FILTER_DEFAULT, $options = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $value = $this->get($key, $default);

        // Always turn $options into an array - this allows filter_var option shortcuts.
<<<<<<< HEAD
        if (!\is_array($options) && $options) {
            $options = ['flags' => $options];
        }

        // Add a convenience check for arrays.
        if (\is_array($value) && !isset($options['flags'])) {
            $options['flags'] = \FILTER_REQUIRE_ARRAY;
        }

        if ((\FILTER_CALLBACK & $filter) && !(($options['options'] ?? null) instanceof \Closure)) {
            trigger_deprecation('symfony/http-foundation', '5.2', 'Not passing a Closure together with FILTER_CALLBACK to "%s()" is deprecated. Wrap your filter in a closure instead.', __METHOD__);
            // throw new \InvalidArgumentException(sprintf('A Closure must be passed to "%s()" when FILTER_CALLBACK is used, "%s" given.', __METHOD__, get_debug_type($options['options'] ?? null)));
=======
        if (!is_array($options) && $options) {
            $options = array('flags' => $options);
        }

        // Add a convenience check for arrays.
        if (is_array($value) && !isset($options['flags'])) {
            $options['flags'] = FILTER_REQUIRE_ARRAY;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return filter_var($value, $filter, $options);
    }

    /**
     * Returns an iterator for parameters.
     *
<<<<<<< HEAD
     * @return \ArrayIterator<string, mixed>
     */
    #[\ReturnTypeWillChange]
=======
     * @return \ArrayIterator An \ArrayIterator instance
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function getIterator()
    {
        return new \ArrayIterator($this->parameters);
    }

    /**
     * Returns the number of parameters.
     *
<<<<<<< HEAD
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
        return \count($this->parameters);
=======
     * @return int The number of parameters
     */
    public function count()
    {
        return count($this->parameters);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
