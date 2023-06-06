<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing;

/**
 * A Route describes a route and its parameters.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Tobias Schultze <http://tobion.de>
 */
class Route implements \Serializable
{
<<<<<<< HEAD
    private $path = '/';
    private $host = '';
    private $schemes = [];
    private $methods = [];
    private $defaults = [];
    private $requirements = [];
    private $options = [];
    private $condition = '';

    /**
     * @var CompiledRoute|null
=======
    /**
     * @var string
     */
    private $path = '/';

    /**
     * @var string
     */
    private $host = '';

    /**
     * @var array
     */
    private $schemes = array();

    /**
     * @var array
     */
    private $methods = array();

    /**
     * @var array
     */
    private $defaults = array();

    /**
     * @var array
     */
    private $requirements = array();

    /**
     * @var array
     */
    private $options = array();

    /**
     * @var null|CompiledRoute
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private $compiled;

    /**
<<<<<<< HEAD
=======
     * @var string
     */
    private $condition = '';

    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Constructor.
     *
     * Available options:
     *
     *  * compiler_class: A class name able to compile this route instance (RouteCompiler by default)
<<<<<<< HEAD
     *  * utf8:           Whether UTF-8 matching is enforced ot not
     *
     * @param string          $path         The path pattern to match
     * @param array           $defaults     An array of default parameter values
     * @param array           $requirements An array of requirements for parameters (regexes)
     * @param array           $options      An array of options
     * @param string|null     $host         The host pattern to match
     * @param string|string[] $schemes      A required URI scheme or an array of restricted schemes
     * @param string|string[] $methods      A required HTTP method or an array of restricted methods
     * @param string|null     $condition    A condition that should evaluate to true for the route to match
     */
    public function __construct(string $path, array $defaults = [], array $requirements = [], array $options = [], ?string $host = '', $schemes = [], $methods = [], ?string $condition = '')
    {
        $this->setPath($path);
        $this->addDefaults($defaults);
        $this->addRequirements($requirements);
=======
     *
     * @param string       $path         The path pattern to match
     * @param array        $defaults     An array of default parameter values
     * @param array        $requirements An array of requirements for parameters (regexes)
     * @param array        $options      An array of options
     * @param string       $host         The host pattern to match
     * @param string|array $schemes      A required URI scheme or an array of restricted schemes
     * @param string|array $methods      A required HTTP method or an array of restricted methods
     * @param string       $condition    A condition that should evaluate to true for the route to match
     */
    public function __construct($path, array $defaults = array(), array $requirements = array(), array $options = array(), $host = '', $schemes = array(), $methods = array(), $condition = '')
    {
        $this->setPath($path);
        $this->setDefaults($defaults);
        $this->setRequirements($requirements);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->setOptions($options);
        $this->setHost($host);
        $this->setSchemes($schemes);
        $this->setMethods($methods);
        $this->setCondition($condition);
    }

<<<<<<< HEAD
    public function __serialize(): array
    {
        return [
=======
    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize(array(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            'path' => $this->path,
            'host' => $this->host,
            'defaults' => $this->defaults,
            'requirements' => $this->requirements,
            'options' => $this->options,
            'schemes' => $this->schemes,
            'methods' => $this->methods,
            'condition' => $this->condition,
            'compiled' => $this->compiled,
<<<<<<< HEAD
        ];
    }

    /**
     * @internal
     */
    final public function serialize(): string
    {
        return serialize($this->__serialize());
    }

    public function __unserialize(array $data): void
    {
=======
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->path = $data['path'];
        $this->host = $data['host'];
        $this->defaults = $data['defaults'];
        $this->requirements = $data['requirements'];
        $this->options = $data['options'];
        $this->schemes = $data['schemes'];
        $this->methods = $data['methods'];

        if (isset($data['condition'])) {
            $this->condition = $data['condition'];
        }
        if (isset($data['compiled'])) {
            $this->compiled = $data['compiled'];
        }
    }

    /**
<<<<<<< HEAD
     * @internal
     */
    final public function unserialize($serialized)
    {
        $this->__unserialize(unserialize($serialized));
    }

    /**
     * @return string
=======
     * Returns the pattern for the path.
     *
     * @return string The path pattern
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function setPath(string $pattern)
    {
        $pattern = $this->extractInlineDefaultsAndRequirements($pattern);

=======
     * Sets the pattern for the path.
     *
     * This method implements a fluent interface.
     *
     * @param string $pattern The path pattern
     *
     * @return Route The current Route instance
     */
    public function setPath($pattern)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        // A pattern must start with a slash and must not have multiple slashes at the beginning because the
        // generated path for this route would be confused with a network path, e.g. '//domain.com/path'.
        $this->path = '/'.ltrim(trim($pattern), '/');
        $this->compiled = null;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @return string
=======
     * Returns the pattern for the host.
     *
     * @return string The host pattern
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function setHost(?string $pattern)
    {
        $this->host = $this->extractInlineDefaultsAndRequirements((string) $pattern);
=======
     * Sets the pattern for the host.
     *
     * This method implements a fluent interface.
     *
     * @param string $pattern The host pattern
     *
     * @return Route The current Route instance
     */
    public function setHost($pattern)
    {
        $this->host = (string) $pattern;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->compiled = null;

        return $this;
    }

    /**
     * Returns the lowercased schemes this route is restricted to.
     * So an empty array means that any scheme is allowed.
     *
<<<<<<< HEAD
     * @return string[]
=======
     * @return array The schemes
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getSchemes()
    {
        return $this->schemes;
    }

    /**
     * Sets the schemes (e.g. 'https') this route is restricted to.
     * So an empty array means that any scheme is allowed.
     *
<<<<<<< HEAD
     * @param string|string[] $schemes The scheme or an array of schemes
     *
     * @return $this
=======
     * This method implements a fluent interface.
     *
     * @param string|array $schemes The scheme or an array of schemes
     *
     * @return Route The current Route instance
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function setSchemes($schemes)
    {
        $this->schemes = array_map('strtolower', (array) $schemes);
        $this->compiled = null;

        return $this;
    }

    /**
     * Checks if a scheme requirement has been set.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function hasScheme(string $scheme)
    {
        return \in_array(strtolower($scheme), $this->schemes, true);
=======
     * @param string $scheme
     *
     * @return bool true if the scheme requirement exists, otherwise false
     */
    public function hasScheme($scheme)
    {
        return in_array(strtolower($scheme), $this->schemes, true);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the uppercased HTTP methods this route is restricted to.
     * So an empty array means that any method is allowed.
     *
<<<<<<< HEAD
     * @return string[]
=======
     * @return array The methods
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getMethods()
    {
        return $this->methods;
    }

    /**
     * Sets the HTTP methods (e.g. 'POST') this route is restricted to.
     * So an empty array means that any method is allowed.
     *
<<<<<<< HEAD
     * @param string|string[] $methods The method or an array of methods
     *
     * @return $this
=======
     * This method implements a fluent interface.
     *
     * @param string|array $methods The method or an array of methods
     *
     * @return Route The current Route instance
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function setMethods($methods)
    {
        $this->methods = array_map('strtoupper', (array) $methods);
        $this->compiled = null;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @return array
=======
     * Returns the options.
     *
     * @return array The options
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = [
            'compiler_class' => 'Symfony\\Component\\Routing\\RouteCompiler',
        ];
=======
     * Sets the options.
     *
     * This method implements a fluent interface.
     *
     * @param array $options The options
     *
     * @return Route The current Route instance
     */
    public function setOptions(array $options)
    {
        $this->options = array(
            'compiler_class' => 'Symfony\\Component\\Routing\\RouteCompiler',
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $this->addOptions($options);
    }

    /**
<<<<<<< HEAD
     * @return $this
=======
     * Adds options.
     *
     * This method implements a fluent interface.
     *
     * @param array $options The options
     *
     * @return Route The current Route instance
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function addOptions(array $options)
    {
        foreach ($options as $name => $option) {
            $this->options[$name] = $option;
        }
        $this->compiled = null;

        return $this;
    }

    /**
     * Sets an option value.
     *
<<<<<<< HEAD
     * @param mixed $value The option value
     *
     * @return $this
     */
    public function setOption(string $name, $value)
=======
     * This method implements a fluent interface.
     *
     * @param string $name  An option name
     * @param mixed  $value The option value
     *
     * @return Route The current Route instance
     */
    public function setOption($name, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->options[$name] = $value;
        $this->compiled = null;

        return $this;
    }

    /**
<<<<<<< HEAD
     * Returns the option value or null when not found.
     *
     * @return mixed
     */
    public function getOption(string $name)
    {
        return $this->options[$name] ?? null;
    }

    /**
     * @return bool
     */
    public function hasOption(string $name)
    {
        return \array_key_exists($name, $this->options);
    }

    /**
     * @return array
=======
     * Get an option value.
     *
     * @param string $name An option name
     *
     * @return mixed The option value or null when not given
     */
    public function getOption($name)
    {
        return isset($this->options[$name]) ? $this->options[$name] : null;
    }

    /**
     * Checks if an option has been set.
     *
     * @param string $name An option name
     *
     * @return bool true if the option is set, false otherwise
     */
    public function hasOption($name)
    {
        return array_key_exists($name, $this->options);
    }

    /**
     * Returns the defaults.
     *
     * @return array The defaults
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getDefaults()
    {
        return $this->defaults;
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function setDefaults(array $defaults)
    {
        $this->defaults = [];
=======
     * Sets the defaults.
     *
     * This method implements a fluent interface.
     *
     * @param array $defaults The defaults
     *
     * @return Route The current Route instance
     */
    public function setDefaults(array $defaults)
    {
        $this->defaults = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $this->addDefaults($defaults);
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function addDefaults(array $defaults)
    {
        if (isset($defaults['_locale']) && $this->isLocalized()) {
            unset($defaults['_locale']);
        }

=======
     * Adds defaults.
     *
     * This method implements a fluent interface.
     *
     * @param array $defaults The defaults
     *
     * @return Route The current Route instance
     */
    public function addDefaults(array $defaults)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        foreach ($defaults as $name => $default) {
            $this->defaults[$name] = $default;
        }
        $this->compiled = null;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @return mixed
     */
    public function getDefault(string $name)
    {
        return $this->defaults[$name] ?? null;
    }

    /**
     * @return bool
     */
    public function hasDefault(string $name)
    {
        return \array_key_exists($name, $this->defaults);
=======
     * Gets a default value.
     *
     * @param string $name A variable name
     *
     * @return mixed The default value or null when not given
     */
    public function getDefault($name)
    {
        return isset($this->defaults[$name]) ? $this->defaults[$name] : null;
    }

    /**
     * Checks if a default value is set for the given variable.
     *
     * @param string $name A variable name
     *
     * @return bool true if the default value is set, false otherwise
     */
    public function hasDefault($name)
    {
        return array_key_exists($name, $this->defaults);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Sets a default value.
     *
<<<<<<< HEAD
     * @param mixed $default The default value
     *
     * @return $this
     */
    public function setDefault(string $name, $default)
    {
        if ('_locale' === $name && $this->isLocalized()) {
            return $this;
        }

=======
     * @param string $name    A variable name
     * @param mixed  $default The default value
     *
     * @return Route The current Route instance
     */
    public function setDefault($name, $default)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->defaults[$name] = $default;
        $this->compiled = null;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @return array
=======
     * Returns the requirements.
     *
     * @return array The requirements
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function setRequirements(array $requirements)
    {
        $this->requirements = [];
=======
     * Sets the requirements.
     *
     * This method implements a fluent interface.
     *
     * @param array $requirements The requirements
     *
     * @return Route The current Route instance
     */
    public function setRequirements(array $requirements)
    {
        $this->requirements = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $this->addRequirements($requirements);
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function addRequirements(array $requirements)
    {
        if (isset($requirements['_locale']) && $this->isLocalized()) {
            unset($requirements['_locale']);
        }

=======
     * Adds requirements.
     *
     * This method implements a fluent interface.
     *
     * @param array $requirements The requirements
     *
     * @return Route The current Route instance
     */
    public function addRequirements(array $requirements)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        foreach ($requirements as $key => $regex) {
            $this->requirements[$key] = $this->sanitizeRequirement($key, $regex);
        }
        $this->compiled = null;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @return string|null
     */
    public function getRequirement(string $key)
    {
        return $this->requirements[$key] ?? null;
    }

    /**
     * @return bool
     */
    public function hasRequirement(string $key)
    {
        return \array_key_exists($key, $this->requirements);
    }

    /**
     * @return $this
     */
    public function setRequirement(string $key, string $regex)
    {
        if ('_locale' === $key && $this->isLocalized()) {
            return $this;
        }

=======
     * Returns the requirement for the given key.
     *
     * @param string $key The key
     *
     * @return string|null The regex or null when not given
     */
    public function getRequirement($key)
    {
        return isset($this->requirements[$key]) ? $this->requirements[$key] : null;
    }

    /**
     * Checks if a requirement is set for the given key.
     *
     * @param string $key A variable name
     *
     * @return bool true if a requirement is specified, false otherwise
     */
    public function hasRequirement($key)
    {
        return array_key_exists($key, $this->requirements);
    }

    /**
     * Sets a requirement for the given key.
     *
     * @param string $key   The key
     * @param string $regex The regex
     *
     * @return Route The current Route instance
     */
    public function setRequirement($key, $regex)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->requirements[$key] = $this->sanitizeRequirement($key, $regex);
        $this->compiled = null;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @return string
=======
     * Returns the condition.
     *
     * @return string The condition
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function setCondition(?string $condition)
=======
     * Sets the condition.
     *
     * This method implements a fluent interface.
     *
     * @param string $condition The condition
     *
     * @return Route The current Route instance
     */
    public function setCondition($condition)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->condition = (string) $condition;
        $this->compiled = null;

        return $this;
    }

    /**
     * Compiles the route.
     *
<<<<<<< HEAD
     * @return CompiledRoute
=======
     * @return CompiledRoute A CompiledRoute instance
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @throws \LogicException If the Route cannot be compiled because the
     *                         path or host pattern is invalid
     *
     * @see RouteCompiler which is responsible for the compilation process
     */
    public function compile()
    {
        if (null !== $this->compiled) {
            return $this->compiled;
        }

        $class = $this->getOption('compiler_class');

        return $this->compiled = $class::compile($this);
    }

<<<<<<< HEAD
    private function extractInlineDefaultsAndRequirements(string $pattern): string
    {
        if (false === strpbrk($pattern, '?<')) {
            return $pattern;
        }

        return preg_replace_callback('#\{(!?)(\w++)(<.*?>)?(\?[^\}]*+)?\}#', function ($m) {
            if (isset($m[4][0])) {
                $this->setDefault($m[2], '?' !== $m[4] ? substr($m[4], 1) : null);
            }
            if (isset($m[3][0])) {
                $this->setRequirement($m[2], substr($m[3], 1, -1));
            }

            return '{'.$m[1].$m[2].'}';
        }, $pattern);
    }

    private function sanitizeRequirement(string $key, string $regex)
    {
        if ('' !== $regex) {
            if ('^' === $regex[0]) {
                $regex = substr($regex, 1);
            } elseif (0 === strpos($regex, '\\A')) {
                $regex = substr($regex, 2);
            }
        }

        if (str_ends_with($regex, '$')) {
            $regex = substr($regex, 0, -1);
        } elseif (\strlen($regex) - 2 === strpos($regex, '\\z')) {
            $regex = substr($regex, 0, -2);
=======
    private function sanitizeRequirement($key, $regex)
    {
        if (!is_string($regex)) {
            throw new \InvalidArgumentException(sprintf('Routing requirement for "%s" must be a string.', $key));
        }

        if ('' !== $regex && '^' === $regex[0]) {
            $regex = (string) substr($regex, 1); // returns false for a single character
        }

        if ('$' === substr($regex, -1)) {
            $regex = substr($regex, 0, -1);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if ('' === $regex) {
            throw new \InvalidArgumentException(sprintf('Routing requirement for "%s" cannot be empty.', $key));
        }

        return $regex;
    }
<<<<<<< HEAD

    private function isLocalized(): bool
    {
        return isset($this->defaults['_locale']) && isset($this->defaults['_canonical_route']) && ($this->requirements['_locale'] ?? null) === preg_quote($this->defaults['_locale']);
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
