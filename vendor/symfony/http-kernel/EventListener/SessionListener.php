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
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpKernel\Event\RequestEvent;
=======
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Sets the session in the request.
 *
<<<<<<< HEAD
 * When the passed container contains a "session_storage" entry which
 * holds a NativeSessionStorage instance, the "cookie_secure" option
 * will be set to true whenever the current main request is secure.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class SessionListener extends AbstractSessionListener
{
    public function onKernelRequest(RequestEvent $event)
    {
        parent::onKernelRequest($event);

        if (!$event->isMainRequest() || (!$this->container->has('session') && !$this->container->has('session_factory'))) {
            return;
        }

        if ($this->container->has('session_storage')
            && ($storage = $this->container->get('session_storage')) instanceof NativeSessionStorage
            && ($mainRequest = $this->container->get('request_stack')->getMainRequest())
            && $mainRequest->isSecure()
        ) {
            $storage->setOptions(['cookie_secure' => true]);
        }
    }

    protected function getSession(): ?SessionInterface
    {
        if ($this->container->has('session')) {
            return $this->container->get('session');
        }

        if ($this->container->has('session_factory')) {
            return $this->container->get('session_factory')->createSession();
        }

        return null;
    }
=======
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
abstract class SessionListener implements EventSubscriberInterface
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $request = $event->getRequest();
        $session = $this->getSession();
        if (null === $session || $request->hasSession()) {
            return;
        }

        $request->setSession($session);
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => array('onKernelRequest', 128),
        );
    }

    /**
     * Gets the session object.
     *
     * @return SessionInterface|null A SessionInterface instance or null if no session is available
     */
    abstract protected function getSession();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
