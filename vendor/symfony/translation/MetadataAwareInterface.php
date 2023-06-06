<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation;

/**
 * MetadataAwareInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface MetadataAwareInterface
{
    /**
     * Gets metadata for the given domain and key.
     *
     * Passing an empty domain will return an array with all metadata indexed by
     * domain and then by key. Passing an empty key will return an array with all
     * metadata for the given domain.
     *
<<<<<<< HEAD
     * @return mixed The value that was set or an array with the domains/keys or null
     */
    public function getMetadata(string $key = '', string $domain = 'messages');
=======
     * @param string $key    The key
     * @param string $domain The domain name
     *
     * @return mixed The value that was set or an array with the domains/keys or null
     */
    public function getMetadata($key = '', $domain = 'messages');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Adds metadata to a message domain.
     *
<<<<<<< HEAD
     * @param mixed $value
     */
    public function setMetadata(string $key, $value, string $domain = 'messages');
=======
     * @param string $key    The key
     * @param mixed  $value  The value
     * @param string $domain The domain name
     */
    public function setMetadata($key, $value, $domain = 'messages');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Deletes metadata for the given key and domain.
     *
     * Passing an empty domain will delete all metadata. Passing an empty key will
     * delete all metadata for the given domain.
<<<<<<< HEAD
     */
    public function deleteMetadata(string $key = '', string $domain = 'messages');
=======
     *
     * @param string $key    The key
     * @param string $domain The domain name
     */
    public function deleteMetadata($key = '', $domain = 'messages');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
