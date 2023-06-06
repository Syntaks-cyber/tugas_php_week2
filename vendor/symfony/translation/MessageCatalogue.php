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
use Symfony\Component\Translation\Exception\LogicException;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class MessageCatalogue implements MessageCatalogueInterface, MetadataAwareInterface
{
    private $messages = [];
    private $metadata = [];
    private $resources = [];
    private $locale;
    private $fallbackCatalogue;
    private $parent;

    /**
<<<<<<< HEAD
     * @param array $messages An array of messages classified by domain
     */
    public function __construct(string $locale, array $messages = [])
=======
     * @param string $locale   The locale
     * @param array  $messages An array of messages classified by domain
     */
    public function __construct($locale, array $messages = [])
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->locale = $locale;
        $this->messages = $messages;
    }

    /**
     * {@inheritdoc}
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * {@inheritdoc}
     */
    public function getDomains()
    {
<<<<<<< HEAD
        $domains = [];

        foreach ($this->messages as $domain => $messages) {
            if (str_ends_with($domain, self::INTL_DOMAIN_SUFFIX)) {
                $domain = substr($domain, 0, -\strlen(self::INTL_DOMAIN_SUFFIX));
            }
            $domains[$domain] = $domain;
        }

        return array_values($domains);
=======
        return array_keys($this->messages);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function all(string $domain = null)
    {
        if (null !== $domain) {
            // skip messages merge if intl-icu requested explicitly
            if (str_ends_with($domain, self::INTL_DOMAIN_SUFFIX)) {
                return $this->messages[$domain] ?? [];
            }

            return ($this->messages[$domain.self::INTL_DOMAIN_SUFFIX] ?? []) + ($this->messages[$domain] ?? []);
        }

        $allMessages = [];

        foreach ($this->messages as $domain => $messages) {
            if (str_ends_with($domain, self::INTL_DOMAIN_SUFFIX)) {
                $domain = substr($domain, 0, -\strlen(self::INTL_DOMAIN_SUFFIX));
                $allMessages[$domain] = $messages + ($allMessages[$domain] ?? []);
            } else {
                $allMessages[$domain] = ($allMessages[$domain] ?? []) + $messages;
            }
        }

        return $allMessages;
=======
    public function all($domain = null)
    {
        if (null === $domain) {
            return $this->messages;
        }

        return isset($this->messages[$domain]) ? $this->messages[$domain] : [];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function set(string $id, string $translation, string $domain = 'messages')
=======
    public function set($id, $translation, $domain = 'messages')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->add([$id => $translation], $domain);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function has(string $id, string $domain = 'messages')
    {
        if (isset($this->messages[$domain][$id]) || isset($this->messages[$domain.self::INTL_DOMAIN_SUFFIX][$id])) {
=======
    public function has($id, $domain = 'messages')
    {
        if (isset($this->messages[$domain][$id])) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return true;
        }

        if (null !== $this->fallbackCatalogue) {
            return $this->fallbackCatalogue->has($id, $domain);
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function defines(string $id, string $domain = 'messages')
    {
        return isset($this->messages[$domain][$id]) || isset($this->messages[$domain.self::INTL_DOMAIN_SUFFIX][$id]);
=======
    public function defines($id, $domain = 'messages')
    {
        return isset($this->messages[$domain][$id]);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function get(string $id, string $domain = 'messages')
    {
        if (isset($this->messages[$domain.self::INTL_DOMAIN_SUFFIX][$id])) {
            return $this->messages[$domain.self::INTL_DOMAIN_SUFFIX][$id];
        }

=======
    public function get($id, $domain = 'messages')
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if (isset($this->messages[$domain][$id])) {
            return $this->messages[$domain][$id];
        }

        if (null !== $this->fallbackCatalogue) {
            return $this->fallbackCatalogue->get($id, $domain);
        }

        return $id;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function replace(array $messages, string $domain = 'messages')
    {
        unset($this->messages[$domain], $this->messages[$domain.self::INTL_DOMAIN_SUFFIX]);
=======
    public function replace($messages, $domain = 'messages')
    {
        $this->messages[$domain] = [];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $this->add($messages, $domain);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function add(array $messages, string $domain = 'messages')
    {
        $altDomain = str_ends_with($domain, self::INTL_DOMAIN_SUFFIX) ? substr($domain, 0, -\strlen(self::INTL_DOMAIN_SUFFIX)) : $domain.self::INTL_DOMAIN_SUFFIX;
        foreach ($messages as $id => $message) {
            unset($this->messages[$altDomain][$id]);
            $this->messages[$domain][$id] = $message;
        }

        if ([] === ($this->messages[$altDomain] ?? null)) {
            unset($this->messages[$altDomain]);
=======
    public function add($messages, $domain = 'messages')
    {
        if (!isset($this->messages[$domain])) {
            $this->messages[$domain] = $messages;
        } else {
            foreach ($messages as $id => $message) {
                $this->messages[$domain][$id] = $message;
            }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * {@inheritdoc}
     */
    public function addCatalogue(MessageCatalogueInterface $catalogue)
    {
        if ($catalogue->getLocale() !== $this->locale) {
            throw new LogicException(sprintf('Cannot add a catalogue for locale "%s" as the current locale for this catalogue is "%s".', $catalogue->getLocale(), $this->locale));
        }

        foreach ($catalogue->all() as $domain => $messages) {
<<<<<<< HEAD
            if ($intlMessages = $catalogue->all($domain.self::INTL_DOMAIN_SUFFIX)) {
                $this->add($intlMessages, $domain.self::INTL_DOMAIN_SUFFIX);
                $messages = array_diff_key($messages, $intlMessages);
            }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $this->add($messages, $domain);
        }

        foreach ($catalogue->getResources() as $resource) {
            $this->addResource($resource);
        }

        if ($catalogue instanceof MetadataAwareInterface) {
            $metadata = $catalogue->getMetadata('', '');
            $this->addMetadata($metadata);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function addFallbackCatalogue(MessageCatalogueInterface $catalogue)
    {
        // detect circular references
        $c = $catalogue;
        while ($c = $c->getFallbackCatalogue()) {
            if ($c->getLocale() === $this->getLocale()) {
                throw new LogicException(sprintf('Circular reference detected when adding a fallback catalogue for locale "%s".', $catalogue->getLocale()));
            }
        }

        $c = $this;
        do {
            if ($c->getLocale() === $catalogue->getLocale()) {
                throw new LogicException(sprintf('Circular reference detected when adding a fallback catalogue for locale "%s".', $catalogue->getLocale()));
            }

            foreach ($catalogue->getResources() as $resource) {
                $c->addResource($resource);
            }
        } while ($c = $c->parent);

        $catalogue->parent = $this;
        $this->fallbackCatalogue = $catalogue;

        foreach ($catalogue->getResources() as $resource) {
            $this->addResource($resource);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getFallbackCatalogue()
    {
        return $this->fallbackCatalogue;
    }

    /**
     * {@inheritdoc}
     */
    public function getResources()
    {
        return array_values($this->resources);
    }

    /**
     * {@inheritdoc}
     */
    public function addResource(ResourceInterface $resource)
    {
        $this->resources[$resource->__toString()] = $resource;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getMetadata(string $key = '', string $domain = 'messages')
=======
    public function getMetadata($key = '', $domain = 'messages')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ('' == $domain) {
            return $this->metadata;
        }

        if (isset($this->metadata[$domain])) {
            if ('' == $key) {
                return $this->metadata[$domain];
            }

            if (isset($this->metadata[$domain][$key])) {
                return $this->metadata[$domain][$key];
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function setMetadata(string $key, $value, string $domain = 'messages')
=======
    public function setMetadata($key, $value, $domain = 'messages')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->metadata[$domain][$key] = $value;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function deleteMetadata(string $key = '', string $domain = 'messages')
=======
    public function deleteMetadata($key = '', $domain = 'messages')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ('' == $domain) {
            $this->metadata = [];
        } elseif ('' == $key) {
            unset($this->metadata[$domain]);
        } else {
            unset($this->metadata[$domain][$key]);
        }
    }

    /**
     * Adds current values with the new values.
     *
     * @param array $values Values to add
     */
    private function addMetadata(array $values)
    {
        foreach ($values as $domain => $keys) {
            foreach ($keys as $key => $value) {
                $this->setMetadata($key, $value, $domain);
            }
        }
    }
}
