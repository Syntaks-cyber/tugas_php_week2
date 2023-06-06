<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This code is partially based on the Rack-Cache library by Ryan Tomayko,
 * which is released under the MIT license.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\HttpCache;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface implemented by HTTP cache stores.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface StoreInterface
{
    /**
     * Locates a cached Response for the Request provided.
     *
<<<<<<< HEAD
     * @return Response|null
=======
     * @param Request $request A Request instance
     *
     * @return Response|null A Response instance, or null if no cache entry was found
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function lookup(Request $request);

    /**
     * Writes a cache entry to the store for the given Request and Response.
     *
     * Existing entries are read and any that match the response are removed. This
     * method calls write with the new list of cache entries.
     *
<<<<<<< HEAD
=======
     * @param Request  $request  A Request instance
     * @param Response $response A Response instance
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return string The key under which the response is stored
     */
    public function write(Request $request, Response $response);

    /**
     * Invalidates all cache entries that match the request.
<<<<<<< HEAD
=======
     *
     * @param Request $request A Request instance
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function invalidate(Request $request);

    /**
     * Locks the cache for a given Request.
     *
<<<<<<< HEAD
=======
     * @param Request $request A Request instance
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return bool|string true if the lock is acquired, the path to the current lock otherwise
     */
    public function lock(Request $request);

    /**
     * Releases the lock for the given Request.
     *
<<<<<<< HEAD
=======
     * @param Request $request A Request instance
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return bool False if the lock file does not exist or cannot be unlocked, true otherwise
     */
    public function unlock(Request $request);

    /**
     * Returns whether or not a lock exists.
     *
<<<<<<< HEAD
=======
     * @param Request $request A Request instance
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return bool true if lock exists, false otherwise
     */
    public function isLocked(Request $request);

    /**
     * Purges data for the given URL.
     *
<<<<<<< HEAD
     * @return bool true if the URL exists and has been purged, false otherwise
     */
    public function purge(string $url);
=======
     * @param string $url A URL
     *
     * @return bool true if the URL exists and has been purged, false otherwise
     */
    public function purge($url);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Cleanups storage.
     */
    public function cleanup();
}
