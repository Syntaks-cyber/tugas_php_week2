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

use Symfony\Component\Config\Resource\ResourceInterface;

/**
 * MessageCatalogueInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface MessageCatalogueInterface
{
<<<<<<< HEAD
    public const INTL_DOMAIN_SUFFIX = '+intl-icu';

    /**
     * Gets the catalogue locale.
     *
     * @return string
=======
    /**
     * Gets the catalogue locale.
     *
     * @return string The locale
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getLocale();

    /**
     * Gets the domains.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array An array of domains
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getDomains();

    /**
     * Gets the messages within a given domain.
     *
     * If $domain is null, it returns all messages.
     *
     * @param string $domain The domain name
     *
<<<<<<< HEAD
     * @return array
     */
    public function all(string $domain = null);
=======
     * @return array An array of messages
     */
    public function all($domain = null);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Sets a message translation.
     *
     * @param string $id          The message id
     * @param string $translation The messages translation
     * @param string $domain      The domain name
     */
<<<<<<< HEAD
    public function set(string $id, string $translation, string $domain = 'messages');
=======
    public function set($id, $translation, $domain = 'messages');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Checks if a message has a translation.
     *
     * @param string $id     The message id
     * @param string $domain The domain name
     *
<<<<<<< HEAD
     * @return bool
     */
    public function has(string $id, string $domain = 'messages');
=======
     * @return bool true if the message has a translation, false otherwise
     */
    public function has($id, $domain = 'messages');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Checks if a message has a translation (it does not take into account the fallback mechanism).
     *
     * @param string $id     The message id
     * @param string $domain The domain name
     *
<<<<<<< HEAD
     * @return bool
     */
    public function defines(string $id, string $domain = 'messages');
=======
     * @return bool true if the message has a translation, false otherwise
     */
    public function defines($id, $domain = 'messages');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Gets a message translation.
     *
     * @param string $id     The message id
     * @param string $domain The domain name
     *
<<<<<<< HEAD
     * @return string
     */
    public function get(string $id, string $domain = 'messages');
=======
     * @return string The message translation
     */
    public function get($id, $domain = 'messages');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Sets translations for a given domain.
     *
     * @param array  $messages An array of translations
     * @param string $domain   The domain name
     */
<<<<<<< HEAD
    public function replace(array $messages, string $domain = 'messages');
=======
    public function replace($messages, $domain = 'messages');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Adds translations for a given domain.
     *
     * @param array  $messages An array of translations
     * @param string $domain   The domain name
     */
<<<<<<< HEAD
    public function add(array $messages, string $domain = 'messages');
=======
    public function add($messages, $domain = 'messages');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Merges translations from the given Catalogue into the current one.
     *
     * The two catalogues must have the same locale.
     */
    public function addCatalogue(self $catalogue);

    /**
     * Merges translations from the given Catalogue into the current one
     * only when the translation does not exist.
     *
     * This is used to provide default translations when they do not exist for the current locale.
     */
    public function addFallbackCatalogue(self $catalogue);

    /**
     * Gets the fallback catalogue.
     *
<<<<<<< HEAD
     * @return self|null
=======
     * @return self|null A MessageCatalogueInterface instance or null when no fallback has been set
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getFallbackCatalogue();

    /**
     * Returns an array of resources loaded to build this collection.
     *
<<<<<<< HEAD
     * @return ResourceInterface[]
=======
     * @return ResourceInterface[] An array of resources
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getResources();

    /**
     * Adds a resource for this collection.
     */
    public function addResource(ResourceInterface $resource);
}
