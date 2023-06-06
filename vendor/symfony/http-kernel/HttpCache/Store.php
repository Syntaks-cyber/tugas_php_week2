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
 * Store implements all the logic for storing cache metadata (Request and Response headers).
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Store implements StoreInterface
{
    protected $root;
<<<<<<< HEAD
    /** @var \SplObjectStorage<Request, string> */
    private $keyCache;
    /** @var array<string, resource> */
    private $locks = [];
    private $options;
=======
    private $keyCache;
    private $locks;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Constructor.
     *
<<<<<<< HEAD
     * The available options are:
     *
     *   * private_headers  Set of response headers that should not be stored
     *                      when a response is cached. (default: Set-Cookie)
     *
     * @throws \RuntimeException
     */
    public function __construct(string $root, array $options = [])
    {
        $this->root = $root;
        if (!is_dir($this->root) && !@mkdir($this->root, 0777, true) && !is_dir($this->root)) {
            throw new \RuntimeException(sprintf('Unable to create the store directory (%s).', $this->root));
        }
        $this->keyCache = new \SplObjectStorage();
        $this->options = array_merge([
            'private_headers' => ['Set-Cookie'],
        ], $options);
=======
     * @param string $root The path to the cache directory
     *
     * @throws \RuntimeException
     */
    public function __construct($root)
    {
        $this->root = $root;
        if (!file_exists($this->root) && !@mkdir($this->root, 0777, true) && !is_dir($this->root)) {
            throw new \RuntimeException(sprintf('Unable to create the store directory (%s).', $this->root));
        }
        $this->keyCache = new \SplObjectStorage();
        $this->locks = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Cleanups storage.
     */
    public function cleanup()
    {
        // unlock everything
        foreach ($this->locks as $lock) {
<<<<<<< HEAD
            flock($lock, \LOCK_UN);
            fclose($lock);
        }

        $this->locks = [];
=======
            flock($lock, LOCK_UN);
            fclose($lock);
        }

        $this->locks = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Tries to lock the cache for a given Request, without blocking.
     *
<<<<<<< HEAD
=======
     * @param Request $request A Request instance
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return bool|string true if the lock is acquired, the path to the current lock otherwise
     */
    public function lock(Request $request)
    {
        $key = $this->getCacheKey($request);

        if (!isset($this->locks[$key])) {
            $path = $this->getPath($key);
<<<<<<< HEAD
            if (!is_dir(\dirname($path)) && false === @mkdir(\dirname($path), 0777, true) && !is_dir(\dirname($path))) {
                return $path;
            }
            $h = fopen($path, 'c');
            if (!flock($h, \LOCK_EX | \LOCK_NB)) {
=======
            if (!file_exists(dirname($path)) && false === @mkdir(dirname($path), 0777, true) && !is_dir(dirname($path))) {
                return $path;
            }
            $h = fopen($path, 'cb');
            if (!flock($h, LOCK_EX | LOCK_NB)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                fclose($h);

                return $path;
            }

            $this->locks[$key] = $h;
        }

        return true;
    }

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
    public function unlock(Request $request)
    {
        $key = $this->getCacheKey($request);

        if (isset($this->locks[$key])) {
<<<<<<< HEAD
            flock($this->locks[$key], \LOCK_UN);
=======
            flock($this->locks[$key], LOCK_UN);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            fclose($this->locks[$key]);
            unset($this->locks[$key]);

            return true;
        }

        return false;
    }

    public function isLocked(Request $request)
    {
        $key = $this->getCacheKey($request);

        if (isset($this->locks[$key])) {
            return true; // shortcut if lock held by this process
        }

<<<<<<< HEAD
        if (!is_file($path = $this->getPath($key))) {
            return false;
        }

        $h = fopen($path, 'r');
        flock($h, \LOCK_EX | \LOCK_NB, $wouldBlock);
        flock($h, \LOCK_UN); // release the lock we just acquired
=======
        if (!file_exists($path = $this->getPath($key))) {
            return false;
        }

        $h = fopen($path, 'rb');
        flock($h, LOCK_EX | LOCK_NB, $wouldBlock);
        flock($h, LOCK_UN); // release the lock we just acquired
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        fclose($h);

        return (bool) $wouldBlock;
    }

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
    public function lookup(Request $request)
    {
        $key = $this->getCacheKey($request);

        if (!$entries = $this->getMetadata($key)) {
<<<<<<< HEAD
            return null;
=======
            return;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        // find a cached entry that matches the request.
        $match = null;
        foreach ($entries as $entry) {
            if ($this->requestsMatch(isset($entry[1]['vary'][0]) ? implode(', ', $entry[1]['vary']) : '', $request->headers->all(), $entry[0])) {
                $match = $entry;

                break;
            }
        }

        if (null === $match) {
<<<<<<< HEAD
            return null;
        }

        $headers = $match[1];
        if (file_exists($path = $this->getPath($headers['x-content-digest'][0]))) {
            return $this->restoreResponse($headers, $path);
=======
            return;
        }

        list($req, $headers) = $match;
        if (file_exists($body = $this->getPath($headers['x-content-digest'][0]))) {
            return $this->restoreResponse($headers, $body);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        // TODO the metaStore referenced an entity that doesn't exist in
        // the entityStore. We definitely want to return nil but we should
        // also purge the entry from the meta-store when this is detected.
<<<<<<< HEAD
        return null;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Writes a cache entry to the store for the given Request and Response.
     *
     * Existing entries are read and any that match the response are removed. This
     * method calls write with the new list of cache entries.
     *
<<<<<<< HEAD
     * @return string
=======
     * @param Request  $request  A Request instance
     * @param Response $response A Response instance
     *
     * @return string The key under which the response is stored
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @throws \RuntimeException
     */
    public function write(Request $request, Response $response)
    {
        $key = $this->getCacheKey($request);
        $storedEnv = $this->persistRequest($request);

<<<<<<< HEAD
        if ($response->headers->has('X-Body-File')) {
            // Assume the response came from disk, but at least perform some safeguard checks
            if (!$response->headers->has('X-Content-Digest')) {
                throw new \RuntimeException('A restored response must have the X-Content-Digest header.');
            }

            $digest = $response->headers->get('X-Content-Digest');
            if ($this->getPath($digest) !== $response->headers->get('X-Body-File')) {
                throw new \RuntimeException('X-Body-File and X-Content-Digest do not match.');
            }
            // Everything seems ok, omit writing content to disk
        } else {
            $digest = $this->generateContentDigest($response);
            $response->headers->set('X-Content-Digest', $digest);

            if (!$this->save($digest, $response->getContent(), false)) {
                throw new \RuntimeException('Unable to store the entity.');
            }

            if (!$response->headers->has('Transfer-Encoding')) {
                $response->headers->set('Content-Length', \strlen($response->getContent()));
=======
        // write the response body to the entity store if this is the original response
        if (!$response->headers->has('X-Content-Digest')) {
            $digest = $this->generateContentDigest($response);

            if (false === $this->save($digest, $response->getContent())) {
                throw new \RuntimeException('Unable to store the entity.');
            }

            $response->headers->set('X-Content-Digest', $digest);

            if (!$response->headers->has('Transfer-Encoding')) {
                $response->headers->set('Content-Length', strlen($response->getContent()));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }

        // read existing cache entries, remove non-varying, and add this one to the list
<<<<<<< HEAD
        $entries = [];
        $vary = $response->headers->get('vary');
        foreach ($this->getMetadata($key) as $entry) {
            if (!isset($entry[1]['vary'][0])) {
                $entry[1]['vary'] = [''];
            }

            if ($entry[1]['vary'][0] != $vary || !$this->requestsMatch($vary ?? '', $entry[0], $storedEnv)) {
=======
        $entries = array();
        $vary = $response->headers->get('vary');
        foreach ($this->getMetadata($key) as $entry) {
            if (!isset($entry[1]['vary'][0])) {
                $entry[1]['vary'] = array('');
            }

            if ($vary != $entry[1]['vary'][0] || !$this->requestsMatch($vary, $entry[0], $storedEnv)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $entries[] = $entry;
            }
        }

        $headers = $this->persistResponse($response);
        unset($headers['age']);

<<<<<<< HEAD
        foreach ($this->options['private_headers'] as $h) {
            unset($headers[strtolower($h)]);
        }

        array_unshift($entries, [$storedEnv, $headers]);

        if (!$this->save($key, serialize($entries))) {
=======
        array_unshift($entries, array($storedEnv, $headers));

        if (false === $this->save($key, serialize($entries))) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            throw new \RuntimeException('Unable to store the metadata.');
        }

        return $key;
    }

    /**
     * Returns content digest for $response.
     *
<<<<<<< HEAD
=======
     * @param Response $response
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return string
     */
    protected function generateContentDigest(Response $response)
    {
        return 'en'.hash('sha256', $response->getContent());
    }

    /**
     * Invalidates all cache entries that match the request.
     *
<<<<<<< HEAD
=======
     * @param Request $request A Request instance
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @throws \RuntimeException
     */
    public function invalidate(Request $request)
    {
        $modified = false;
        $key = $this->getCacheKey($request);

<<<<<<< HEAD
        $entries = [];
=======
        $entries = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        foreach ($this->getMetadata($key) as $entry) {
            $response = $this->restoreResponse($entry[1]);
            if ($response->isFresh()) {
                $response->expire();
                $modified = true;
<<<<<<< HEAD
                $entries[] = [$entry[0], $this->persistResponse($response)];
=======
                $entries[] = array($entry[0], $this->persistResponse($response));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            } else {
                $entries[] = $entry;
            }
        }

<<<<<<< HEAD
        if ($modified && !$this->save($key, serialize($entries))) {
=======
        if ($modified && false === $this->save($key, serialize($entries))) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            throw new \RuntimeException('Unable to store the metadata.');
        }
    }

    /**
     * Determines whether two Request HTTP header sets are non-varying based on
     * the vary response header value provided.
     *
<<<<<<< HEAD
     * @param string|null $vary A Response vary header
     * @param array       $env1 A Request HTTP header array
     * @param array       $env2 A Request HTTP header array
     */
    private function requestsMatch(?string $vary, array $env1, array $env2): bool
=======
     * @param string $vary A Response vary header
     * @param array  $env1 A Request HTTP header array
     * @param array  $env2 A Request HTTP header array
     *
     * @return bool true if the two environments match, false otherwise
     */
    private function requestsMatch($vary, $env1, $env2)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (empty($vary)) {
            return true;
        }

        foreach (preg_split('/[\s,]+/', $vary) as $header) {
            $key = str_replace('_', '-', strtolower($header));
<<<<<<< HEAD
            $v1 = $env1[$key] ?? null;
            $v2 = $env2[$key] ?? null;
=======
            $v1 = isset($env1[$key]) ? $env1[$key] : null;
            $v2 = isset($env2[$key]) ? $env2[$key] : null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if ($v1 !== $v2) {
                return false;
            }
        }

        return true;
    }

    /**
     * Gets all data associated with the given key.
     *
     * Use this method only if you know what you are doing.
<<<<<<< HEAD
     */
    private function getMetadata(string $key): array
    {
        if (!$entries = $this->load($key)) {
            return [];
        }

        return unserialize($entries) ?: [];
=======
     *
     * @param string $key The store key
     *
     * @return array An array of data associated with the key
     */
    private function getMetadata($key)
    {
        if (!$entries = $this->load($key)) {
            return array();
        }

        return unserialize($entries);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Purges data for the given URL.
     *
<<<<<<< HEAD
     * This method purges both the HTTP and the HTTPS version of the cache entry.
     *
     * @return bool true if the URL exists with either HTTP or HTTPS scheme and has been purged, false otherwise
     */
    public function purge(string $url)
    {
        $http = preg_replace('#^https:#', 'http:', $url);
        $https = preg_replace('#^http:#', 'https:', $url);

        $purgedHttp = $this->doPurge($http);
        $purgedHttps = $this->doPurge($https);

        return $purgedHttp || $purgedHttps;
    }

    /**
     * Purges data for the given URL.
     */
    private function doPurge(string $url): bool
    {
        $key = $this->getCacheKey(Request::create($url));
        if (isset($this->locks[$key])) {
            flock($this->locks[$key], \LOCK_UN);
=======
     * @param string $url A URL
     *
     * @return bool true if the URL exists and has been purged, false otherwise
     */
    public function purge($url)
    {
        $key = $this->getCacheKey(Request::create($url));

        if (isset($this->locks[$key])) {
            flock($this->locks[$key], LOCK_UN);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            fclose($this->locks[$key]);
            unset($this->locks[$key]);
        }

<<<<<<< HEAD
        if (is_file($path = $this->getPath($key))) {
=======
        if (file_exists($path = $this->getPath($key))) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            unlink($path);

            return true;
        }

        return false;
    }

    /**
     * Loads data for the given key.
<<<<<<< HEAD
     */
    private function load(string $key): ?string
    {
        $path = $this->getPath($key);

        return is_file($path) && false !== ($contents = @file_get_contents($path)) ? $contents : null;
=======
     *
     * @param string $key The store key
     *
     * @return string The data associated with the key
     */
    private function load($key)
    {
        $path = $this->getPath($key);

        return file_exists($path) ? file_get_contents($path) : false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Save data for the given key.
<<<<<<< HEAD
     */
    private function save(string $key, string $data, bool $overwrite = true): bool
    {
        $path = $this->getPath($key);

        if (!$overwrite && file_exists($path)) {
            return true;
        }

=======
     *
     * @param string $key  The store key
     * @param string $data The data to store
     *
     * @return bool
     */
    private function save($key, $data)
    {
        $path = $this->getPath($key);

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (isset($this->locks[$key])) {
            $fp = $this->locks[$key];
            @ftruncate($fp, 0);
            @fseek($fp, 0);
            $len = @fwrite($fp, $data);
<<<<<<< HEAD
            if (\strlen($data) !== $len) {
=======
            if (strlen($data) !== $len) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                @ftruncate($fp, 0);

                return false;
            }
        } else {
<<<<<<< HEAD
            if (!is_dir(\dirname($path)) && false === @mkdir(\dirname($path), 0777, true) && !is_dir(\dirname($path))) {
                return false;
            }

            $tmpFile = tempnam(\dirname($path), basename($path));
            if (false === $fp = @fopen($tmpFile, 'w')) {
                @unlink($tmpFile);

=======
            if (!file_exists(dirname($path)) && false === @mkdir(dirname($path), 0777, true) && !is_dir(dirname($path))) {
                return false;
            }

            $tmpFile = tempnam(dirname($path), basename($path));
            if (false === $fp = @fopen($tmpFile, 'wb')) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                return false;
            }
            @fwrite($fp, $data);
            @fclose($fp);

            if ($data != file_get_contents($tmpFile)) {
<<<<<<< HEAD
                @unlink($tmpFile);

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                return false;
            }

            if (false === @rename($tmpFile, $path)) {
<<<<<<< HEAD
                @unlink($tmpFile);

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                return false;
            }
        }

        @chmod($path, 0666 & ~umask());
<<<<<<< HEAD

        return true;
    }

    public function getPath(string $key)
    {
        return $this->root.\DIRECTORY_SEPARATOR.substr($key, 0, 2).\DIRECTORY_SEPARATOR.substr($key, 2, 2).\DIRECTORY_SEPARATOR.substr($key, 4, 2).\DIRECTORY_SEPARATOR.substr($key, 6);
=======
    }

    public function getPath($key)
    {
        return $this->root.DIRECTORY_SEPARATOR.substr($key, 0, 2).DIRECTORY_SEPARATOR.substr($key, 2, 2).DIRECTORY_SEPARATOR.substr($key, 4, 2).DIRECTORY_SEPARATOR.substr($key, 6);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Generates a cache key for the given Request.
     *
     * This method should return a key that must only depend on a
     * normalized version of the request URI.
     *
     * If the same URI can have more than one representation, based on some
     * headers, use a Vary header to indicate them, and each representation will
     * be stored independently under the same cache key.
     *
<<<<<<< HEAD
     * @return string
=======
     * @param Request $request A Request instance
     *
     * @return string A key for the given Request
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected function generateCacheKey(Request $request)
    {
        return 'md'.hash('sha256', $request->getUri());
    }

    /**
     * Returns a cache key for the given Request.
<<<<<<< HEAD
     */
    private function getCacheKey(Request $request): string
=======
     *
     * @param Request $request A Request instance
     *
     * @return string A key for the given Request
     */
    private function getCacheKey(Request $request)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (isset($this->keyCache[$request])) {
            return $this->keyCache[$request];
        }

        return $this->keyCache[$request] = $this->generateCacheKey($request);
    }

    /**
     * Persists the Request HTTP headers.
<<<<<<< HEAD
     */
    private function persistRequest(Request $request): array
=======
     *
     * @param Request $request A Request instance
     *
     * @return array An array of HTTP headers
     */
    private function persistRequest(Request $request)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $request->headers->all();
    }

    /**
     * Persists the Response HTTP headers.
<<<<<<< HEAD
     */
    private function persistResponse(Response $response): array
    {
        $headers = $response->headers->all();
        $headers['X-Status'] = [$response->getStatusCode()];
=======
     *
     * @param Response $response A Response instance
     *
     * @return array An array of HTTP headers
     */
    private function persistResponse(Response $response)
    {
        $headers = $response->headers->all();
        $headers['X-Status'] = array($response->getStatusCode());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $headers;
    }

    /**
     * Restores a Response from the HTTP headers and body.
<<<<<<< HEAD
     */
    private function restoreResponse(array $headers, string $path = null): Response
=======
     *
     * @param array  $headers An array of HTTP headers for the Response
     * @param string $body    The Response body
     *
     * @return Response
     */
    private function restoreResponse($headers, $body = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $status = $headers['X-Status'][0];
        unset($headers['X-Status']);

<<<<<<< HEAD
        if (null !== $path) {
            $headers['X-Body-File'] = [$path];
        }

        return new Response($path, $status, $headers);
=======
        if (null !== $body) {
            $headers['X-Body-File'] = array($body);
        }

        return new Response($body, $status, $headers);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
