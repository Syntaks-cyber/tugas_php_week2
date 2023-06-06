<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage;

use Symfony\Component\HttpFoundation\Session\SessionBagInterface;

/**
 * StorageInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Drak <drak@zikula.org>
 */
interface SessionStorageInterface
{
    /**
     * Starts the session.
     *
<<<<<<< HEAD
     * @return bool
     *
     * @throws \RuntimeException if something goes wrong starting the session
=======
     * @return bool True if started
     *
     * @throws \RuntimeException If something goes wrong starting the session.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function start();

    /**
     * Checks if the session is started.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return bool True if started, false otherwise
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function isStarted();

    /**
     * Returns the session ID.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The session ID or empty
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
     * Regenerates id that represents this storage.
     *
     * This method must invoke session_regenerate_id($destroy) unless
     * this interface is used for a storage object designed for unit
     * or functional testing where a real PHP session would interfere
     * with testing.
     *
     * Note regenerate+destroy should not clear the session data in memory
     * only delete the session data from persistent storage.
     *
     * Care: When regenerating the session ID no locking is involved in PHP's
<<<<<<< HEAD
     * session design. See https://bugs.php.net/61470 for a discussion.
=======
     * session design. See https://bugs.php.net/bug.php?id=61470 for a discussion.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * So you must make sure the regenerated session is saved BEFORE sending the
     * headers with the new ID. Symfony's HttpKernel offers a listener for this.
     * See Symfony\Component\HttpKernel\EventListener\SaveSessionListener.
     * Otherwise session data could get lost again for concurrent requests with the
     * new ID. One result could be that you get logged out after just logging in.
     *
     * @param bool $destroy  Destroy session when regenerating?
     * @param int  $lifetime Sets the cookie lifetime for the session cookie. A null value
     *                       will leave the system settings unchanged, 0 sets the cookie
     *                       to expire with browser session. Time is in seconds, and is
     *                       not a Unix timestamp.
     *
<<<<<<< HEAD
     * @return bool
     *
     * @throws \RuntimeException If an error occurs while regenerating this storage
     */
    public function regenerate(bool $destroy = false, int $lifetime = null);
=======
     * @return bool True if session regenerated, false if error
     *
     * @throws \RuntimeException If an error occurs while regenerating this storage
     */
    public function regenerate($destroy = false, $lifetime = null);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Force the session to be saved and closed.
     *
     * This method must invoke session_write_close() unless this interface is
     * used for a storage object design for unit or functional testing where
     * a real PHP session would interfere with testing, in which case
     * it should actually persist the session data if required.
     *
<<<<<<< HEAD
     * @throws \RuntimeException if the session is saved without being started, or if the session
     *                           is already closed
=======
     * @throws \RuntimeException If the session is saved without being started, or if the session
     *                           is already closed.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function save();

    /**
     * Clear all session data in memory.
     */
    public function clear();

    /**
     * Gets a SessionBagInterface by name.
     *
<<<<<<< HEAD
=======
     * @param string $name
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return SessionBagInterface
     *
     * @throws \InvalidArgumentException If the bag does not exist
     */
<<<<<<< HEAD
    public function getBag(string $name);

    /**
     * Registers a SessionBagInterface for use.
=======
    public function getBag($name);

    /**
     * Registers a SessionBagInterface for use.
     *
     * @param SessionBagInterface $bag
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function registerBag(SessionBagInterface $bag);

    /**
     * @return MetadataBag
     */
    public function getMetadataBag();
}
