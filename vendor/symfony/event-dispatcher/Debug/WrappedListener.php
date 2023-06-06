<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\EventDispatcher\Debug;

<<<<<<< HEAD
use Psr\EventDispatcher\StoppableEventInterface;
=======
use Symfony\Component\EventDispatcher\Event;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Stopwatch\Stopwatch;
use Symfony\Component\VarDumper\Caster\ClassStub;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
<<<<<<< HEAD
final class WrappedListener
{
    private $listener;
    private $optimizedListener;
=======
class WrappedListener
{
    private $listener;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    private $name;
    private $called;
    private $stoppedPropagation;
    private $stopwatch;
    private $dispatcher;
    private $pretty;
    private $stub;
    private $priority;
    private static $hasClassStub;

<<<<<<< HEAD
    public function __construct($listener, ?string $name, Stopwatch $stopwatch, EventDispatcherInterface $dispatcher = null)
    {
        $this->listener = $listener;
        $this->optimizedListener = $listener instanceof \Closure ? $listener : (\is_callable($listener) ? \Closure::fromCallable($listener) : null);
=======
    public function __construct($listener, $name, Stopwatch $stopwatch, EventDispatcherInterface $dispatcher = null)
    {
        $this->listener = $listener;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->stopwatch = $stopwatch;
        $this->dispatcher = $dispatcher;
        $this->called = false;
        $this->stoppedPropagation = false;

        if (\is_array($listener)) {
<<<<<<< HEAD
            $this->name = \is_object($listener[0]) ? get_debug_type($listener[0]) : $listener[0];
            $this->pretty = $this->name.'::'.$listener[1];
        } elseif ($listener instanceof \Closure) {
            $r = new \ReflectionFunction($listener);
            if (str_contains($r->name, '{closure}')) {
                $this->pretty = $this->name = 'closure';
            } elseif ($class = \PHP_VERSION_ID >= 80111 ? $r->getClosureCalledClass() : $r->getClosureScopeClass()) {
=======
            $this->name = \is_object($listener[0]) ? \get_class($listener[0]) : $listener[0];
            $this->pretty = $this->name.'::'.$listener[1];
        } elseif ($listener instanceof \Closure) {
            $r = new \ReflectionFunction($listener);
            if (false !== strpos($r->name, '{closure}')) {
                $this->pretty = $this->name = 'closure';
            } elseif ($class = $r->getClosureScopeClass()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $this->name = $class->name;
                $this->pretty = $this->name.'::'.$r->name;
            } else {
                $this->pretty = $this->name = $r->name;
            }
        } elseif (\is_string($listener)) {
            $this->pretty = $this->name = $listener;
        } else {
<<<<<<< HEAD
            $this->name = get_debug_type($listener);
=======
            $this->name = \get_class($listener);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->pretty = $this->name.'::__invoke';
        }

        if (null !== $name) {
            $this->name = $name;
        }

        if (null === self::$hasClassStub) {
            self::$hasClassStub = class_exists(ClassStub::class);
        }
    }

    public function getWrappedListener()
    {
        return $this->listener;
    }

<<<<<<< HEAD
    public function wasCalled(): bool
=======
    public function wasCalled()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->called;
    }

<<<<<<< HEAD
    public function stoppedPropagation(): bool
=======
    public function stoppedPropagation()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->stoppedPropagation;
    }

<<<<<<< HEAD
    public function getPretty(): string
=======
    public function getPretty()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->pretty;
    }

<<<<<<< HEAD
    public function getInfo(string $eventName): array
=======
    public function getInfo($eventName)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null === $this->stub) {
            $this->stub = self::$hasClassStub ? new ClassStub($this->pretty.'()', $this->listener) : $this->pretty.'()';
        }

        return [
            'event' => $eventName,
            'priority' => null !== $this->priority ? $this->priority : (null !== $this->dispatcher ? $this->dispatcher->getListenerPriority($eventName, $this->listener) : null),
            'pretty' => $this->pretty,
            'stub' => $this->stub,
        ];
    }

<<<<<<< HEAD
    public function __invoke(object $event, string $eventName, EventDispatcherInterface $dispatcher): void
=======
    public function __invoke(Event $event, $eventName, EventDispatcherInterface $dispatcher)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $dispatcher = $this->dispatcher ?: $dispatcher;

        $this->called = true;
        $this->priority = $dispatcher->getListenerPriority($eventName, $this->listener);

        $e = $this->stopwatch->start($this->name, 'event_listener');

<<<<<<< HEAD
        ($this->optimizedListener ?? $this->listener)($event, $eventName, $dispatcher);
=======
        \call_user_func($this->listener, $event, $eventName, $dispatcher);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if ($e->isStarted()) {
            $e->stop();
        }

<<<<<<< HEAD
        if ($event instanceof StoppableEventInterface && $event->isPropagationStopped()) {
=======
        if ($event->isPropagationStopped()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->stoppedPropagation = true;
        }
    }
}
