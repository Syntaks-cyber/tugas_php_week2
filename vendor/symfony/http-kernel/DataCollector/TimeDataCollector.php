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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
<<<<<<< HEAD
use Symfony\Component\Stopwatch\Stopwatch;
use Symfony\Component\Stopwatch\StopwatchEvent;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class TimeDataCollector extends DataCollector implements LateDataCollectorInterface
{
    private $kernel;
    private $stopwatch;

    public function __construct(KernelInterface $kernel = null, Stopwatch $stopwatch = null)
=======

/**
 * TimeDataCollector.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class TimeDataCollector extends DataCollector implements LateDataCollectorInterface
{
    protected $kernel;
    protected $stopwatch;

    public function __construct(KernelInterface $kernel = null, $stopwatch = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->kernel = $kernel;
        $this->stopwatch = $stopwatch;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function collect(Request $request, Response $response, \Throwable $exception = null)
=======
    public function collect(Request $request, Response $response, \Exception $exception = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null !== $this->kernel) {
            $startTime = $this->kernel->getStartTime();
        } else {
<<<<<<< HEAD
            $startTime = $request->server->get('REQUEST_TIME_FLOAT');
        }

        $this->data = [
            'token' => $request->attributes->get('_stopwatch_token'),
            'start_time' => $startTime * 1000,
            'events' => [],
            'stopwatch_installed' => class_exists(Stopwatch::class, false),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        $this->data = [];

        if (null !== $this->stopwatch) {
            $this->stopwatch->reset();
        }
=======
            $startTime = $request->server->get('REQUEST_TIME_FLOAT', $request->server->get('REQUEST_TIME'));
        }

        $this->data = array(
            'token' => $response->headers->get('X-Debug-Token'),
            'start_time' => $startTime * 1000,
            'events' => array(),
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
    public function lateCollect()
    {
        if (null !== $this->stopwatch && isset($this->data['token'])) {
            $this->setEvents($this->stopwatch->getSectionEvents($this->data['token']));
        }
        unset($this->data['token']);
    }

    /**
<<<<<<< HEAD
     * @param StopwatchEvent[] $events The request events
=======
     * Sets the request events.
     *
     * @param array $events The request events
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function setEvents(array $events)
    {
        foreach ($events as $event) {
            $event->ensureStopped();
        }

        $this->data['events'] = $events;
    }

    /**
<<<<<<< HEAD
     * @return StopwatchEvent[]
     */
    public function getEvents(): array
=======
     * Gets the request events.
     *
     * @return array The request events
     */
    public function getEvents()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['events'];
    }

    /**
     * Gets the request elapsed time.
<<<<<<< HEAD
     */
    public function getDuration(): float
=======
     *
     * @return float The elapsed time
     */
    public function getDuration()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!isset($this->data['events']['__section__'])) {
            return 0;
        }

        $lastEvent = $this->data['events']['__section__'];

        return $lastEvent->getOrigin() + $lastEvent->getDuration() - $this->getStartTime();
    }

    /**
     * Gets the initialization time.
     *
     * This is the time spent until the beginning of the request handling.
<<<<<<< HEAD
     */
    public function getInitTime(): float
=======
     *
     * @return float The elapsed time
     */
    public function getInitTime()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!isset($this->data['events']['__section__'])) {
            return 0;
        }

        return $this->data['events']['__section__']->getOrigin() - $this->getStartTime();
    }

<<<<<<< HEAD
    public function getStartTime(): float
=======
    /**
     * Gets the request time.
     *
     * @return int The time
     */
    public function getStartTime()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['start_time'];
    }

<<<<<<< HEAD
    public function isStopwatchInstalled(): bool
    {
        return $this->data['stopwatch_installed'];
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
=======
    /**
     * {@inheritdoc}
     */
    public function getName()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 'time';
    }
}
