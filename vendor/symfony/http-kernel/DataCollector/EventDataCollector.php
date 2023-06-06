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
use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\Service\ResetInterface;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
=======
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcherInterface;

/**
 * EventDataCollector.
 *
 * @author Fabien Potencier <fabien@symfony.com>
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class EventDataCollector extends DataCollector implements LateDataCollectorInterface
{
    protected $dispatcher;
<<<<<<< HEAD
    private $requestStack;
    private $currentRequest;

    public function __construct(EventDispatcherInterface $dispatcher = null, RequestStack $requestStack = null)
    {
        $this->dispatcher = $dispatcher;
        $this->requestStack = $requestStack;
=======

    public function __construct(EventDispatcherInterface $dispatcher = null)
    {
        $this->dispatcher = $dispatcher;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function collect(Request $request, Response $response, \Throwable $exception = null)
    {
        $this->currentRequest = $this->requestStack && $this->requestStack->getMainRequest() !== $request ? $request : null;
        $this->data = [
            'called_listeners' => [],
            'not_called_listeners' => [],
            'orphaned_events' => [],
        ];
    }

    public function reset()
    {
        $this->data = [];

        if ($this->dispatcher instanceof ResetInterface) {
            $this->dispatcher->reset();
        }
=======
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $this->data = array(
            'called_listeners' => array(),
            'not_called_listeners' => array(),
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    public function lateCollect()
    {
<<<<<<< HEAD
        if ($this->dispatcher instanceof TraceableEventDispatcher) {
            $this->setCalledListeners($this->dispatcher->getCalledListeners($this->currentRequest));
            $this->setNotCalledListeners($this->dispatcher->getNotCalledListeners($this->currentRequest));
            $this->setOrphanedEvents($this->dispatcher->getOrphanedEvents($this->currentRequest));
        }

        $this->data = $this->cloneVar($this->data);
    }

    /**
     * @param array $listeners An array of called listeners
     *
     * @see TraceableEventDispatcher
=======
        if ($this->dispatcher instanceof TraceableEventDispatcherInterface) {
            $this->setCalledListeners($this->dispatcher->getCalledListeners());
            $this->setNotCalledListeners($this->dispatcher->getNotCalledListeners());
        }
    }

    /**
     * Sets the called listeners.
     *
     * @param array $listeners An array of called listeners
     *
     * @see TraceableEventDispatcherInterface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function setCalledListeners(array $listeners)
    {
        $this->data['called_listeners'] = $listeners;
    }

    /**
<<<<<<< HEAD
     * @see TraceableEventDispatcher
     *
     * @return array|Data
=======
     * Gets the called listeners.
     *
     * @return array An array of called listeners
     *
     * @see TraceableEventDispatcherInterface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getCalledListeners()
    {
        return $this->data['called_listeners'];
    }

    /**
<<<<<<< HEAD
     * @see TraceableEventDispatcher
=======
     * Sets the not called listeners.
     *
     * @param array $listeners An array of not called listeners
     *
     * @see TraceableEventDispatcherInterface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function setNotCalledListeners(array $listeners)
    {
        $this->data['not_called_listeners'] = $listeners;
    }

    /**
<<<<<<< HEAD
     * @see TraceableEventDispatcher
     *
     * @return array|Data
=======
     * Gets the not called listeners.
     *
     * @return array An array of not called listeners
     *
     * @see TraceableEventDispatcherInterface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getNotCalledListeners()
    {
        return $this->data['not_called_listeners'];
    }

    /**
<<<<<<< HEAD
     * @param array $events An array of orphaned events
     *
     * @see TraceableEventDispatcher
     */
    public function setOrphanedEvents(array $events)
    {
        $this->data['orphaned_events'] = $events;
    }

    /**
     * @see TraceableEventDispatcher
     *
     * @return array|Data
     */
    public function getOrphanedEvents()
    {
        return $this->data['orphaned_events'];
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
=======
     * {@inheritdoc}
     */
    public function getName()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 'events';
    }
}
