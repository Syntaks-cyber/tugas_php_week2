<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session;

use Symfony\Component\HttpFoundation\Session\Storage\MetadataBag;

/**
 * Interface for the session.
 *
 * @author Drak <drak@zikula.org>
 */
interface SessionInterface
{
    /**
     * Starts the session storage.
     *
<<<<<<< HEAD
     * @return bool
     *
     * @throws \RuntimeException if session fails to start
=======
     * @return bool True if session started
     *
     * @throws \RuntimeException If session fails to start.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function start();

    /**
     * Returns the session ID.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The session ID
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getId();

    /**
     * Sets the session ID.
<<<<<<< HEAD
     */
    public function setId(string $id);
=======
     *
     * @param string $id
     */
    public function setId($id);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns the session name.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return mixed The session name
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getName();

    /**
     * Sets the session name.
<<<<<<< HEAD
     */
    public function setName(string $name);
=======
     *
     * @param string $name
     */
    public function setName($name);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Invalidates the current session.
     *
     * Clears all session attributes and flashes and regenerates the
     * session and deletes the old session from persistence.
     *
     * @param int $lifetime Sets the cookie lifetime for the session cookie. A null value
     *                      will leave the system settings unchanged, 0 sets the cookie
     *                      to expire with browser session. Time is in seconds, and is
     *                      not a Unix timestamp.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function invalidate(int $lifetime = null);
=======
     * @return bool True if session invalidated, false if error
     */
    public function invalidate($lifetime = null);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Migrates the current session to a new session id while maintaining all
     * session attributes.
     *
     * @param bool $destroy  Whether to delete the old session or leave it to garbage collection
     * @param int  $lifetime Sets the cookie lifetime for the session cookie. A null value
     *                       will leave the system settings unchanged, 0 sets the cookie
     *                       to expire with browser session. Time is in seconds, and is
     *                       not a Unix timestamp.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function migrate(bool $destroy = false, int $lifetime = null);
=======
     * @return bool True if session migrated, false if error
     */
    public function migrate($destroy = false, $lifetime = null);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Force the session to be saved and closed.
     *
     * This method is generally not required for real sessions as
     * the session will be automatically saved at the end of
     * code execution.
     */
    public function save();

    /**
     * Checks if an attribute is defined.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function has(string $name);
=======
     * @param string $name The attribute name
     *
     * @return bool true if the attribute is defined, false otherwise
     */
    public function has($name);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns an attribute.
     *
<<<<<<< HEAD
     * @param mixed $default The default value if not found
     *
     * @return mixed
     */
    public function get(string $name, $default = null);
=======
     * @param string $name    The attribute name
     * @param mixed  $default The default value if not found
     *
     * @return mixed
     */
    public function get($name, $default = null);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Sets an attribute.
     *
<<<<<<< HEAD
     * @param mixed $value
     */
    public function set(string $name, $value);
=======
     * @param string $name
     * @param mixed  $value
     */
    public function set($name, $value);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns attributes.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array Attributes
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function all();

    /**
     * Sets attributes.
<<<<<<< HEAD
=======
     *
     * @param array $attributes Attributes
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function replace(array $attributes);

    /**
     * Removes an attribute.
     *
<<<<<<< HEAD
     * @return mixed The removed value or null when it does not exist
     */
    public function remove(string $name);
=======
     * @param string $name
     *
     * @return mixed The removed value or null when it does not exist
     */
    public function remove($name);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Clears all attributes.
     */
    public function clear();

    /**
     * Checks if the session was started.
     *
     * @return bool
     */
    public function isStarted();

    /**
     * Registers a SessionBagInterface with the session.
<<<<<<< HEAD
=======
     *
     * @param SessionBagInterface $bag
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function registerBag(SessionBagInterface $bag);

    /**
     * Gets a bag instance by name.
     *
<<<<<<< HEAD
     * @return SessionBagInterface
     */
    public function getBag(string $name);
=======
     * @param string $name
     *
     * @return SessionBagInterface
     */
    public function getBag($name);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Gets session meta.
     *
     * @return MetadataBag
     */
    public function getMetadataBag();
}
