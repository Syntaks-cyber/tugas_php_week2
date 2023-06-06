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
use Symfony\Component\HttpFoundation\RequestMatcherInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Event\TerminateEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Symfony\Component\HttpKernel\Profiler\Profiler;
=======
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Profiler\Profiler;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * ProfilerListener collects data for the current request by listening to the kernel events.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
 *
 * @final
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class ProfilerListener implements EventSubscriberInterface
{
    protected $profiler;
    protected $matcher;
    protected $onlyException;
<<<<<<< HEAD
    protected $onlyMainRequests;
    protected $exception;
    /** @var \SplObjectStorage<Request, Profile> */
    protected $profiles;
    protected $requestStack;
    protected $collectParameter;
    /** @var \SplObjectStorage<Request, Request|null> */
    protected $parents;

    /**
     * @param bool $onlyException    True if the profiler only collects data when an exception occurs, false otherwise
     * @param bool $onlyMainRequests True if the profiler only collects data when the request is the main request, false otherwise
     */
    public function __construct(Profiler $profiler, RequestStack $requestStack, RequestMatcherInterface $matcher = null, bool $onlyException = false, bool $onlyMainRequests = false, string $collectParameter = null)
    {
        $this->profiler = $profiler;
        $this->matcher = $matcher;
        $this->onlyException = $onlyException;
        $this->onlyMainRequests = $onlyMainRequests;
        $this->profiles = new \SplObjectStorage();
        $this->parents = new \SplObjectStorage();
        $this->requestStack = $requestStack;
        $this->collectParameter = $collectParameter;
=======
    protected $onlyMasterRequests;
    protected $exception;
    protected $profiles;
    protected $requestStack;
    protected $parents;

    /**
     * Constructor.
     *
     * @param Profiler                     $profiler           A Profiler instance
     * @param RequestStack                 $requestStack       A RequestStack instance
     * @param RequestMatcherInterface|null $matcher            A RequestMatcher instance
     * @param bool                         $onlyException      true if the profiler only collects data when an exception occurs, false otherwise
     * @param bool                         $onlyMasterRequests true if the profiler only collects data when the request is a master request, false otherwise
     */
    public function __construct(Profiler $profiler, RequestStack $requestStack, RequestMatcherInterface $matcher = null, $onlyException = false, $onlyMasterRequests = false)
    {
        $this->profiler = $profiler;
        $this->matcher = $matcher;
        $this->onlyException = (bool) $onlyException;
        $this->onlyMasterRequests = (bool) $onlyMasterRequests;
        $this->profiles = new \SplObjectStorage();
        $this->parents = new \SplObjectStorage();
        $this->requestStack = $requestStack;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Handles the onKernelException event.
<<<<<<< HEAD
     */
    public function onKernelException(ExceptionEvent $event)
    {
        if ($this->onlyMainRequests && !$event->isMainRequest()) {
            return;
        }

        $this->exception = $event->getThrowable();
=======
     *
     * @param GetResponseForExceptionEvent $event A GetResponseForExceptionEvent instance
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if ($this->onlyMasterRequests && !$event->isMasterRequest()) {
            return;
        }

        $this->exception = $event->getException();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Handles the onKernelResponse event.
<<<<<<< HEAD
     */
    public function onKernelResponse(ResponseEvent $event)
    {
        if ($this->onlyMainRequests && !$event->isMainRequest()) {
=======
     *
     * @param FilterResponseEvent $event A FilterResponseEvent instance
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $master = $event->isMasterRequest();
        if ($this->onlyMasterRequests && !$master) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return;
        }

        if ($this->onlyException && null === $this->exception) {
            return;
        }

        $request = $event->getRequest();
<<<<<<< HEAD
        if (null !== $this->collectParameter && null !== $collectParameterValue = $request->get($this->collectParameter)) {
            true === $collectParameterValue || filter_var($collectParameterValue, \FILTER_VALIDATE_BOOLEAN) ? $this->profiler->enable() : $this->profiler->disable();
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $exception = $this->exception;
        $this->exception = null;

        if (null !== $this->matcher && !$this->matcher->matches($request)) {
            return;
        }

<<<<<<< HEAD
        $session = $request->hasPreviousSession() && $request->hasSession() ? $request->getSession() : null;

        if ($session instanceof Session) {
            $usageIndexValue = $usageIndexReference = &$session->getUsageIndex();
            $usageIndexReference = \PHP_INT_MIN;
        }

        try {
            if (!$profile = $this->profiler->collect($request, $event->getResponse(), $exception)) {
                return;
            }
        } finally {
            if ($session instanceof Session) {
                $usageIndexReference = $usageIndexValue;
            }
=======
        if (!$profile = $this->profiler->collect($request, $event->getResponse(), $exception)) {
            return;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $this->profiles[$request] = $profile;

        $this->parents[$request] = $this->requestStack->getParentRequest();
    }

<<<<<<< HEAD
    public function onKernelTerminate(TerminateEvent $event)
    {
        // attach children to parents
        foreach ($this->profiles as $request) {
            if (null !== $parentRequest = $this->parents[$request]) {
=======
    public function onKernelTerminate(PostResponseEvent $event)
    {
        // attach children to parents
        foreach ($this->profiles as $request) {
            // isset call should be removed when requestStack is required
            if (isset($this->parents[$request]) && null !== $parentRequest = $this->parents[$request]) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                if (isset($this->profiles[$parentRequest])) {
                    $this->profiles[$parentRequest]->addChild($this->profiles[$request]);
                }
            }
        }

        // save profiles
        foreach ($this->profiles as $request) {
            $this->profiler->saveProfile($this->profiles[$request]);
        }

        $this->profiles = new \SplObjectStorage();
        $this->parents = new \SplObjectStorage();
    }

<<<<<<< HEAD
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => ['onKernelResponse', -100],
            KernelEvents::EXCEPTION => ['onKernelException', 0],
            KernelEvents::TERMINATE => ['onKernelTerminate', -1024],
        ];
=======
    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::RESPONSE => array('onKernelResponse', -100),
            KernelEvents::EXCEPTION => 'onKernelException',
            KernelEvents::TERMINATE => array('onKernelTerminate', -1024),
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
