<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\EventDispatcher;

<<<<<<< HEAD
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface as ContractsEventDispatcherInterface;

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/**
 * The EventDispatcherInterface is the central point of Symfony's event listener system.
 * Listeners are registered on the manager and events are dispatched through the
 * manager.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
<<<<<<< HEAD
interface EventDispatcherInterface extends ContractsEventDispatcherInterface
{
    /**
     * Adds an event listener that listens on the specified events.
     *
     * @param int $priority The higher this value, the earlier an event
     *                      listener will be triggered in the chain (defaults to 0)
     */
    public function addListener(string $eventName, callable $listener, int $priority = 0);
=======
interface EventDispatcherInterface
{
    /**
     * Dispatches an event to all registered listeners.
     *
     * @param string     $eventName The name of the event to dispatch. The name of
     *                              the event is the name of the method that is
     *                              invoked on listeners.
     * @param Event|null $event     The event to pass to the event handlers/listeners
     *                              If not supplied, an empty Event instance is created
     *
     * @return Event
     */
    public function dispatch($eventName, Event $event = null);

    /**
     * Adds an event listener that listens on the specified events.
     *
     * @param string   $eventName The event to listen on
     * @param callable $listener  The listener
     * @param int      $priority  The higher this value, the earlier an event
     *                            listener will be triggered in the chain (defaults to 0)
     */
    public function addListener($eventName, $listener, $priority = 0);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Adds an event subscriber.
     *
     * The subscriber is asked for all the events it is
     * interested in and added as a listener for these events.
     */
    public function addSubscriber(EventSubscriberInterface $subscriber);

    /**
     * Removes an event listener from the specified events.
<<<<<<< HEAD
     */
    public function removeListener(string $eventName, callable $listener);
=======
     *
     * @param string   $eventName The event to remove a listener from
     * @param callable $listener  The listener to remove
     */
    public function removeListener($eventName, $listener);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    public function removeSubscriber(EventSubscriberInterface $subscriber);

    /**
     * Gets the listeners of a specific event or all listeners sorted by descending priority.
     *
<<<<<<< HEAD
     * @return array<callable[]|callable>
     */
    public function getListeners(string $eventName = null);
=======
     * @param string|null $eventName The name of the event
     *
     * @return array The event listeners for the specified event, or all event listeners by event name
     */
    public function getListeners($eventName = null);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Gets the listener priority for a specific event.
     *
     * Returns null if the event or the listener does not exist.
     *
<<<<<<< HEAD
     * @return int|null
     */
    public function getListenerPriority(string $eventName, callable $listener);
=======
     * @param string   $eventName The name of the event
     * @param callable $listener  The listener
     *
     * @return int|null The event listener priority
     */
    public function getListenerPriority($eventName, $listener);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Checks whether an event has any registered listeners.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function hasListeners(string $eventName = null);
=======
     * @param string|null $eventName The name of the event
     *
     * @return bool true if the specified event has any listeners, false otherwise
     */
    public function hasListeners($eventName = null);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
