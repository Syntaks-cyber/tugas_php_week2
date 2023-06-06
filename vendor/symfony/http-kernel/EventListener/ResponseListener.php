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
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
=======
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * ResponseListener fixes the Response headers based on the Request.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
 *
 * @final
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class ResponseListener implements EventSubscriberInterface
{
    private $charset;
<<<<<<< HEAD
    private $addContentLanguageHeader;

    public function __construct(string $charset, bool $addContentLanguageHeader = false)
    {
        $this->charset = $charset;
        $this->addContentLanguageHeader = $addContentLanguageHeader;
=======

    public function __construct($charset)
    {
        $this->charset = $charset;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Filters the Response.
<<<<<<< HEAD
     */
    public function onKernelResponse(ResponseEvent $event)
    {
        if (!$event->isMainRequest()) {
=======
     *
     * @param FilterResponseEvent $event A FilterResponseEvent instance
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return;
        }

        $response = $event->getResponse();

        if (null === $response->getCharset()) {
            $response->setCharset($this->charset);
        }

<<<<<<< HEAD
        if ($this->addContentLanguageHeader && !$response->isInformational() && !$response->isEmpty() && !$response->headers->has('Content-Language')) {
            $response->headers->set('Content-Language', $event->getRequest()->getLocale());
        }

        if ($event->getRequest()->attributes->get('_vary_by_language')) {
            $response->setVary('Accept-Language', false);
        }

        $response->prepare($event->getRequest());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => 'onKernelResponse',
        ];
=======
        $response->prepare($event->getRequest());
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::RESPONSE => 'onKernelResponse',
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
