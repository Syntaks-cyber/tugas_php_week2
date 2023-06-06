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

<<<<<<< HEAD
use Symfony\Component\Config\Exception\LoaderLoadException;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Config\Resource\ResourceInterface;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

trigger_deprecation('symfony/routing', '5.1', 'The "%s" class is deprecated, use "%s" instead.', RouteCollectionBuilder::class, RoutingConfigurator::class);
=======
use Symfony\Component\Config\Exception\FileLoaderLoadException;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Config\Resource\ResourceInterface;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Helps add and import routes into a RouteCollection.
 *
 * @author Ryan Weaver <ryan@knpuniversity.com>
<<<<<<< HEAD
 *
 * @deprecated since Symfony 5.1, use RoutingConfigurator instead
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class RouteCollectionBuilder
{
    /**
     * @var Route[]|RouteCollectionBuilder[]
     */
<<<<<<< HEAD
    private $routes = [];

    private $loader;
    private $defaults = [];
    private $prefix;
    private $host;
    private $condition;
    private $requirements = [];
    private $options = [];
    private $schemes;
    private $methods;
    private $resources = [];

=======
    private $routes = array();

    private $loader;
    private $defaults = array();
    private $prefix;
    private $host;
    private $condition;
    private $requirements = array();
    private $options = array();
    private $schemes;
    private $methods;
    private $resources = array();

    /**
     * @param LoaderInterface $loader
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function __construct(LoaderInterface $loader = null)
    {
        $this->loader = $loader;
    }

    /**
     * Import an external routing resource and returns the RouteCollectionBuilder.
     *
<<<<<<< HEAD
     *     $routes->import('blog.yml', '/blog');
     *
     * @param mixed $resource
     *
     * @return self
     *
     * @throws LoaderLoadException
     */
    public function import($resource, string $prefix = '/', string $type = null)
    {
        /** @var RouteCollection[] $collections */
        $collections = $this->load($resource, $type);

        // create a builder from the RouteCollection
        $builder = $this->createBuilder();

        foreach ($collections as $collection) {
            if (null === $collection) {
                continue;
            }

            foreach ($collection->all() as $name => $route) {
                $builder->addRoute($route, $name);
            }

            foreach ($collection->getResources() as $resource) {
                $builder->addResource($resource);
            }
=======
     *  $routes->import('blog.yml', '/blog');
     *
     * @param mixed       $resource
     * @param string|null $prefix
     * @param string      $type
     *
     * @return RouteCollectionBuilder
     *
     * @throws FileLoaderLoadException
     */
    public function import($resource, $prefix = '/', $type = null)
    {
        /** @var RouteCollection $collection */
        $collection = $this->load($resource, $type);

        // create a builder from the RouteCollection
        $builder = $this->createBuilder();
        foreach ($collection->all() as $name => $route) {
            $builder->addRoute($route, $name);
        }

        foreach ($collection->getResources() as $resource) {
            $builder->addResource($resource);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        // mount into this builder
        $this->mount($prefix, $builder);

        return $builder;
    }

    /**
     * Adds a route and returns it for future modification.
     *
<<<<<<< HEAD
     * @return Route
     */
    public function add(string $path, string $controller, string $name = null)
=======
     * @param string      $path       The route path
     * @param string      $controller The route's controller
     * @param string|null $name       The name to give this route
     *
     * @return Route
     */
    public function add($path, $controller, $name = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $route = new Route($path);
        $route->setDefault('_controller', $controller);
        $this->addRoute($route, $name);

        return $route;
    }

    /**
     * Returns a RouteCollectionBuilder that can be configured and then added with mount().
     *
<<<<<<< HEAD
     * @return self
=======
     * @return RouteCollectionBuilder
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function createBuilder()
    {
        return new self($this->loader);
    }

    /**
     * Add a RouteCollectionBuilder.
<<<<<<< HEAD
     */
    public function mount(string $prefix, self $builder)
=======
     *
     * @param string                 $prefix
     * @param RouteCollectionBuilder $builder
     */
    public function mount($prefix, RouteCollectionBuilder $builder)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $builder->prefix = trim(trim($prefix), '/');
        $this->routes[] = $builder;
    }

    /**
     * Adds a Route object to the builder.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function addRoute(Route $route, string $name = null)
=======
     * @param Route       $route
     * @param string|null $name
     *
     * @return $this
     */
    public function addRoute(Route $route, $name = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null === $name) {
            // used as a flag to know which routes will need a name later
            $name = '_unnamed_route_'.spl_object_hash($route);
        }

        $this->routes[$name] = $route;

        return $this;
    }

    /**
     * Sets the host on all embedded routes (unless already set).
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setHost(?string $pattern)
=======
     * @param string $pattern
     *
     * @return $this
     */
    public function setHost($pattern)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->host = $pattern;

        return $this;
    }

    /**
     * Sets a condition on all embedded routes (unless already set).
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setCondition(?string $condition)
=======
     * @param string $condition
     *
     * @return $this
     */
    public function setCondition($condition)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * Sets a default value that will be added to all embedded routes (unless that
     * default value is already set).
     *
<<<<<<< HEAD
     * @param mixed $value
     *
     * @return $this
     */
    public function setDefault(string $key, $value)
=======
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function setDefault($key, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->defaults[$key] = $value;

        return $this;
    }

    /**
     * Sets a requirement that will be added to all embedded routes (unless that
     * requirement is already set).
     *
<<<<<<< HEAD
     * @param mixed $regex
     *
     * @return $this
     */
    public function setRequirement(string $key, $regex)
=======
     * @param string $key
     * @param mixed  $regex
     *
     * @return $this
     */
    public function setRequirement($key, $regex)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->requirements[$key] = $regex;

        return $this;
    }

    /**
<<<<<<< HEAD
     * Sets an option that will be added to all embedded routes (unless that
     * option is already set).
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function setOption(string $key, $value)
=======
     * Sets an opiton that will be added to all embedded routes (unless that
     * option is already set).
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function setOption($key, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->options[$key] = $value;

        return $this;
    }

    /**
     * Sets the schemes on all embedded routes (unless already set).
     *
     * @param array|string $schemes
     *
     * @return $this
     */
    public function setSchemes($schemes)
    {
        $this->schemes = $schemes;

        return $this;
    }

    /**
     * Sets the methods on all embedded routes (unless already set).
     *
     * @param array|string $methods
     *
     * @return $this
     */
    public function setMethods($methods)
    {
        $this->methods = $methods;

        return $this;
    }

    /**
     * Adds a resource for this collection.
     *
<<<<<<< HEAD
     * @return $this
     */
    private function addResource(ResourceInterface $resource): self
