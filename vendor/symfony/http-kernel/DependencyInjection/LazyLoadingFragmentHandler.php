<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DependencyInjection;

<<<<<<< HEAD
use Psr\Container\ContainerInterface;
=======
use Symfony\Component\DependencyInjection\ContainerInterface;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Fragment\FragmentHandler;

/**
 * Lazily loads fragment renderers from the dependency injection container.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class LazyLoadingFragmentHandler extends FragmentHandler
{
    private $container;
<<<<<<< HEAD

    /**
     * @var array<string, bool>
     */
    private $initialized = [];

    public function __construct(ContainerInterface $container, RequestStack $requestStack, bool $debug = false)
    {
        $this->container = $container;

        parent::__construct($requestStack, [], $debug);
=======
    private $rendererIds = array();

    /**
     * Constructor.
     *
     * @param ContainerInterface $container    A container
     * @param RequestStack       $requestStack The Request stack that controls the lifecycle of requests
     * @param bool               $debug        Whether the debug mode is enabled or not
     */
    public function __construct(ContainerInterface $container, RequestStack $requestStack, $debug = false)
    {
        $this->container = $container;

        parent::__construct($requestStack, array(), $debug);
    }

    /**
     * Adds a service as a fragment renderer.
     *
     * @param string $renderer The render service id
     */
    public function addRendererService($name, $renderer)
    {
        $this->rendererIds[$name] = $renderer;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function render($uri, string $renderer = 'inline', array $options = [])
    {
        if (!isset($this->initialized[$renderer]) && $this->container->has($renderer)) {
            $this->addRenderer($this->container->get($renderer));
            $this->initialized[$renderer] = true;
=======
    public function render($uri, $renderer = 'inline', array $options = array())
    {
        if (isset($this->rendererIds[$renderer])) {
            $this->addRenderer($this->container->get($this->rendererIds[$renderer]));

            unset($this->rendererIds[$renderer]);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return parent::render($uri, $renderer, $options);
    }
}
