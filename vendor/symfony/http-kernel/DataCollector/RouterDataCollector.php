<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ControllerEvent;

/**
=======
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

/**
 * RouterDataCollector.
 *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 * @author Fabien Potencier <fabien@symfony.com>
 */
class RouterDataCollector extends DataCollector
{
<<<<<<< HEAD
    /**
     * @var \SplObjectStorage<Request, callable>
     */
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    protected $controllers;

    public function __construct()
    {
<<<<<<< HEAD
        $this->reset();
=======
        $this->controllers = new \SplObjectStorage();

        $this->data = array(
            'redirect' => false,
            'url' => null,
            'route' => null,
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
<<<<<<< HEAD
     *
     * @final
     */
    public function collect(Request $request, Response $response, \Throwable $exception = null)
=======
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($response instanceof RedirectResponse) {
            $this->data['redirect'] = true;
            $this->data['url'] = $response->getTargetUrl();

            if ($this->controllers->contains($request)) {
                $this->data['route'] = $this->guessRoute($request, $this->controllers[$request]);
            }
        }

        unset($this->controllers[$request]);
    }

<<<<<<< HEAD
    public function reset()
    {
        $this->controllers = new \SplObjectStorage();

        $this->data = [
            'redirect' => false,
            'url' => null,
            'route' => null,
        ];
    }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    protected function guessRoute(Request $request, $controller)
    {
        return 'n/a';
    }

    /**
     * Remembers the controller associated to each request.
<<<<<<< HEAD
     */
    public function onKernelController(ControllerEvent $event)
=======
     *
     * @param FilterControllerEvent $event The filter controller event
     */
    public function onKernelController(FilterControllerEvent $event)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->controllers[$event->getRequest()] = $event->getController();
    }

    /**
     * @return bool Whether this request will result in a redirect
     */
    public function getRedirect()
    {
        return $this->data['redirect'];
    }

    /**
<<<<<<< HEAD
     * @return string|null
=======
     * @return string|null The target URL
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getTargetUrl()
    {
        return $this->data['url'];
    }

    /**
<<<<<<< HEAD
     * @return string|null
=======
     * @return string|null The target route
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getTargetRoute()
    {
        return $this->data['route'];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'router';
    }
}
