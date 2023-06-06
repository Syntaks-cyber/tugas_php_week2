<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\EventListener;

<<<<<<< HEAD
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\FinishRequestEvent;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\RequestContextAwareInterface;
=======
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\FinishRequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContextAwareInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Initializes the locale based on the current request.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
 *
 * @final
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class LocaleListener implements EventSubscriberInterface
{
    private $router;
    private $defaultLocale;
    private $requestStack;
<<<<<<< HEAD
    private $useAcceptLanguageHeader;
    private $enabledLocales;

    public function __construct(RequestStack $requestStack, string $defaultLocale = 'en', RequestContextAwareInterface $router = null, bool $useAcceptLanguageHeader = false, array $enabledLocales = [])
=======

    /**
     * Constructor.
     *
     * @param RequestStack                      $requestStack  A RequestStack instance
     * @param string                            $defaultLocale The default locale
     * @param RequestContextAwareInterface|null $router        The router
     */
    public function __construct(RequestStack $requestStack, $defaultLocale = 'en', RequestContextAwareInterface $router = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->defaultLocale = $defaultLocale;
        $this->requestStack = $requestStack;
        $this->router = $router;
<<<<<<< HEAD
        $this->useAcceptLanguageHeader = $useAcceptLanguageHeader;
        $this->enabledLocales = $enabledLocales;
    }

    public function setDefaultLocale(KernelEvent $event)
    {
        $event->getRequest()->setDefaultLocale($this->defaultLocale);
    }

    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();
=======
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $request->setDefaultLocale($this->defaultLocale);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $this->setLocale($request);
        $this->setRouterContext($request);
    }

    public function onKernelFinishRequest(FinishRequestEvent $event)
    {
        if (null !== $parentRequest = $this->requestStack->getParentRequest()) {
            $this->setRouterContext($parentRequest);
        }
    }

    private function setLocale(Request $request)
    {
        if ($locale = $request->attributes->get('_locale')) {
            $request->setLocale($locale);
<<<<<<< HEAD
        } elseif ($this->useAcceptLanguageHeader && $this->enabledLocales && ($preferredLanguage = $request->getPreferredLanguage($this->enabledLocales))) {
            $request->setLocale($preferredLanguage);
            $request->attributes->set('_vary_by_language', true);
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    private function setRouterContext(Request $request)
    {
        if (null !== $this->router) {
            $this->router->getContext()->setParameter('_locale', $request->getLocale());
        }
    }

<<<<<<< HEAD
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [
                ['setDefaultLocale', 100],
                // must be registered after the Router to have access to the _locale
                ['onKernelRequest', 16],
            ],
            KernelEvents::FINISH_REQUEST => [['onKernelFinishRequest', 0]],
        ];
=======
    public static function getSubscribedEvents()
    {
        return array(
            // must be registered after the Router to have access to the _locale
            KernelEvents::REQUEST => array(array('onKernelRequest', 16)),
            KernelEvents::FINISH_REQUEST => array(array('onKernelFinishRequest', 0)),
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