=======
     * @param ResourceInterface $resource
     *
     * @return $this
     */
    private function addResource(ResourceInterface $resource)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->resources[] = $resource;

        return $this;
    }

    /**
     * Creates the final RouteCollection and returns it.
     *
     * @return RouteCollection
     */
    public function build()
    {
        $routeCollection = new RouteCollection();

        foreach ($this->routes as $name => $route) {
            if ($route instanceof Route) {
                $route->setDefaults(array_merge($this->defaults, $route->getDefaults()));
                $route->setOptions(array_merge($this->options, $route->getOptions()));

                foreach ($this->requirements as $key => $val) {
                    if (!$route->hasRequirement($key)) {
                        $route->setRequirement($key, $val);
                    }
                }

                if (null !== $this->prefix) {
                    $route->setPath('/'.$this->prefix.$route->getPath());
                }

                if (!$route->getHost()) {
                    $route->setHost($this->host);
                }

                if (!$route->getCondition()) {
                    $route->setCondition($this->condition);
                }

                if (!$route->getSchemes()) {
                    $route->setSchemes($this->schemes);
                }

                if (!$route->getMethods()) {
                    $route->setMethods($this->methods);
                }

                // auto-generate the route name if it's been marked
                if ('_unnamed_route_' === substr($name, 0, 15)) {
                    $name = $this->generateRouteName($route);
                }

                $routeCollection->add($name, $route);
            } else {
                /* @var self $route */
                $subCollection = $route->build();
<<<<<<< HEAD
                if (null !== $this->prefix) {
                    $subCollection->addPrefix($this->prefix);
                }

                $routeCollection->addCollection($subCollection);
            }
        }

        foreach ($this->resources as $resource) {
            $routeCollection->addResource($resource);
=======
                $subCollection->addPrefix($this->prefix);

                $routeCollection->addCollection($subCollection);
            }

            foreach ($this->resources as $resource) {
                $routeCollection->addResource($resource);
            }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $routeCollection;
    }

    /**
     * Generates a route name based on details of this route.
<<<<<<< HEAD
     */
    private function generateRouteName(Route $route): string
=======
     *
     * @return string
     */
    private function generateRouteName(Route $route)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $methods = implode('_', $route->getMethods()).'_';

        $routeName = $methods.$route->getPath();
<<<<<<< HEAD
        $routeName = str_replace(['/', ':', '|', '-'], '_', $routeName);
=======
        $routeName = str_replace(array('/', ':', '|', '-'), '_', $routeName);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $routeName = preg_replace('/[^a-z0-9A-Z_.]+/', '', $routeName);

        // Collapse consecutive underscores down into a single underscore.
        $routeName = preg_replace('/_+/', '_', $routeName);

        return $routeName;
    }

    /**
     * Finds a loader able to load an imported resource and loads it.
     *
     * @param mixed       $resource A resource
     * @param string|null $type     The resource type or null if unknown
     *
<<<<<<< HEAD
     * @return RouteCollection[]
     *
     * @throws LoaderLoadException If no loader is found
     */
    private function load($resource, string $type = null): array
=======
     * @return RouteCollection
     *
     * @throws FileLoaderLoadException If no loader is found
     */
    private function load($resource, $type = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null === $this->loader) {
            throw new \BadMethodCallException('Cannot import other routing resources: you must pass a LoaderInterface when constructing RouteCollectionBuilder.');
        }

        if ($this->loader->supports($resource, $type)) {
<<<<<<< HEAD
            $collections = $this->loader->load($resource, $type);

            return \is_array($collections) ? $collections : [$collections];
        }

        if (null === $resolver = $this->loader->getResolver()) {
            throw new LoaderLoadException($resource, null, 0, null, $type);
        }

        if (false === $loader = $resolver->resolve($resource, $type)) {
            throw new LoaderLoadException($resource, null, 0, null, $type);
        }

        $collections = $loader->load($resource, $type);

        return \is_array($collections) ? $collections : [$collections];
=======
            return $this->loader->load($resource, $type);
        }

        if (null === $resolver = $this->loader->getResolver()) {
            throw new FileLoaderLoadException($resource);
        }

        if (false === $loader = $resolver->resolve($resource, $type)) {
            throw new FileLoaderLoadException($resource);
        }

        return $loader->load($resource, $type);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
