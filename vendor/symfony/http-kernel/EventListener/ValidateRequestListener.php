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

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
<<<<<<< HEAD
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Validates Requests.
 *
 * @author Magnus Nordlander <magnus@fervo.se>
 *
 * @final
=======
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Validates that the headers and other information indicating the
 * client IP address of a request are consistent.
 *
 * @author Magnus Nordlander <magnus@fervo.se>
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class ValidateRequestListener implements EventSubscriberInterface
{
    /**
     * Performs the validation.
<<<<<<< HEAD
     */
    public function onKernelRequest(RequestEvent $event)
    {
        if (!$event->isMainRequest()) {
=======
     *
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return;
        }
        $request = $event->getRequest();

        if ($request::getTrustedProxies()) {
<<<<<<< HEAD
            $request->getClientIps();
        }

        $request->getHost();
=======
            // This will throw an exception if the headers are inconsistent.
            $request->getClientIps();
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [
                ['onKernelRequest', 256],
            ],
        ];
=======
    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => array(
                array('onKernelRequest', 256),
            ),
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
