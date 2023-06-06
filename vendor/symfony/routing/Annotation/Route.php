<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Annotation;

/**
 * Annotation class for @Route().
 *
 * @Annotation
<<<<<<< HEAD
 * @NamedArgumentConstructor
 * @Target({"CLASS", "METHOD"})
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Alexander M. Turek <me@derrabus.de>
 */
#[\Attribute(\Attribute::IS_REPEATABLE | \Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD)]
class Route
{
    private $path;
    private $localizedPaths = [];
    private $name;
    private $requirements = [];
    private $options = [];
    private $defaults = [];
    private $host;
    private $methods = [];
    private $schemes = [];
    private $condition;
    private $priority;
    private $env;

    /**
     * @param array|string      $data         data array managed by the Doctrine Annotations library or the path
     * @param array|string|null $path
     * @param string[]          $requirements
     * @param string[]|string   $methods
     * @param string[]|string   $schemes
     *
     * @throws \BadMethodCallException
     */
    public function __construct(
        $data = [],
        $path = null,
        string $name = null,
        array $requirements = [],
        array $options = [],
        array $defaults = [],
        string $host = null,
        $methods = [],
        $schemes = [],
        string $condition = null,
        int $priority = null,
        string $locale = null,
        string $format = null,
        bool $utf8 = null,
        bool $stateless = null,
        string $env = null
    ) {
        if (\is_string($data)) {
            $data = ['path' => $data];
        } elseif (!\is_array($data)) {
            throw new \TypeError(sprintf('"%s": Argument $data is expected to be a string or array, got "%s".', __METHOD__, get_debug_type($data)));
        } elseif ([] !== $data) {
            $deprecation = false;
            foreach ($data as $key => $val) {
                if (\in_array($key, ['path', 'name', 'requirements', 'options', 'defaults', 'host', 'methods', 'schemes', 'condition', 'priority', 'locale', 'format', 'utf8', 'stateless', 'env', 'value'])) {
                    $deprecation = true;
                }
            }

            if ($deprecation) {
                trigger_deprecation('symfony/routing', '5.3', 'Passing an array as first argument to "%s" is deprecated. Use named arguments instead.', __METHOD__);
            } else {
                $localizedPaths = $data;
                $data = ['path' => $localizedPaths];
            }
        }
        if (null !== $path && !\is_string($path) && !\is_array($path)) {
            throw new \TypeError(sprintf('"%s": Argument $path is expected to be a string, array or null, got "%s".', __METHOD__, get_debug_type($path)));
        }

        $data['path'] = $data['path'] ?? $path;
        $data['name'] = $data['name'] ?? $name;
        $data['requirements'] = $data['requirements'] ?? $requirements;
        $data['options'] = $data['options'] ?? $options;
        $data['defaults'] = $data['defaults'] ?? $defaults;
        $data['host'] = $data['host'] ?? $host;
        $data['methods'] = $data['methods'] ?? $methods;
        $data['schemes'] = $data['schemes'] ?? $schemes;
        $data['condition'] = $data['condition'] ?? $condition;
        $data['priority'] = $data['priority'] ?? $priority;
        $data['locale'] = $data['locale'] ?? $locale;
        $data['format'] = $data['format'] ?? $format;
        $data['utf8'] = $data['utf8'] ?? $utf8;
        $data['stateless'] = $data['stateless'] ?? $stateless;
        $data['env'] = $data['env'] ?? $env;

        $data = array_filter($data, static function ($value): bool {
            return null !== $value;
        });

        if (isset($data['localized_paths'])) {
            throw new \BadMethodCallException(sprintf('Unknown property "localized_paths" on annotation "%s".', static::class));
        }

        if (isset($data['value'])) {
            $data[\is_array($data['value']) ? 'localized_paths' : 'path'] = $data['value'];
            unset($data['value']);
        }

        if (isset($data['path']) && \is_array($data['path'])) {
            $data['localized_paths'] = $data['path'];
            unset($data['path']);
        }

        if (isset($data['locale'])) {
            $data['defaults']['_locale'] = $data['locale'];
            unset($data['locale']);
        }

        if (isset($data['format'])) {
            $data['defaults']['_format'] = $data['format'];
            unset($data['format']);
        }

        if (isset($data['utf8'])) {
            $data['options']['utf8'] = filter_var($data['utf8'], \FILTER_VALIDATE_BOOLEAN) ?: false;
            unset($data['utf8']);
        }

        if (isset($data['stateless'])) {
            $data['defaults']['_stateless'] = filter_var($data['stateless'], \FILTER_VALIDATE_BOOLEAN) ?: false;
            unset($data['stateless']);
        }

        foreach ($data as $key => $value) {
            $method = 'set'.str_replace('_', '', $key);
            if (!method_exists($this, $method)) {
                throw new \BadMethodCallException(sprintf('Unknown property "%s" on annotation "%s".', $key, static::class));
=======
 * @Target({"CLASS", "METHOD"})
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Route
{
    private $path;
    private $name;
    private $requirements = array();
    private $options = array();
    private $defaults = array();
    private $host;
    private $methods = array();
    private $schemes = array();
    private $condition;

    /**
     * Constructor.
     *
     * @param array $data An array of key/value parameters
     *
     * @throws \BadMethodCallException
     */
    public function __construct(array $data)
    {
        if (isset($data['value'])) {
            $data['path'] = $data['value'];
            unset($data['value']);
        }

        foreach ($data as $key => $value) {
            $method = 'set'.str_replace('_', '', $key);
            if (!method_exists($this, $method)) {
                throw new \BadMethodCallException(sprintf('Unknown property "%s" on annotation "%s".', $key, get_class($this)));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
            $this->$method($value);
        }
    }

<<<<<<< HEAD
    public function setPath(string $path)
=======
    public function setPath($path)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }

<<<<<<< HEAD
    public function setLocalizedPaths(array $localizedPaths)
    {
        $this->localizedPaths = $localizedPaths;
    }

    public function getLocalizedPaths(): array
    {
        return $this->localizedPaths;
    }

    public function setHost(string $pattern)
=======
    public function setHost($pattern)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->host = $pattern;
    }

    public function getHost()
    {
        return $this->host;
    }

<<<<<<< HEAD
    public function setName(string $name)
=======
    public function setName($name)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

<<<<<<< HEAD
    public function setRequirements(array $requirements)
=======
    public function setRequirements($requirements)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->requirements = $requirements;
    }

    public function getRequirements()
    {
        return $this->requirements;
    }

<<<<<<< HEAD
    public function setOptions(array $options)
=======
    public function setOptions($options)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->options = $options;
    }

    public function getOptions()
    {
        return $this->options;
    }

<<<<<<< HEAD
    public function setDefaults(array $defaults)
=======
    public function setDefaults($defaults)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->defaults = $defaults;
    }

    public function getDefaults()
    {
        return $this->defaults;
    }

    public function setSchemes($schemes)
    {
<<<<<<< HEAD
        $this->schemes = \is_array($schemes) ? $schemes : [$schemes];
=======
        $this->schemes = is_array($schemes) ? $schemes : array($schemes);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    public function getSchemes()
    {
        return $this->schemes;
    }

    public function setMethods($methods)
    {
<<<<<<< HEAD
        $this->methods = \is_array($methods) ? $methods : [$methods];
=======
        $this->methods = is_array($methods) ? $methods : array($methods);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    public function getMethods()
    {
        return $this->methods;
    }

<<<<<<< HEAD
    public function setCondition(?string $condition)
=======
    public function setCondition($condition)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->condition = $condition;
    }

    public function getCondition()
    {
        return $this->condition;
    }
<<<<<<< HEAD

    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setEnv(?string $env): void
    {
        $this->env = $env;
    }

    public function getEnv(): ?string
    {
        return $this->env;
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
