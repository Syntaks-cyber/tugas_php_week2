<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Debug;

use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcher as BaseTraceableEventDispatcher;
use Symfony\Component\HttpKernel\KernelEvents;
<<<<<<< HEAD
=======
use Symfony\Component\EventDispatcher\Event;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Collects some data about event listeners.
 *
 * This event dispatcher delegates the dispatching to another one.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class TraceableEventDispatcher extends BaseTraceableEventDispatcher
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function beforeDispatch(string $eventName, object $event)
    {
        switch ($eventName) {
            case KernelEvents::REQUEST:
                $event->getRequest()->attributes->set('_stopwatch_token', substr(hash('sha256', uniqid(mt_rand(), true)), 0, 6));
=======
    protected function preDispatch($eventName, Event $event)
    {
        switch ($eventName) {
            case KernelEvents::REQUEST:
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $this->stopwatch->openSection();
                break;
            case KernelEvents::VIEW:
            case KernelEvents::RESPONSE:
                // stop only if a controller has been executed
                if ($this->stopwatch->isStarted('controller')) {
                    $this->stopwatch->stop('controller');
                }
                break;
            case KernelEvents::TERMINATE:
<<<<<<< HEAD
                $sectionId = $event->getRequest()->attributes->get('_stopwatch_token');
                if (null === $sectionId) {
                    break;
                }
=======
                $token = $event->getResponse()->headers->get('X-Debug-Token');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                // There is a very special case when using built-in AppCache class as kernel wrapper, in the case
                // of an ESI request leading to a `stale` response [B]  inside a `fresh` cached response [A].
                // In this case, `$token` contains the [B] debug token, but the  open `stopwatch` section ID
                // is equal to the [A] debug token. Trying to reopen section with the [B] token throws an exception
                // which must be caught.
                try {
<<<<<<< HEAD
                    $this->stopwatch->openSection($sectionId);
=======
                    $this->stopwatch->openSection($token);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                } catch (\LogicException $e) {
                }
                break;
        }
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function afterDispatch(string $eventName, object $event)
    {
        switch ($eventName) {
            case KernelEvents::CONTROLLER_ARGUMENTS:
                $this->stopwatch->start('controller', 'section');
                break;
            case KernelEvents::RESPONSE:
                $sectionId = $event->getRequest()->attributes->get('_stopwatch_token');
                if (null === $sectionId) {
                    break;
                }
                $this->stopwatch->stopSection($sectionId);
=======
    protected function postDispatch($eventName, Event $event)
    {
        switch ($eventName) {
            case KernelEvents::CONTROLLER:
                $this->stopwatch->start('controller', 'section');
                break;
            case KernelEvents::RESPONSE:
                $token = $event->getResponse()->headers->get('X-Debug-Token');
                $this->stopwatch->stopSection($token);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                break;
            case KernelEvents::TERMINATE:
                // In the special case described in the `preDispatch` method above, the `$token` section
                // does not exist, then closing it throws an exception which must be caught.
<<<<<<< HEAD
                $sectionId = $event->getRequest()->attributes->get('_stopwatch_token');
                if (null === $sectionId) {
                    break;
                }
                try {
                    $this->stopwatch->stopSection($sectionId);
=======
                $token = $event->getResponse()->headers->get('X-Debug-Token');
                try {
                    $this->stopwatch->stopSection($token);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                } catch (\LogicException $e) {
                }
                break;
        }
    }
}
